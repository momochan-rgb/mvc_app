<?php

require_once ROOT_PATH.'Controllers/Controller.php';
require_once ROOT_PATH.'Models/contact.php';
require_once ROOT_PATH.'database.php';

class ContactController extends Controller
{
    public function __construct()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        $db = (new Database())->getConnection();
        $this->contactModel = new Contact($db);
    }

    public function index()
    {
        $data = $this->contactModel->getAllContacts();

        $successMessage = isset($_SESSION['successMessage']) ? $_SESSION['successMessage'] : null;
        unset($_SESSION['successMessage']);

        $errorMessages = isset($_SESSION['errorMessages']) ? $_SESSION['errorMessages'] : [];
        unset($_SESSION['errorMessages']);

        $post = isset($_SESSION['post']) ? $_SESSION['post'] : [];

        $this->view('contact/index', [
            'tableData' => $data,
            'successMessage' => $successMessage,
            'errorMessages' => $errorMessages,
            'post' => $post,
        ]);
    }

    public function confirm()
    {
        $post = $_POST;
        $errorMessages = [];

        if (empty($post['name'])) {
            $errorMessages['name'] = '氏名は必須入力です。';
        } elseif (mb_strlen($post['name']) > 10) {
            $errorMessages['name'] = '氏名は10文字以内です。';
        }

        if (empty($post['kana'])) {
            $errorMessages['kana'] = 'ふりがなは必須入力です。';
        } elseif (mb_strlen($post['kana']) > 10) {
            $errorMessages['kana'] = 'ふりがなは10文字以内です。';
        }

        if (mb_strlen($post['tel']) > 11) {
            $errorMessages['tel'] = '電話番号は11文字以内です。';
        } elseif (!preg_match('/^\d+$/',$post['tel'])) {
            $errorMessages['tel'] = '電話番号は数字入力です。';
        }

        if (empty($post['email'])) {
            $errorMessages['email'] = 'メールアドレスは必須入力です。';
        } elseif (!filter_var($post['email'], FILTER_VALIDATE_EMAIL)) {
            $errorMessages['email'] = 'メールアドレスには「@」を含む形式で入力してください。';
        }

        if (empty($post['body'])) {
            $errorMessages['body'] = 'お問い合わせ内容は必須入力です。';
        }

        if (!empty($errorMessages)) {
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $post;
            header('Location: /contact/index');
            exit;
        }

        $_SESSION['post'] = $post;
        $_SESSION['errorMessages'] = [];
        $this->view('contact/confirm', ['post' => $post]);
    }

    public function submit()
    {
        $post = $_SESSION['post'];

        if (!empty($errorMessages)) {
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $post;
            header('Location: /contact/index');
            exit;
        }

        $result = $this->contactModel->save($post);

        if ($result) {
            unset($_SESSION['post']); 
            $_SESSION['successMessage'] = 'お問い合わせ内容が送信されました。';
            header('Location: /contact/complete'); 
            exit;
        } else {
            $_SESSION['errorMessages'] = ['db' => 'データ保存に失敗しました。'];
            header('Location: /contact/index'); 
            exit;
        }
    }

    public function complete()
    {
        if (!isset($_SESSION['successMessage'])) {
            header('Location: /contact/index');
            exit;
        }

        $successMessage = $_SESSION['successMessage'] ?? null;
        unset($_SESSION['successMessage']);

        $this->view('contact/complete', ['successMessage' => $successMessage]);
    }


    private function saveToDatabase($post)
    {
        DB::table('contacts')->insert($post);
    }

    private $contactModel;

    public function edit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

        if (!$id || !is_numeric($id)) {
            $_SESSION['errorMessages'] = ['record' => 'データが見つかりません。'];
            header('Location: /contact/index');
            exit;
        }

        $data = $this->contactModel->findById($id);

        if (!$data) {
            $_SESSION['errorMessages'] = ['record' => '該当データが存在しません。'];
            header('Location: /contact/index');
            exit;
        }

        $this->view('contact/edit', [
            'post' => $_SESSION['post'] ?? $data,
            'errorMessages' => $_SESSION['errorMessages'] ?? []
        ]);

        unset($_SESSION['errorMessages']);
        unset($_SESSION['post']);
    }


    private function validate(array $data): array
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = '氏名は必須入力です。';
        } elseif (mb_strlen($data['name']) > 10) {
            $errors['name'] = '氏名は10文字以内です。';
        }

        if (empty($data['kana'])) {
            $errors['kana'] = 'ふりがなは必須入力です。';
        } elseif (!preg_match('/^[ぁ-んァ-ン]+$/u', $data['kana'])) {
            $errors['kana'] = 'ふりがなはひらがなまたはカタカナで入力してください。';
        } elseif (mb_strlen($data['kana']) > 10) {
            $errors['kana'] = 'ふりがなは10文字以内です。';
        }

        if (empty($data['tel'])) {
            $errors['tel'] = '電話番号は必須入力です。';
        } elseif (!preg_match('/^\d+$/',$data['tel'])) {
            $errors['tel'] = '電話番号は数字入力です。';
        }

        if (empty($data['email'])) {
            $errors['email'] = 'メールアドレスは必須入力です。';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'メールアドレスには「@」を含む形式で入力してください。';
        }

        if (empty($data['body'])) {
            $errors['body'] = '問い合わせ内容は必須入力です。';
        }

        return $errors;
    }

    public function update()
    {
        if (empty($_POST['id'])) {
            $_SESSION['errorMessages'] = ['IDが指定されていません。'];
            header('Location: /contact/index');
            exit;
        }

        $id = $_POST['id'];
        $data = $_POST;

        error_log("POSTデータ: " . print_r($data, true));

        $errorMessages = $this->validate($data);
        if (!empty($errorMessages)) {
            $_SESSION['errorMessages'] = $errorMessages;
            $_SESSION['post'] = $data;
            header("Location: /contact/edit?id={$id}");
            exit;
        }

        $result = $this->contactModel->update($data);
        error_log("更新結果: " . ($result ? '成功' : '失敗'));

        if ($result) {
            $_SESSION['successMessage'] = 'データを更新しました。';
            header('Location: /contact/index');
            exit;
        } else {
            $_SESSION['errorMessages'] = ['更新処理に失敗しました。'];
            header("Location: /contact/edit?id={$id}");
            exit;
        }
    }


    public function delete()
    {
        try {
            $id = $_POST['id'];
            if (empty($id)) {
                $_SESSION['errorMessages'] = ['id' => '削除対象が指定されていません。'];
                header('Location: /contact/index');
                exit;
            }

            $result = $this->contactModel->deleteById($id);

            if ($result) {
                $_SESSION['successMessage'] = '削除が完了しました。';
            } else {
                $_SESSION['errorMessages'] = ['db' => '削除に失敗しました。'];
            }

            header('Location: /contact/index');
            exit;
        } catch (Throwable $e) {
            error_log($e->getMessage());
            $_SESSION['errorMessages'] = ['db' => '予期せぬエラーが発生しました。'];
            header('Location: /contact/index');
            exit;
        }
    }

    public function findById($id)
    {
        $contact = Contact::findById($id);
        if ($contact === null) {
            echo "指定されたIDの連絡先が見つかりませんでした。";
        } else {
            print_r($contact);
        }
    }

}

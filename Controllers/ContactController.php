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
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];

        $this->view('contact/index', array(
            'errorMessages' => $errorMessages,
            'post' => $post
        ));
    }

    public function confirm()
    {
        $post = $_POST;
        $errorMessages = [];

        if (empty($post['name'])) {
            $errorMessages['name'] = '氏名は必須です。';
        } elseif (mb_strlen($post['name']) > 50) {
            $errorMessages['name'] = '氏名は50文字以内で入力してください。';
        }

        if (empty($post['kana'])) {
            $errorMessages['kana'] = 'ふりがなは必須です。';
        } elseif (mb_strlen($post['kana']) > 50) {
            $errorMessages['kana'] = 'ふりがなは50文字以内で入力してください。';
        }

        if (mb_strlen($post['tel']) > 11) {
            $errorMessages['tel'] = '電話番号は11文字以内で入力してください。';
        }

        if (empty($post['email'])) {
            $errorMessages['email'] = 'メールアドレスは必須です。';
        } elseif (mb_strlen($post['email']) > 100) {
            $errorMessages['email'] = 'メールアドレスは100文字以内で入力してください。';
        }

        if (empty($post['body'])) {
            $errorMessages['body'] = 'お問い合わせ内容は必須です。';
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
        $post = $_POST;

        $result = $this->contactModel->save($post);

        if ($result) {
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
        $successMessage = $_SESSION['successMessage'] ?? null;
        unset($_SESSION['successMessage']);

        $this->view('contact/complete', ['successMessage' => $successMessage]);
    }


    private function saveToDatabase($post)
    {
        DB::table('contacts')->insert($post);
    }

    private $contactModel;

}

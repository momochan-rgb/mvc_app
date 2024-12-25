<?php

require_once ROOT_PATH.'Controllers/Controller.php';

class ContactController extends Controller
{
    public function index()
    {
        $errorMessages = $_SESSION['errorMessages'] ?? [];
        $post = $_SESSION['post'] ?? [];
        $_SESSION['errorMessages'] = [];
        $_SESSION['post'] = [];
        $this->view('contact/index',array(
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
        }

        if (empty($post['kana'])) {
            $errorMessages['kana'] = 'ふりがなは必須です。';
        }

        if (empty($post['email'])) {
            $errorMessages['email'] = 'メールアドレスは必須です。';
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
        $this->view('contact/confirm',['post' => $post]);
    }

    public function submit()
    {
        $post = $_SESSION['post'] ?? [];
        if (empty($post)) {
            header('Location: /contact/index');
            exit;
        }
        $this->saveToDatabase($post);
        $_SESSION['post'] = [];
        $this->view('contact/complete');
    }

    private function saveToDatabase($post)
    {
        DB::table('contacts')->insert($post);
    }

}

<?php

define('DB_HOST', 'localhost'); // ホスト名
define('DB_USER', 'root');	// ユーザー名
define('DB_PASSWD', 'root');	// パスワード
define('DB_NAME', 'casteria');	// データベース名

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASSWD, DB_NAME);

        if ($this->connection->connect_error) {
            die("データベース接続エラー: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query($sql)
    {
        $result = $this->connection->query($sql);
        if (!$result) {
            die("クエリエラー: " . $this->connection->error);
        }
        return $result;
    }

    public function prepare($sql)
    {
        $stmt = $this->connection->prepare($sql);
        if (!$stmt) {
            die("プリペアドステートメントエラー: " . $this->connection->error);
        }
        return $stmt;
    }

    public function close()
    {
        $this->connection->close();
    }
}

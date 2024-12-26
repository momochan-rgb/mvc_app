<?php

class Contact {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    /**
     * 入力データを保存する
     *
     * @param array $data ユーザーが入力したデータ
     * @return bool 保存成功時はtrue、失敗時はfalse
     */
    public function save($data)
    {
        try {
            $sql = "INSERT INTO contacts (name, kana, tel, email, body, created_at)
                    VALUES (?, ?, ?, ?, ?, NOW())";

            if ($this->db instanceof mysqli) {
                $stmt = $this->db->prepare($sql);

                if (!$stmt) {
                    error_log("MySQLi Error during prepare: " . $this->db->error);
                    return false;
                }

                $stmt->bind_param('sssss', $data['name'], $data['kana'], $data['tel'], $data['email'], $data['body']);

                $result = $stmt->execute();
                
                if (!$result) {
                    error_log("MySQLi Error during execute: " . $stmt->error);
                    return false;
                }

                return true;
            } else {
                error_log("Database connection is not an instance of mysqli.");
                return false;
            }
        } catch (Exception $e) {
            error_log("Database Error: " . $e->getMessage());
            return false;
        }
    }
}

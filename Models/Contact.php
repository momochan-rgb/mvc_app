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

    /**
     * すべての連絡データを取得する
     *
     * @return array データベースから取得した連絡データの配列
     */
    public function getAllContacts()
    {
        try {
            $sql = "SELECT id, name, kana, tel, email, body, created_at FROM contacts ORDER BY created_at DESC";
            $result = $this->db->query($sql);

            if (!$result) {
                error_log("MySQLi Error: " . $this->db->error);
                return [];
            }

            return $result->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            error_log("Database Error: " . $e->getMessage());
            return [];
        }
    }

    public function update(array $data): bool
    {
        try {
            $sql = 'SELECT * FROM contacts WHERE id = ?';
            $stmt = $this->db->prepare($sql);
            if (!$stmt) {
                throw new Exception("SQL準備エラー: " . $this->db->error);
            }
            $stmt->bind_param('i', $data['id']);
            $stmt->execute();
            $result = $stmt->get_result();
            $existingData = $result->fetch_assoc();
            $stmt->close();

            $isModified = false;
            foreach ($data as $key => $value) {
                if (array_key_exists($key, $existingData) && $existingData[$key] != $value) {
                    $isModified = true;
                    break;
                }
            }

            if (!$isModified) {
                return true;
            }

            $sql = 'UPDATE contacts SET name = ?, kana = ?, tel = ?, email = ?, body = ? WHERE id = ?';
            $stmt = $this->db->prepare($sql);

            if (!$stmt) {
                throw new Exception("SQL準備エラー: " . $this->db->error);
            }

            $stmt->bind_param(
                'sssssi',
                $data['name'],
                $data['kana'],
                $data['tel'],
                $data['email'],
                $data['body'],
                $data['id']
            );

            $result = $stmt->execute();
            if (!$result) {
                throw new Exception("SQL実行エラー: " . $stmt->error);
            }

            $stmt->close();
            return $result;
        } catch (Exception $e) {
            error_log("データ更新エラー: " . $e->getMessage());
            return false;
        }
    }

    public function deleteById($id)
    {
        try {
            $sql = "DELETE FROM contacts WHERE id = ?";

            if ($this->db instanceof mysqli) {
                $stmt = $this->db->prepare($sql);
                if (!$stmt) {
                    error_log("MySQLi Error during prepare: " . $this->db->error);
                    return false;
                }

                $stmt->bind_param('i', $id);

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

    public static function findById($id)
    {
        if (!is_numeric($id)) {
            throw new Exception('Invalid ID');
        }

        $db = new Database();
        $stmt = $db->prepare("SELECT * FROM contacts WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return null;
        }

        return $result->fetch_assoc();
    }

}

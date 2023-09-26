<?php
class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($host, $username, $password, $dbname)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect()
    {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối không thành công: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->conn;
    }
}

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getNextId()
    {
        try {
            $conn = $this->db->getConnection();
            $query = "SELECT MAX(id) AS max_id FROM users";
            $stmt = $conn->query($query);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $nextId = $result['max_id'] + 1;
            return $nextId;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function create($username, $password, $fullname)
    {
        try {
            $nextId = $this->getNextId();
            if ($nextId !== false) {
                $conn = $this->db->getConnection();
                $query = "INSERT INTO users (id, username, password, fullname) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->execute([$nextId, $username, $password, $fullname]);
                echo "Thêm thành công! ID: " . $nextId;
            } else {
                echo "Không thể lấy ID.";
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }



    public function read()
    {
        try {
            $conn = $this->db->getConnection();
            $query = "SELECT * FROM users";
            $stmt = $conn->query($query);
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $users;
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
            return [];
        }
    }

    public function update($id, $username, $password, $fullname)
{
    try {
        $conn = $this->db->getConnection();

        // Kiểm tra xem ID đã tồn tại trong bảng users hay không
        if ($this->isIdExists($id)) {
            $query = "UPDATE users SET username=?, password=?, fullname=? WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$username, $password, $fullname, $id]);
            echo "Cập nhật thành công!";
        } else {
            echo "Lỗi: ID không tồn tại!";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

public function delete($id)
{
    try {
        $conn = $this->db->getConnection();

        // Kiểm tra xem ID đã tồn tại trong bảng users hay không
        if ($this->isIdExists($id)) {
            $query = "DELETE FROM users WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$id]);
            echo "Xóa thành công!";
        } else {
            echo "Lỗi: ID không tồn tại!";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}

private function isIdExists($id)
{
    try {
        $conn = $this->db->getConnection();
        $query = "SELECT COUNT(*) FROM users WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$id]);
        $count = $stmt->fetch(PDO::FETCH_COLUMN);
        return $count > 0;
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        return false;
    }
}

}

// Sử dụng các class trên
$hostName = 'localhost';
$userName = 'root';
$password = '';
$database = 'learning_php';

$db = new Database($hostName, $userName, $password, $database);
$db->connect();

$user = new User($db);

// Ví dụ sử dụng:
// $user->create('newuser', 'password123', 'New User');
// $users = $user->read();
// $user->update(6, 'updateduser', 'newpassword', 'Updated User');
// $user->delete(2);

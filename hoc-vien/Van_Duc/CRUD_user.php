<?php
include 'database/Database.php';
$database = new Database();
$db = $database->getConnection();
$exec = new Exec($database);

class Exec {
    private $conn;

    public function __construct($db) {
        $this->conn = $db->getConnection();
    }

    public function createData($table, $data) {
        $columns = implode(', ', array_keys($data));
        $values = ':' . implode(', :', array_keys($data));

        $query = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";

        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateData($table, $data, $id) {
        $columns = '';

        foreach ($data as $key => $value) {
            $columns .= $key . '=:' . $key . ', ';
        }

        $columns = rtrim($columns, ', ');

        $query = "UPDATE {$table} SET {$columns} WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, $value);
        }

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteData($table, $id) {
        $query = "DELETE FROM {$table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getData($table) {
        $query = "SELECT * FROM {$table}";
        $stmt = $this->conn->prepare($query);
        
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Sử dụng:



// Ví dụ sử dụng thao tác xóa dữ liệu từ bảng users
$id = 1;
$table = 'users';

if ($exec->deleteData($table, $id)) {
    echo "Xóa dữ liệu thành công";
} else {
    echo "Lỗi xóa dữ liệu";
}
?>
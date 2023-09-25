<?php
class Database {
    private $host = 'localhost';
    private $databaseName = 'bai_tap_anh_tuan';
    private $username = 'root';
    private $password = '';

    protected $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->databaseName}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Lỗi kết nối: " . $exception->getMessage();
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}
?>
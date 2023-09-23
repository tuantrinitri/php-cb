<?php

##########################  CONNECT TO DATABASE #################################
$hostName = 'localhost';
$userName = 'root';
$password = '';
$database = 'learning_php';

try {
    $dsn = new PDO('mysql:host=' . $hostName . ';dbname=' . $database, $userName, $password);
    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Tạo một class để quản lý kết nối và thao tác với cơ sở dữ liệu
    class UserCRUD
    {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function create($username, $password, $fullname)
        {
            try {
                $conn = $this->db;
                $existingId = $this->getExistingId();
                if ($existingId !== false) {
                    // Nếu ID đã tồn tại, thay thế nó bằng ID mới (ID cũ + 1)
                    $existingId++;
                }
                $query = "INSERT INTO USER (ID, USERNAME, PASSWORD, FULLNAME) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->execute([$existingId, $username, $password, $fullname]);
                echo "Thêm thành công!";
            } catch (PDOException $e) {
                echo "Lỗi: " . $e->getMessage();
            }
        }

        private function getExistingId()
        {
            $conn = $this->db;
            $query = "SELECT MAX(ID) FROM USER"; // Tìm ID lớn nhất trong bảng USER
            $stmt = $conn->query($query);
            $result = $stmt->fetch(PDO::FETCH_COLUMN);
            if ($result !== false) {
                // Tìm thấy ID lớn nhất, trả về giá trị này
                return $result;
            }
            return false; // Trường hợp đặc biệt: bảng USER rỗng, bắt đầu từ ID 1
        }


        public function read()
        {
            try {
                $conn = $this->db;
                $query = "SELECT * FROM USER";
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
                $conn = $this->db;

                // Kiểm tra xem ID đã tồn tại trong bảng USER hay không
                if ($this->isIdExists($id)) {
                    $query = "UPDATE USER SET USERNAME=?, PASSWORD=?, FULLNAME=? WHERE ID=?";
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

        private function isIdExists($id)
        {
            $conn = $this->db;
            $query = "SELECT COUNT(*) FROM USER WHERE ID = ?";
            $stmt = $conn->prepare($query);
            $stmt->execute([$id]);
            $count = $stmt->fetch(PDO::FETCH_COLUMN);
            return $count > 0;
        }


        public function delete($id)
        {
            try {
                $conn = $this->db;

                // Kiểm tra xem ID đã tồn tại trong bảng USER hay không
                if ($this->isIdExists($id)) {
                    $query = "DELETE FROM USER WHERE ID=?";
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
    }

    // Sử dụng class UserCRUD để thao tác với bảng USER
    $userCRUD = new UserCRUD($dsn);

    // Ví dụ sử dụng:
    // $userCRUD->create('newuser', 'password123', 'New User');
    // $users = $userCRUD->read();
    // $userCRUD->update(2, 'updateduser', 'newpassword', 'Updated User');
    // $userCRUD->delete(2);
} catch (PDOException $e) {
    die("Kết nối không thành công: " . $e->getMessage());
}

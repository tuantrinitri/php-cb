<?php

// host name localhost -> là server của MySql thường là localhost = 127.0.0.1
// username root -> tên truy cập vào hệ cơ sở dữ liệu
//password none -> mk truy cập vào sql or mysql
//database -> trên database muốn kết nối
##########################  CONNECT TO DATABASE #################################
//1. mysqli huướng thủ tục
$hostName = 'localhost';
$userName = 'root';
$password = '';
$database = 'learning_php';
//$connectString = mysqli_connect($hostName, $userName, $password, $database);
//if (!$connectString){
//    exit('None connect');
//}
//echo 'Connect success';

//2. mysqli hướng đối tượng
//$connect = new mysqli($hostName, $userName, $password, $database);
//if ($connect->connect_error){
//    exit('Chi tiet loi: '. $connect->connect_error);
//}
//echo 'Connect success';

//3. Kết nối bằng PDO
//-> nó là viết của php data object || tác dụng kết nối nhiều DBO (database object) khaác nhau vd: mysql, mongo ...
// dsn  chứa thông tin databse driver.
// search question  : What is dsn ... type_db = mysql, sql, ...]
//xxx.xxx.xxx.xxx 255
//000.000.000.0001

//port = 3306 -> CSDL  | port = 80 website chính | port= 443 port SSL | port danger = 8090
//TCP  giao thuwcs
//mysql:host=localhost;port=3307;dbname=testdb

$mysqlDsn = 'mysql:host=' . $hostName . ';port=3306' . ';dbname=' . $database;
//echo $mysqlDsn;
try {
    $dsn = new PDO('mysql:host=' . $hostName . ';dbname=' . $database, $userName, $password); // connString 1

    $dsn = new PDO('mysql:host=' . $hostName . ';dbname=' . $database, $userName, $password); // connString2

    $dsn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Thanh cong' . '<br>';
} catch (PDOException $e) {
    die($e->getMessage());
}
//3. ngắt kết nối
//mysqli_close($dsn);
//$dsn = null;

########################## END CONNECT TO DATABASE #################################


##########################  WORK WITH DATABASE #################################
// 1. INSERT DATA ( CRUD)
//1.1 Create -> C -> Insert data to db
////INSERT INTO TABLE_Name (rows) VALUES (value for rows)
$sqlInsert = "INSERT INTO news (id, title, content) VALUES (1, 'Chào các bạn', 'Chào mừng khoa học php')";
//truncate || delete
try {
   $dsn->exec($sqlInsert);
   echo 'đã thực hiện insert vào bảng news';
}
catch (PDOException $e){
   die($e->getMessage());
}

//1.2 Read -> R -> Reading data from table
// SELECT * FROM TABLE_NAME
/// TRUONG HOP CAN LAY DIA CHI CU THE sql
/// SELECT * FROM TABLE_NAME WHERE ROW=?
$sqlComandRead1 = "select * from news";
try {
    // set truy van
    $query = $dsn->prepare($sqlComandRead1);
    // thuc hien truy van
    $query->execute();
    // gan du lieu
    $result = $query;
    $i=1;
  foreach ($result as $item){
      echo 'Dữ liệu thứ:'. $i . " ". $item['content'] . '<br>';
      $i++;
  }
} catch (PDOException $e) {
    die($e->getMessage());
}
//1.3 Update -> U -> Updating data to table
// update table_name set collum ='value new";
// kiem mỏ neo để cập nhập

$sqlComandUpdate = "UPDATE news set title='hello' where id=1";
try {

    $dsn->exec($sqlComandUpdate);
    echo 'thanh cong cap nhap';
} catch (PDOException $e) {
    die($e->getMessage());
}

//1.3 delete -> D -> Deleting data in table
// delete from table_name where = ? || id;
// kiem mỏ neo để xóa

$sqlComandDelete = "delete from news  where id=2";
try {

    $dsn->exec($sqlComandDelete);
    echo 'thanh cong xoa';
} catch (PDOException $e) {
    die($e->getMessage());
}


///HOME WORK
/// TAO TABLE USER CÓ CÁC CỘT ID, USERNAME, PASSWORD, FULLNAME
/// 1. THỰC HIỆN CHUYỂN LỚP KẾT NỐI SQL THÀNH 1 CLASS
/// 2. TẠO CLASS EXCEC CÓ CÁC FUNCTION CRUD VỚI TABLE TRÊN

class User
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createUser($username, $password, $fullname)
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO user (username, password, fullname) VALUES (?, ?, ?)");
            $stmt->execute([$username, $password, $fullname]);
            echo 'User created successfully' . '<br>';
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function readUser($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM user WHERE id = ?");
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateUser($id, $username, $password, $fullname)
    {
        try {
            $stmt = $this->db->prepare("UPDATE user SET username = ?, password = ?, fullname = ? WHERE id = ?");
            $stmt->execute([$username, $password, $fullname, $id]);
            echo 'User updated successfully' . '<br>';
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteUser($id)
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM user WHERE id = ?");
            $stmt->execute([$id]);
            echo 'User deleted successfully' . '<br>';
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}



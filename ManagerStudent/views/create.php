<!DOCTYPE html>
<html>
<body>
<?php
require ('../helper_function.php');
require ('../create.php');
$nofi = ''; // Khởi tạo biến $nofi

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['fullname']) && !empty($_POST['birthday']) && !empty($_POST['code'])) {
        $data = $_POST;
        $result = create($data['id'], $data['fullname'], $data['birthday'], $data['code']);
        echo $result->id;
        if ($result){
            $nofi = 'Thêm sinh viên thành công.';
        } else {
            $nofi = 'Thêm sinh viên thất bại.';
        }
    } else {
        $nofi = 'Vui lòng điền đầy đủ thông tin.';
    }
}
?>
<h1>Thêm sinh viên</h1>
<h1><?php echo $nofi; ?></h1>
<form action="" method="POST">
    <input type="number" name="id"> ID: Sinh Vien<br><br>
    <label for="fullname">Full name:</label>
    <input type="text" name="fullname"><br><br>

    <label for="fullname">Code:</label>
    <input type="text" name="code"><br><br>

    <label for="">Birthday:</label>
    <input type="text" name="birthday"><br><br>
    <input type="submit" value="Submit">
</form>

<p>Click the "Submit" button and the form-data will be sent to a page on the
    server called "index.php" function create in index.php.</p>

</body>
</html>

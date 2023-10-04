<!DOCTYPE html>
<html>
<head>
    <title>Quản lý Sinh viên</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Quản lý Sinh viên</h1>
    <form id="addStudentForm">
        <label for="name">Tên sinh viên:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Thêm sinh viên</button>
    </form>
    <ul id="studentList">
        <!-- Danh sách sinh viên sẽ được cập nhật ở đây -->
    </ul>
    <script>
        // Xử lý yêu cầu Ajax ở đây
    </script>
</body>
</html>


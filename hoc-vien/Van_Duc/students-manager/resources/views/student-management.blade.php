<!-- resources/views/student-management.blade.php -->

<form id="addStudentForm">
    <label for="name">Tên sinh viên:</label>
    <input type="text" id="name" name="name" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Thêm sinh viên</button>
</form>

<ul>
    @foreach ($students as $student)
        <li>{{ $student->name }} - {{ $student->email }}</li>
    @endforeach
</ul>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Gửi AJAX request khi trang được tải
            $.ajax({
                url: '/api/students', // Thay đổi đường dẫn API tương ứng
                method: 'GET',
                success: function(data) {
                    // Xử lý dữ liệu JSON và cập nhật danh sách sinh viên
                    var studentList = $('#studentList');
                    $.each(data, function(index, student) {
                        studentList.append('<li>' + student.name + ' - ' + student.email + '</li>');
                    });
                },
                error: function(error) {
                    console.error('Lỗi khi tải danh sách sinh viên', error);
                }
            });
        });
    </script>
// Gửi yêu cầu Ajax để thêm sinh viên
$('#addStudentForm').on('submit', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: '/students',
        data: formData,
        success: function(response) {
            alert(response.message); // Hiển thị thông báo thành công
            // Xóa nội dung của biểu mẫu sau khi thêm thành công
            $('#name').val('');
            $('#email').val('');
            // Cập nhật danh sách sinh viên
            fetchStudentList(); // Hàm này cần được viết để lấy danh sách sinh viên và cập nhật giao diện
        },
        error: function(error) {
            alert('Có lỗi xảy ra.'); // Xử lý lỗi
        }
    });
});

// Hàm để lấy danh sách sinh viên và cập nhật giao diện
function fetchStudentList() {
    $.ajax({
        type: 'GET',
        url: '/students',
        success: function(response) {
            var studentList = $('#studentList');
            studentList.empty(); // Xóa danh sách hiện tại
            $.each(response.students, function(index, student) {
                // Thêm mỗi sinh viên vào danh sách
                studentList.append('<li>' + student.name + ' - ' + student.email + '</li>');
            });
        },
        error: function(error) {
            alert('Có lỗi xảy ra khi lấy danh sách sinh viên.'); // Xử lý lỗi
        }
    });
}
// Gửi yêu cầu Ajax để thêm sinh viên
$('#addStudentForm').on('submit', function(e) {
    e.preventDefault();
    var formData = $(this).serialize();
    $.ajax({
        type: 'POST',
        url: '/students',
        data: formData,
        success: function(response) {
            alert(response.message); // Hiển thị thông báo thành công
            // Xóa nội dung của biểu mẫu sau khi thêm thành công
            $('#name').val('');
            $('#email').val('');
            // Cập nhật danh sách sinh viên
            fetchStudentList();
        },
        error: function(error) {
            alert('Có lỗi xảy ra.'); // Xử lý lỗi
        }
    });
});

// Hàm để lấy danh sách sinh viên và cập nhật giao diện
function fetchStudentList() {
    $.ajax({
        type: 'GET',
        url: '/',
        success: function(response) {
            var studentList = $('#studentList');
            studentList.empty(); // Xóa danh sách hiện tại
            $.each(response.students, function(index, student) {
                // Thêm mỗi sinh viên vào danh sách
                studentList.append('<li>' + student.name + ' - ' + student.email + '</li>');
            });
        },
        error: function(error) {
            alert('Có lỗi xảy ra khi lấy danh sách sinh viên.'); // Xử lý lỗi
        }
    });
}

// Gọi hàm fetchStudentList khi trang web được tải
$(document).ready(function() {
    fetchStudentList();
});

// Gọi hàm fetchStudentList khi trang web được tải
$(document).ready(function() {
    fetchStudentList();
});

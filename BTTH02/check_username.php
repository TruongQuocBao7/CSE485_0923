<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "123", "btth01_cse485");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Lỗi kết nối cơ sở dữ liệu: " . $conn->connect_error);
}

// Lấy giá trị username từ yêu cầu AJAX
$username = $_POST['username'];

// Truy vấn kiểm tra username
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

// Kiểm tra xem có bản ghi trùng khớp hay không
if ($result->num_rows > 0) {
    // Tồn tại username trong cơ sở dữ liệu
    echo "false";
} else {
    // Không tồn tại username trong cơ sở dữ liệu
    echo "true";
}

// Đóng kết nối cơ sở dữ liệu
$conn->close();
?>
<?php
if (isset($_GET['id'])) {
    // Kết nối đến cơ sở dữ liệu MySQL
    include('connection.php');

    // Lấy dữ liệu từ biểu mẫu
    $id = $_GET['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $current_group = $_POST['current_group'];
    $mobiel = $_POST['mobiel'];
    $birthday = $_POST['birthday'];

    $sql = "update users
    set fullname = '$fullname', email = '$email', gender = '$gender', current_group = '$current_group', mobiel = '$mobiel', birthday = '$birthday'
    where id = $id";
    $conn->query($sql);
    $conn->close();
    header('location: http://localhost/bai2/index.php');
    exit();
}?>
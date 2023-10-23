<?php
include('connection.php');
$sql = "SELECT COUNT(*) AS total FROM users";

$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $total = $row['total'];
    }      
} 
$id = $total +1;

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$current_group = $_POST['current_group'];
$mobiel = $_POST['mobiel'];
$birthday = $_POST['birthday'];

//Kiểm tra bằng biểu thức chính quy
$emailPattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
$fullNamePattern = "/^[A-Z][a-zA-Z\-\.]*$/";
$phoneNumberPattern = "/^\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{4}$/";
$datePattern = "/^\d{4}-\d{2}-\d{2}$/";

$sql = "insert into users
values ($id ,'image/default.jpg','$fullname','$email','$gender','$current_group','$mobiel','$birthday');";
$conn->query($sql);
$conn->close();
header('location: http://localhost/bai2/index.php');
exit();?>
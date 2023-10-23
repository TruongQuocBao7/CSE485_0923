<?php
// Khởi động session
session_start();

// Hủy bỏ tất cả các biến session
$_SESSION = array();

// Huỷ phiên làm việc
session_destroy();
?>
<?php
    session_start(); // Bắt đầu session

    // Hủy bỏ tất cả các biến session
    $_SESSION = array();
    
    // Hủy bỏ session
    session_destroy();
?>

<script>
    function checkUsername() {
        var username = document.getElementById("username").value;

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "check_username.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;
                if (response === "false") {
                    // Username đã tồn tại trong cơ sở dữ liệu
                    alert("Username đã tồn tại. Vui lòng chọn một username khác.");
                    
                } else {
                    // Username không tồn tại trong cơ sở dữ liệu
                }
            }
        };
        xhr.send("username=" + encodeURIComponent(username));
    }
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music For Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/homepage.css">
</head>
<script>
    function validateForm(event) 
    {
        var email = document.forms["loginForm"]["email"].value;
        var username = document.forms["loginForm"]["username"].value;
        var password1 = document.forms["loginForm"]["password1"].value;
        var password2 = document.forms["loginForm"]["password2"].value;

        // Kiểm tra xem các trường đã được nhập hay chưa
        if (username === "") {
            alert("Vui lòng nhập tên người dùng.");
            return false;
        }
        if (email === "") {
            alert("Vui lòng nhập địa chỉ email.");
            return false;
        }
        if (password1 === "") {
            alert("Vui lòng nhập mật khẩu.");
            return false;
        }
        if (password2 === "") {
            alert("Vui lòng nhập lại mật khẩu.");
            return false;
        }

        // Kiểm tra password1 và password2 có khớp nhau
        if (password1 !== password2) {
            alert("Mật khẩu không khớp. Vui lòng nhập lại.");
            return false;
        }

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "check_username.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var response = xhr.responseText;

                if (response === "false") {
                    // Username đã tồn tại trong cơ sở dữ liệu
                    alert("Username đã tồn tại. Vui lòng chọn một username khác.");
                    event.preventDefault();
                    return false;

                } else {
                    // Username không tồn tại trong cơ sở dữ liệu
                    // Gửi form
                }
            }
        };
        xhr.send("username=" + encodeURIComponent(username));
    }
</script>

<body class="mx-5">
    
    <?php include('header.php'); ?>
    
    <div class="m-5">
        <div class="d-flex justify-content-center align-items-center">
            <div style="width:25rem; height:23.5rem">
                <form class="login rounded-2" action="post/post_add_user.php" method="post" name="loginForm" onsubmit="return validateForm();">

                    <div class="d-flex align-items-center header_menu justify-content-between">
                        <h4 class="text-white ms-3">Sign In</h4>
                        <div class="d-icon">
                            <img src="img/icons8-facebook-50.png" alt="" class="icon">
                            <img src="img/icons8-google-plus-squared-48.png" alt="" class="icon">
                            <img src="img/icons8-twitter-squared-30.png" alt="" class="icon">
                        </div>
                    </div>

                    <div class="p-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-person-fill"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="username" aria-label="username" aria-describedby="basic-addon1" name="username" id="username" onchange="checkUsername()">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-envelope-at-fill"></i>
                            </span>
                            <input type="email" class="form-control" placeholder="email" aria-label="email" aria-describedby="basic-addon1" name="email">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">
                                <i class="bi bi-person-rolodex"></i>
                            </label>
                            <select class="form-select" id="inputGroupSelect01" name="role">
                                <option value="admin" selected>admin</option>
                                <option value="user">user</option>
                                <option value="author">author</option>  
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1" name="password1">
                        </div>

                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">
                                <i class="bi bi-key-fill"></i>
                            </span>
                            <input type="password" class="form-control" placeholder="Re-type Password" aria-label="password" aria-describedby="basic-addon1" name="password2">
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary bg-warning text-dark border-0 px-4">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-footer text-center border-top border-3 border-dark mx-5">
        <span class="fs-5">TLU'S MUSIC GARDEN</span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    var element = document.getElementById('dangnhap');
    element.className = 'nav-link active';
</script>
</html>
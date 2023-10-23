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
<body class="mx-5">
    <header class="bg-light-subtle w-80 mx-5 p-1 px-4 shadow">
        <div class="d-flex align-items-center header_menu justify-content-between">
            <div>
                <a href="http://localhost/BTTH01_CSE485_ex02/"><img src="img/client_id_121_logo_1446513478.8228.jpg" alt="" height="100rem"></a>
                <a href="http://localhost/BTTH01_CSE485_ex02/"><span class="text-black-50">TRANG CHỦ</span></a>
                <a href="http://localhost/BTTH01_CSE485_ex02/login.php"><span class="text-black">ĐĂNG NHẬP</span></a>
            </div>
            <div class="fix_Point">
                <div class="form-searchs">
                    <form class="form-group d-flex align-items-center">
                        <input class="form-control" id="" placeholder="Nội dung cần tìm">
                        <button type="button" class="btn btn-outline-success">Tìm</button>
                    </form>
                </div>
            </div>
        </div>
    </header>
    
    <div class="m-5">
        <div class="d-flex justify-content-center align-items-center">
            <div style="width:25rem; height:23.5rem">
                <form class="login rounded-2" action="post/post_login.php" method="post">

                    <div class="d-flex align-items-center header_menu justify-content-between">
                        <h4 class="text-white ms-3">Sign In</h4>
                        <div class="d-icon">
                            <img src="img/icons8-facebook-50.png" alt="" class="icon">
                            <img src="img/icons8-google-plus-squared-48.png" alt="" class="icon">
                            <img src="img/icons8-twitter-squared-30.png" alt="" class="icon">
                        </div>
                    </div>

                    <div class="border-top border-bottom border-1 border-black p-3 sign_in">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                            <input type="text" class="form-control" placeholder="username" aria-label="username" aria-describedby="basic-addon1" name="username">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                            <input type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon1" name="password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label text-white" for="exampleCheck1">Remember Me</label>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary bg-warning text-dark border-0 px-4">
                                login
                            </button>
                        </div>
                    </div>

                    <div class="card-footer text-center mess">
                        <span style="font-weight: 500;">
                            Don't have an account?<a href="" class="text-warning">Sign up</a><br>
                            <a href="" class="text-warning">Forgot your password?</a>
                        </span>
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
</html>
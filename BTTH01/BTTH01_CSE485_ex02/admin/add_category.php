<?php
    if(!isset($_GET['admin']) ){
        header("location: http://localhost/BTTH01_CSE485_ex02/login.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music For Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body class="mx-5">
    <header class="bg-light-subtle w-80 mx-5 p-4 shadow">
        <div class="logo">
            <h3>Administration</h3>
            <a href="http://localhost/BTTH01_CSE485_ex02/admin/index.php?admin=true"><span class="text-black-50">Trang chủ</span></a>
            <a href="http://localhost/BTTH01_CSE485_ex02/"><span class="text-black-50">Trang ngoài</span></a>
            <a href="http://localhost/BTTH01_CSE485_ex02/admin/category.php?admin=true"><span class="text-black-50">Thể loại</span></a>
            <a href="http://localhost/BTTH01_CSE485_ex02/admin/author.php?admin=true"><span class="text-black">Tác giả</span></a>
            <a href="http://localhost/BTTH01_CSE485_ex02/admin/song.php?admin=true"><span class="text-black-50">Bài viết</span></a>
        </div>
    </header>
    
    <div class="m-5 text-center">
        <div class="mx-5">
            <form action="../post/post_add_category.php" method="post">
                <h2 class="mb-4">THÊM MỚI THỂ LOẠI</h2>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Tên thể loại</span>
                    <input type="text" class="form-control me-5" aria-label="ten_tloai" aria-describedby="addon-wrapping" name="ten_tloai">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5">
                    <button type="submit" class="btn btn-success px-4 m-0">Thêm</button>
                    <a href="http://localhost/BTTH01_CSE485_ex02/admin/category.php?admin=true">
                        <button type="button" class="btn btn-warning px-4 m-0">Quay lại</button>
                    </a>
                </div>
            </form>
        </div>
    </div>

    <div class="card-footer text-center border-top border-3 border-dark mx-5">
        <span class="fs-5">TLU'S MUSIC GARDEN</span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
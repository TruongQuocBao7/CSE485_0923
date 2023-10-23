<?php
    if(isset($_GET['admin'])){

        try{
            //Buoc 1: Mo ket noi
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM users;";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $users = $stmt->rowCount();

            $sql = "SELECT * FROM theloai;";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $tloai = $stmt->rowCount();

            $sql = "SELECT * FROM tacgia;";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $tgia = $stmt->rowCount();

            $sql = "SELECT * FROM baiviet;";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $bviet = $stmt->rowCount();

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }else{
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
    
    <div class="mx-5">
        <div class="m-5">
            <div class="row mx-5" style="justify-content: space-around;">
                <div class="card" style="width: 10rem;">
                    <div class="card-body text-center">
                        <p class="card-text text-primary">Người dùng</p>
                        <h3><?php echo $users;?></h3>
                    </div>
                </div>

                <div class="card" style="width: 10rem;">
                    <div class="card-body text-center">
                        <p class="card-text text-primary">Thể loại</p>
                        <h3><?php echo $tloai;?></h3>
                    </div>
                </div>

                <div class="card" style="width: 10rem;">
                    <div class="card-body text-center">
                        <p class="card-text text-primary">Tác giả</p>
                        <h3><?php echo $tgia;?></h3>
                    </div>
                </div>

                <div class="card" style="width: 10rem;">
                    <div class="card-body text-center">
                        <p class="card-text text-primary">Bài viết</p>
                        <h3><?php echo $bviet;?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-footer text-center border-top border-3 border-dark mx-5">
        <span class="fs-5">TLU'S MUSIC GARDEN</span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
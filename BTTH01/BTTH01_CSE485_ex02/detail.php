<?php
    if(isset($_GET['ma_bviet'])){
        $ma_bviet = $_GET['ma_bviet'];
    }

    try{
        //Buoc 1: Mo ket noi
        $conn = new PDO("mysql:host=Localhost;dbname=BTTH01_CSE485", "root","123");
        //Buoc 2: Thuc hien truy van
        $sql = "SELECT baiviet.*, tacgia.ten_tgia, theloai.ten_tloai
        FROM baiviet
        JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia
        JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
        WHERE baiviet.ma_bviet = $ma_bviet;";
        //    $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        //Buoc 3: Xu ly ket qua
        $baiviet = $stmt->fetchAll();
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music For Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homepage.css">
</head>
<body class="mx-5">
    <header class="bg-light-subtle w-80 mx-5 p-1 px-4 shadow">
        <div class="d-flex align-items-center header_menu justify-content-between">
            <div>
                <a href="http://localhost/BTTH01_CSE485_ex02/index.php"><img src="img/client_id_121_logo_1446513478.8228.jpg" alt="" height="100rem"></a>
                <a href="http://localhost/BTTH01_CSE485_ex02/index.php"><span class="text-black">TRANG CHỦ</span></a>
                <a href="http://localhost/BTTH01_CSE485_ex02/login.php"><span class="text-black-50">ĐĂNG NHẬP</span></a>
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
    
    <div class="m-5 mb-3">
        <div class="d-flex justify-content-center">
            <div style="width:21rem;">
                <img src="<?php echo $baiviet[0]['hinhanh'];?>" alt="" style="height:10rem; width:20rem">
            </div>
            
            <div class="w-75">
                <h5 class="text-primary"><?php echo $baiviet[0]['tieude'];?></h5>
                <p><span>Bài hát: </span><?php echo $baiviet[0]['ten_bhat'];?></p>
                <p><span>Thể loại: </span><?php echo $baiviet[0]['ten_tloai'];?></p>
                <p><span>Tóm tắt: </span><?php echo $baiviet[0]['tomtat'];?></p>
                <p><span>Nội dung: </span><?php echo $baiviet[0]['noidung'];?></p>
                <p><span>Tác giả: </span><?php echo $baiviet[0]['ten_tgia'];?></p>
            </div>
        </div>
    </div>
    
    <div class="card-footer text-center border-top border-3 border-dark mx-5">
        <span class="fs-5">TLU'S MUSIC GARDEN</span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
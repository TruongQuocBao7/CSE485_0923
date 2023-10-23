<?php
    try{
        //Buoc 1: Mo ket noi
        $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
        //Buoc 2: Thuc hien truy van
        $sql = "SELECT baiviet.*
        FROM baiviet
        INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai
        WHERE theloai.ten_tloai = 'Nhạc trữ tình';";
        //    $conn->query($sql);
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        //Buoc 3: Xu ly ket qua
        $baiviets = $stmt->fetchAll();
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
    <div id="carouselExampleIndicators" class="carousel slide mx-5">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="img/p0fgjfnl.jpg" class="d-block w-100" alt="..." height="500rem">
            </div>
            <div class="carousel-item">
            <img src="img/img2.jpg" class="d-block w-100" alt="..." height="500rem">
            </div>
            <div class="carousel-item">
            <img src="img/img3.jpg" class="d-block w-100" alt="..." height="500rem">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <div class="mx-5">
        <div class="d-flex justify-content-center align-items-center" style="height: 4rem;">
            <span class="text-primary fs-4">TOP BÀI HÁT YÊU THÍCH</span>
        </div>
        <div class="row">
        <?php
        foreach ($baiviets as $baiviet) {
        ?>
            <a href="detail.php?ma_bviet=<?php echo $baiviet['ma_bviet'];?>" class="mb-2">
                <div style="display:inline;" class="text-center">
                    <div style="display:inline; flex-wrap: wrap;" class="d-flex justify-content-center align-items-center">
                        <img src="<?php echo $baiviet['hinhanh'];?>" alt="" height="180rem" width="100%" style="border: 1px solid black;" class="rounded-top-2">
                        <br>
                        <div style="border: 1px solid black; width:100%; height:3rem" class="rounded-bottom-2 d-flex justify-content-center align-items-center">
                            <span class="fs-6"><?php echo $baiviet['ten_bhat'];?></span>
                        </div>
                    </div>
                </div>
            </a>
        <?php } ?>
        </div>
    </div>

    <div class="card-footer text-center border-top border-3 border-dark mx-5">
        <span class="fs-5">TLU'S MUSIC GARDEN</span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
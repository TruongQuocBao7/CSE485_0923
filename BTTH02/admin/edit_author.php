<?php
    session_start();

    if(!isset($_SESSION['isLogin'])||$_SESSION['isLogin']!='admin'){
        header("location: ../login.php");
    }

    if(isset($_GET['id'])){
        $ma_tgia=$_GET['id'];

        try{
            //Buoc 1: Mo ket noi
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM tacgia WHERE ma_tgia='$ma_tgia';";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xu ly ket qua
            $tgia = $stmt->fetchAll();

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
        
    }else{
        header("location: author.php");
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

    <?php include('header.php'); ?>
    
    <div class="m-5 text-center">
        <div class="mx-5">
            <form action="../post/post_edit_author.php" method="post">
                <h2 class="mb-4">SỬA THÔNG TIN TÁC GIẢ</h2>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Mã tác giả</span>
                    <input type="text" class="form-control me-5" aria-label="ma_tgia" aria-describedby="addon-wrapping" name="ma_tgia" value="<?php echo $tgia[0]['ma_tgia']; ?>" readonly>
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Tên tác giả</span>
                    <input type="text" class="form-control me-5" aria-label="ten_tgia" aria-describedby="addon-wrapping" name="ten_tgia" value="<?php echo $tgia[0]['ten_tgia']; ?>">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Hình tác giả</span>
                    <input type="text" class="form-control me-5" aria-label="hinh_tgia" aria-describedby="addon-wrapping" name="hinh_tgia" value="<?php echo $tgia[0]['hinh_tgia']; ?>">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5">
                    <button type="submit" class="btn btn-success px-4 m-0">Lưu lại</button>
                    <a href="../author.php?admin=true">
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
<script>
    var element = document.getElementById('tacgia');
    element.className = 'nav-link active';
</script>
<?php
include("logout_js.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
<?php
    session_start();

    if(!isset($_SESSION['isLogin'])||$_SESSION['isLogin']=='user'){
        header("location: ../login.php");
    }

    try{
        //Buoc 1: Mo ket noi
        $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
        //Buoc 2: Thuc hien truy van
        $sql = "SELECT * FROM tacgia;";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        //Buoc 3: Xu ly ket qua
        $tgias = $stmt->fetchAll();

        $sql = "SELECT * FROM theloai;";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        //Buoc 3: Xu ly ket qua
        $tloais = $stmt->fetchAll();

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../css/homepage.css">
</head>
<body class="mx-5">
    
    <?php include('header.php'); ?>
    
    <div class="m-5 text-center">
        <div class="mx-5 row">
            <div class="row">
                <table class="table">
                    <h5 class="mb-4">Tác giả</h5>
                    <theads">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <th scope="col">Hình tác giả</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tgias as $tgia) {
                        ?>
                            <tr>
                                <th scope="row"> <?php echo $tgia['ma_tgia']; ?></th>
                                <td><?php echo $tgia['ten_tgia']; ?></td>
                                <td><?php echo $tgia['hinh_tgia']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                
                <table class="table">
                    <h5 class="mb-4">Thể loại</h5>
                    <theads">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($tloais as $tloai) {
                        ?>
                            <tr>
                                <th scope="row"> <?php echo $tloai['ma_tloai']; ?></th>
                                <td><?php echo $tloai['ten_tloai']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>

            <form action="../post/post_add_song.php" method="post">
                <h2 class="mb-4">THÊM MỚI BÀI VIẾT</h2>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Tiêu đề</span>
                    <input type="text" class="form-control me-5" aria-label="tieude" aria-describedby="addon-wrapping" name="tieude">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Tên bài hát</span>
                    <input type="text" class="form-control me-5" aria-label="ten_bhat" aria-describedby="addon-wrapping" name="ten_bhat">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Mã thể loại</span>
                    <input type="text" class="form-control me-5" aria-label="ma_tloai" aria-describedby="addon-wrapping" name="ma_tloai">
                </div>
                <div class="form-floating mx-5 mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="tomtat"></textarea>
                    <label for="floatingTextarea2">Tóm tắt</label>
                </div>
                <div class="form-floating mx-5 mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="noidung"></textarea>
                    <label for="floatingTextarea2">Nội dung</label>
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Mã tác giả</span>
                    <input type="text" class="form-control me-5" aria-label="ma_tgia" aria-describedby="addon-wrapping" name="ma_tgia">
                </div>
                <div class="input-group flex-nowrap mb-3">
                    <span class="input-group-text ms-5" id="addon-wrapping">Hình ảnh</span>
                    <input type="text" class="form-control me-5" aria-label="hinhanh" aria-describedby="addon-wrapping" name="hinhanh">
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end me-5">
                    <button type="submit" class="btn btn-success px-4 m-0">Thêm</button>
                    <a href="song.php?admin=true">
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
    var element = document.getElementById('baiviet');
    element.className = 'nav-link active';
</script>
<?php
include("logout_js.php");
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>
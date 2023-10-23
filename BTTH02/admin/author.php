<?php
    session_start();

    if(!isset($_SESSION['isLogin'])||$_SESSION['isLogin']!='admin'){
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
    
    <div class="m-5">
        <div class="mx-5">
            <div class="mx-5">
                <a href="add_author.php?admin=true">
                    <button type="button" class="btn btn-success">Thêm mới</button>
                </a>
                <table class="table">
                    <theads">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên tác giả</th>
                            <th scope="col">Hình tác giả</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xoá</th>
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
                                <td>
                                    <a class="fs-4 color-primary" href="edit_author.php?admin=true&id=<?php echo $tgia['ma_tgia']; ?>">
                                        <i class="bi bi-journal-plus"></i>
                                    </a>
                                </td>
                                <td>
                                    <a class="fs-4 color-primary user-delete-link" href="" data-bs-toggle="modal" data-bs-target="#modal<?php echo $tgia['ma_tgia'];?>">
                                        <i class="bi bi-trash-fill"></i>
                                    </a>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade" id="modal<?php echo $tgia['ma_tgia'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE author</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Bạn có chắc chắn muốn xóa tác giả có id: <?php echo $tgia['ma_tgia']; ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="../post/post_delete_author.php?admin=true&id=<?php echo $tgia['ma_tgia']; ?>"><button type="button" class="btn btn-primary">Yes</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card-footer text-center border-top border-3 border-dark mx-5">
        <span class="fs-5">TLU'S MUSIC GARDEN</span>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    var element = document.getElementById('tacgia');
    element.className = 'nav-link active';
</script>
<?php
include("logout_js.php");
?>
</html>
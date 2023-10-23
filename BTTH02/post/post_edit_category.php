<?php
    session_start();

    if(!isset($_SESSION['isLogin'])){
        header("location: ../login.php");
    }
    
    if(isset($_POST['ma_tloai']) && isset($_POST['ten_tloai'])){
        $ma_tloai = $_POST['ma_tloai'];
        $ten_tloai = $_POST['ten_tloai'];

        try{
            //Buoc 1: Ket noi DBServer
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van
            
            $sql = "UPDATE theloai
            SET ten_tloai = '$ten_tloai'
            WHERE ma_tloai='$ma_tloai'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header("location: ../admin/category.php?admin=true");
            exit();
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        header("location: ../admin/edit_category.php?admin=true");
        exit();
    }
?>
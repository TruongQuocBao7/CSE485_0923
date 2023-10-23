<?php
    session_start();

    if(!isset($_SESSION['isLogin'])){
        header("location: ../login.php");
    }
    
    if(isset($_GET['id'])){
        $ma_bviet = $_GET['id'];

        try{
            //Buoc 1: Ket noi DBServer
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van
            
            $sql = "DELETE FROM baiviet WHERE ma_bviet='$ma_bviet'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header("location: ../admin/song.php?admin=true");
            exit();
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        header("location: ../admin/song.php?admin=true");
        exit();
    }
?>
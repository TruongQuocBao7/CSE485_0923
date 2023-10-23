<?php
    if(isset($_POST['ID']) && isset($_POST['tenSinhvien']) 
    && isset($_POST['email']) && isset($_POST['ngaySinh']) 
    && isset($_POST['idLop'])){
        $id = $_POST['ID'];
        $tenSinhvien = $_POST['tenSinhvien'];
        $email = $_POST['email'];
        $ngaySinh = $_POST['ngaySinh'];
        try{
            //Buoc 1: Ket noi DBServer
            $conn = new PDO("mysql:host=localhost;dbname=quanlysinhvien", "root","123");
            //Buoc 2: Thuc hien truy van

            $sql = "SELECT * FROM sinhvien WHERE ID='$id';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<=0){
                header("location: http://localhost/BTTH03/app/home/views/index.php");
                exit();
            }

            $sql = "SELECT * FROM theloai WHERE ma_tloai='$ma_tloai';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<=0){
                header("location: http://localhost/BTTH03/app/home/views/index.php");
                exit();
            }
    
            //Buoc 3: Xử lý kết quả

            $sql = "UPDATE sinhvien
            SET tenSinhvien = '$tenSinhvien', email = '$email', ngaySinh = '$ngaySinh', idLop = '$idLop'
            WHERE ID ='$id';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header("location: http://localhost/BTTH03/app/home/views/index.php");
            exit();
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        header("location: http://localhost/BTTH03/app/home/views/index.php");
        exit();
    }
?>
<?php
    if(isset($_POST['tieude']) && isset($_POST['ten_bhat']) 
    && isset($_POST['ma_tloai']) && isset($_POST['tomtat']) 
    && isset($_POST['noidung']) && isset($_POST['ma_tgia'])
    && isset($_POST['hinhanh']) && isset($_POST['ma_bviet'])){
        $ma_bviet = $_POST['ma_bviet'];
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $ma_tloai = $_POST['ma_tloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $ma_tgia = $_POST['ma_tgia'];
        $hinhanh = $_POST['hinhanh'];

        try{
            //Buoc 1: Ket noi DBServer
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van

            $sql = "SELECT * FROM tacgia WHERE ma_tgia='$ma_tgia';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<=0){
                header("location: http://localhost/BTTH01_CSE485_ex02/admin/add_song.php?admin=true");
                exit();
            }

            $sql = "SELECT * FROM theloai WHERE ma_tloai='$ma_tloai';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            if ($stmt->rowCount()<=0){
                header("location: http://localhost/BTTH01_CSE485_ex02/admin/add_song.php?admin=true");
                exit();
            }
    
            //Buoc 3: Xử lý kết quả

            $sql = "UPDATE baiviet
            SET tieude = '$tieude', ten_bhat = '$ten_bhat', ma_tloai = '$ma_tloai', tomtat = '$tomtat', noidung = '$noidung', ma_tgia = '$ma_tgia'
            WHERE ma_bviet='$ma_bviet';";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header("location: http://localhost/BTTH01_CSE485_ex02/admin/song.php?admin=true");
            exit();
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        header("location: http://localhost/BTTH01_CSE485_ex02/admin/add_song.php?admin=true");
        exit();
    }
?>
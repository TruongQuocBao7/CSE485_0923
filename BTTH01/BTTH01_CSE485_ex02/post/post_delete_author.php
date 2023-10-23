<?php
    if(isset($_GET['id'])){
        $ma_tgia = $_GET['id'];

        try{
            //Buoc 1: Ket noi DBServer
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van
            
            $sql = "DELETE FROM tacgia WHERE ma_tgia='$ma_tgia'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header("location: http://localhost/BTTH01_CSE485_ex02/admin/author.php?admin=true");
            exit();
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        header("location: http://localhost/BTTH01_CSE485_ex02/admin/author.php?admin=true");
        exit();
    }
?>
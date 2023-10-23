<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        try{
            //Buoc 1: Ket noi DBServer
            $conn = new PDO("mysql:host=localhost;dbname=quanlysinhvien", "root","123");
            //Buoc 2: Thuc hien truy van
            
            $sql = "DELETE FROM sinhvien WHERE ID='$id'";
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
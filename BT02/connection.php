<?php
    try{
        $conn = new PDO("mysql:host=localhost;dbname=cse","root","123");
        $sql="DELETE FROM USERS WHERE userid=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rowcount=$stmt->rowCount();
        if($rowcount>0){
            header("Location: user_management.php?success=$id");
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>
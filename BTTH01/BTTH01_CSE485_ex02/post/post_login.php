<?php
    if(isset($_POST['username']) && isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        try{
            //Buoc 1: Mo ket noi
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM users 
            WHERE username = '$username' AND password = '$password';";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xu ly ket qua
            if($stmt->rowCount()>0) {
                $user = $stmt->fetchAll();
                if ($user[0]['role']!="admin"){
                    header("location: http://localhost/BTTH01_CSE485_ex02/login.php");
                    exit();
                }

                header("location: http://localhost/BTTH01_CSE485_ex02/admin/index.php?admin=true");
                exit();
            }else{
                header("location: http://localhost/BTTH01_CSE485_ex02/login.php");
                exit();
            }

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }else{
        header("location: http://localhost/BTTH01_CSE485_ex02/login.php");
        exit();
    }
?>
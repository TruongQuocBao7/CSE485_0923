<?php
if(isset($_POST['username']) && isset($_POST['email'])
&& isset($_POST['password1']) && isset($_POST['role'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $role = $_POST['role'];

    try{
        //Buoc 1: Ket noi DBServer
        $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
        //Buoc 2: Thuc hien truy van
        $sql_check = "SELECT * FROM users WHERE username = '$user' OR email='$email'";
        $stmt = $conn->prepare($sql_check);
        $stmt->execute();

        if($stmt->rowCount()>0){
            header("Location: ../signup.php?error=existed");
        }else{
            $pass_hash = password_hash($pass1, PASSWORD_DEFAULT);
            $sql_insert = "INSERT INTO users (username, password, email, role) VALUES ('$username', '$pass_hash', '$email', '$role')";

            //Buoc 3: Xử lý kết quả
            $stmt = $conn->prepare($sql_insert);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                session_start();
                $_SESSION['verify'] = $email;
                header("Location: ../verify_email.php");
                exit();
            }
        }
        

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}else{
    header("location: ../signup.php");
    exit();
}
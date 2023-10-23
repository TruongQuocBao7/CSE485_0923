<?php

    include("../PHPMailer/src/Exception.php");
    include("../PHPMailer/src/PHPMailer.php");
    include("../PHPMailer/src/SMTP.php");

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    if(isset($_POST['username'])){
        $username = $_POST['username'];

        try{
            //Buoc 1: Mo ket noi
            $conn = new PDO("mysql:host=localhost;dbname=BTTH01_CSE485", "root","123");
            //Buoc 2: Thuc hien truy van
            $sql = "SELECT * FROM users 
            WHERE username = '$username' or email = '$username';";
            
            $stmt = $conn->prepare($sql);
            $stmt->execute();
    
            //Buoc 3: Xu ly ket qua
            if($stmt->rowCount() > 0) {
                $user = $stmt->fetch();                

                $pass="pojn abte mkda ptmd";
                $mail =new PHPMailer;

                $mail->isSMTP();
                $mail->Host = "SMTP.gmail.com";
                $mail->SMTPAuth = true;
                $mail->Username = 'tqbao4756@gmail.com';
                $mail->Password = $pass ;
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                $mailGet = $user[3];
                $mail->setFrom('tqbao4756@gmail.com','tqbao');
                $mail->addAddress($mailGet);
                $mail->isHTML(true);
                $mail->Subject='Email from localhost';
                $randomNumber = sprintf("%04d", rand(0, 9999));
                $bodyContent="mật khẩu mới là: $randomNumber";
                $mail->Body = $bodyContent;
                // $mail->addAttachment("../testMail/PHPMailer.zip","Folder of PHPMailer");
                // $mail->addAttachment("../testMail/index.php","Folder of PHPMailer");
                if(!$mail->send()){
                    header("location: ../forget_pass.php");
                    exit();
                }else{
                    $pass_hash = password_hash($randomNumber, PASSWORD_DEFAULT);
                    $sql = "UPDATE users
                    SET password = '$pass_hash'
                    WHERE username = '$username' or email = '$username';";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    header("location: ../login.php");
                    exit();
                }

            }else{
                header("location: ../forget_pass.php");
                exit();
            }

        }catch(PDOException $e){
            echo "Error: ".$e->getMessage();
        }
    }else{
        header("location: ../forget_pass.php");
        exit();
    }
?>
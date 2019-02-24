<?php
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

    if(isset($_POST["submit"])){
        require_once "../Connection/connection.php";
        $email = $_POST["email"];
        $fullName = $_POST["fullName"];
        $password = $_POST["pass"];
        $error = [];
        $regFullName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/";

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $error[] = "bad email";
        }
        if(strlen($password) < 6 ){
            $error[] = "bad password";
        }
        if(!preg_match($regFullName,$fullName)){
            $error[] = "bad full Name";
        }

        if(count($error) == 0){
            $password = md5($password);
            $token = md5(time(). $email);

            $query = "INSERT INTO users (full_name,email,id_role,password,img,active,token) VALUES(:name,:email,2,:pass,'IMG/avatar.png',0,:token);";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":name",$fullName);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":pass",$password);
            $stmt->bindParam(":token",$token);
            try {
                $code = $stmt->execute() ? 201 : 500;

                if ($code == 201) {
                    //Server settings
            $mail = new PHPMailer();

                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'nikola.nikolic.23.16@ict.edu.rs';
                    $mail->Password = '6VnR2rRN';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;

                    $mail->SMTPOptions = array(
                        'ssl' => array(
                            'verify_peer' => false,
                            'verify_peer_name' => false,
                            'allow_self_signed' => true
                        )
                    );

                    //Recipients
                    $mail->setFrom('nikola.nikolic.23.16@ict.edu.rs', 'Registratio Form');
                    $mail->addAddress($email);

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Activate your account';
                    $href = "http://localhost/recipesSite/PHP/logic/activeUser.php?a=" . $token;
                    $mail->Body = 'To activate your account please fallow <a href="' . $href . '">this</a> link';

                    $mail->send();
                    http_response_code($code);
                    echo json_encode(["odg" => " Your registration is successful,please activate your email"]);
                }
                else{
                    http_response_code(409);
                }
            }
                catch (Exception $e) {
                        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                }
        }
        else{
            http_response_code(422);
        }
    }
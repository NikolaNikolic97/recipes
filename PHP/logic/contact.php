<?php
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;
    if(isset($_POST["contact"])){
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $regFullName = "/^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/";
        $errors = [];

        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $errors[] = "bad format of email";
        }
        if(!preg_match($regFullName,$fullName)){
            $errors[]="bad format of name";
        }
        if(strlen($message) == 0){
            $errors[]="enter message";
        }
        if(count($errors)==0){
            try {
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
                    $mail->setFrom('nikola.nikolic.23.16@ict.edu.rs', 'Contact Form');
                    $mail->addAddress("dzonzi97@gmail.com");

                    //Content
                    $mail->isHTML(true);
                    $mail->Subject = 'Message from '.$fullName;
                    $mail->Body = $message.' message from '.$email;

                    $mail->send();
                    http_response_code(200);
                    echo json_encode(["odg" => " Your message is sent, thank you for conctacting us "]);

            }
            catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
        else{
            http_response_code(422);
            json_encode(["odg"=>"Some of parameters are invalid"]);
        }
    }
    else{
        http_response_code(404);
    }
<?php
session_start();
    require_once "../Connection/connection.php";
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["pass"];
        $regEmail = filter_var($email,FILTER_VALIDATE_EMAIL);
        $errors = [];
        if(!$regEmail){
            $errors[] = "bad email";
        }
        if(strlen($password) < 6){
            $errors[] = "bad password";
        }
        if(count($errors) == 0){
            $password = md5($password);
            $query = "SELECT *,u.id as user_id FROM users u INNER JOIN role r ON u.id_role = r.id WHERE u.active = 1 AND u.email =:email AND u.password =:pass;";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":pass",$password);
            $stmt->execute();
            $user = $stmt->fetch();
            if($user){
                $_SESSION["user"] = $user;
                if($_SESSION["user"]->role == "admin"){
                    http_response_code(200);
                    echo json_encode(["odg"=>"admin"]);
                }
                else{
                    http_response_code(200);
                    echo json_encode(["odg"=>"user"]);
                }
            }
            else{
                http_response_code(409);
            }
        }
    }
    else{
        http_response_code(404);
        //header("Location: ../../404.php");
    }
    
    
<?php
require_once "../Connection/connection.php";
    if(isset($_GET["a"])){
        $token = $_GET["a"];
        $query1 = "SELECT * FROM `users` WHERE token = '$token'";
        $query2 = "Update users set active = 1 where token=:token";
        $stmt = $conn ->prepare($query2);
        $stmt ->bindParam(":token",$token);
        try{

            $rez = $conn->query($query1)->fetch();
            var_dump($rez);
            if($rez->active == 1){
                http_response_code(409);
                header("Location: ../../unSuccessfullRegistration.php");
            }
            else{
                $result = $stmt->execute();
                if($result){
                    http_response_code(200);
                    header("Location: ../../successfullRegistration.php");
                }
            }
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }


    }else{
        http_response_code(404);
        //header("Location: ../../404.php");
    }
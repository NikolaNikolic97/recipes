<?php
session_start();
header("Content-type: application/json");
    require_once "../Connection/connection.php";
        if (isset($_POST["survey"])) {
            $search = $_POST["search"];
            $query = "select *,i.id as images_id,r.id as recipes_id from recipes r inner join images i on r.id=i.id_recipes where r.recepi_name=:name";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":name",$search);
            try{
                $stmt->execute();
                $rez = $stmt->fetchAll();
                if($rez){
                    http_response_code(200);
                    echo json_encode(["odg"=>$rez]);
                }
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
        }else{

        }
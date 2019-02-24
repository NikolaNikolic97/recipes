<?php
    if (isset($_POST["survey"])){
        require_once "../Connection/connection.php";
        $questionId = $_POST["id"];
        $radioBtn = $_POST["radio"];
        $user = $_POST["user"];
        $query = "select count(*) as votes from question_user qu inner join answer a on qu.id_answer=a.id where qu.id_user=:user and a.id_question=:question";
        $stmt = $conn->prepare($query);
        $stmt ->bindParam(":user",$user);
        $stmt->bindParam(":question",$questionId);
        try{
            $stmt->execute();
            $vote = $stmt->fetch();
            if($vote->votes){
                http_response_code(409);
                echo json_encode(["code"=>409]);
            }
            else{
                $query2 = "insert into question_user(id_user,id_answer) values (:user,:answer)";
                $stmt2 = $conn->prepare($query2);
                $stmt2 ->bindParam(":user",$user);
                $stmt2->bindParam(":answer",$radioBtn);
                $rez = $stmt2->execute();
                if($rez){
                    http_response_code(200);
                    echo json_encode(["code"=>200]);
                }
                else{
                    http_response_code(500);
                    echo json_encode(["code"=>500]);
                }
            }
        }catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    else header("Location: ../../404.php");

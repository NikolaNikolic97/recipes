<?php
if(isset($_POST['submit'])){
    include "../Connection/connection.php";
    $user_id=$_POST["user"];
    $recipe_id = $_POST['recipe'];
    try{
        //ispitivanje da li je ulogovani korisnik lajkovao
        $query = "select count(*) as num from likes l where l.id_user=:user and l.id_recipes=:recipe";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":user",$user_id);
        $stmt->bindParam(":recipe",$recipe_id);
        $stmt->execute();
        $row = $stmt->fetch();
        $number = $row->num;
        if ($number){//ako jeste nadjen like
            $query = "select l.likes from likes l where l.id_user=:user and l.id_recipes=:recipe";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":user",$user_id);
            $stmt->bindParam(":recipe",$recipe_id);
            $stmt->execute();
            $row = $stmt->fetch();//ovde se dohvata vrednost kolone like za tacan recept i tacnog usera

            if($row->likes == 1){//ako je dohvacena vrednost 1
                $query = "update likes l set likes=0 where l.id_user=:user and l.id_recipes=:recipe";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":user",$user_id);
                $stmt->bindParam(":recipe",$recipe_id);
                $like = $stmt->execute();
                //update kolone like kad je bilo lajkovano na odlajkovano

                if ($like){//kad se izvrsi update dohvata se poslednja vrednost kolone like
                    $query = "select l.likes from likes l where l.id_user=:user and l.id_recipes=:recipe";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(":user",$user_id);
                    $stmt->bindParam(":recipe",$recipe_id);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    if ($row->likes == 0)//ovde je dohvacena poslednja vrednost posle update
                    http_response_code(200);
                    echo json_encode(["odg"=>"unLiked"]);
                }

            }
            else{//ako je dohvacena vrednost 0
                $query = "update likes l set likes=1 where l.id_user=:user and l.id_recipes=:recipe";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":user",$user_id);
                $stmt->bindParam(":recipe",$recipe_id);
                $like = $stmt->execute();
                //update kolone like kad je bilo odlajkovano na lajkovano
                if ($like){
                    $query = "select l.likes from likes l where l.id_user=:user and l.id_recipes=:recipe";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam(":user",$user_id);
                    $stmt->bindParam(":recipe",$recipe_id);
                    $stmt->execute();
                    $row = $stmt->fetch();
                    if ($row)//ovde je dohvacena poslednja vrednost posle update
                        http_response_code(200);
                    echo json_encode(["odg"=>"liked"]);
                }
            }
        }
        else{//ako nije nadjen like
            $query = "insert into likes (id_user,id_recipes,likes) values (:user,:recipe,1)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":user",$user_id);
            $stmt->bindParam(":recipe",$recipe_id);
            $row = $stmt->execute();
            if($row){
                http_response_code(200);
                echo json_encode(["odg"=>"liked"]);
            }
            else http_response_code(500);
        }

    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}
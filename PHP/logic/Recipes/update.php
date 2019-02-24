<?php
session_start();
if(isset($_POST['updateRecipe'])) {
    include "../../Connection/connection.php";
    $idRecipe = $_POST["idRecipe"];
    $idImg = $_POST["idImg"];
    $recipeName = $_POST['recipe_name'];
    $recipeContent = $_POST["recipe_content"];
    $video = $_POST["video"];
    $user = $_SESSION["user"]->id;
    $descriptionRecipe = $_POST["descriptionRecipe"];
    $descriptionImg = $_POST["descriptionImg"];
    try {
            $file = $_FILES["file"];
            $size = $file["size"];
            if($size != 0) {
                $name = $file["name"];
                $type = $file["type"];
                $tmp_name = $file["tmp_name"];
                $errors = [];
                $niz = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
                if (!in_array($type, $niz)) array_push($errors, "type isnt suported");
                //if($size>3000000)array_push($errors,"file is too big");
                if (count($errors) == 0) {
                    $file_name = time() . $name;
                    $new_path = "IMG/" . $file_name;
                    $path = "../../../IMG/" . $file_name;
                    $upis = move_uploaded_file($tmp_name, $path);
                    if ($upis) {
                        $query = "UPDATE images SET src=:src,alt=:alt,id_recipes=:recipe WHERE id =:id";
                        $prepare = $conn->prepare($query);
                        $prepare->bindParam(":src", $new_path);
                        $prepare->bindParam(":alt", $descriptionImg);
                        $prepare->bindParam(":recipe", $idRecipe);
                        $prepare->bindParam(":id", $idImg);
                        try {
                            $rez = $prepare->execute();
                            if($rez){
                                $query = "update recipes set id_user=:user,recepi_name=:rName,recipe_content=:rContent,video=:video,description=:description WHERE id =:id;";
                                $stmt = $conn->prepare($query);
                                $stmt->bindParam(":user",$user);
                                $stmt ->bindParam(":rName",$recipeName);
                                $stmt ->bindParam(":rContent",$recipeContent);
                                $stmt ->bindParam(":video",$video);
                                $stmt ->bindParam(":description",$descriptionRecipe);
                                $stmt ->bindParam(":id",$idRecipe);
                                $rez = $stmt->execute();
                                header("Location: ../../../myRecipes.php");
                            }


                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
            }
            else{
                $query = "UPDATE images SET alt=:alt,id_recipes=:recipe WHERE id =:id";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":alt", $descriptionImg);
                $prepare->bindParam(":recipe", $idRecipe);
                $prepare->bindParam(":id", $idImg);
                try {
                    $rez = $prepare->execute();
                    if($rez){
                        $query = "update recipes set id_user=:user,recepi_name=:rName,recipe_content=:rContent,video=:video,description=:description WHERE id =:id;";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(":user",$user);
                        $stmt ->bindParam(":rName",$recipeName);
                        $stmt ->bindParam(":rContent",$recipeContent);
                        $stmt ->bindParam(":video",$video);
                        $stmt ->bindParam(":description",$descriptionRecipe);
                        $stmt ->bindParam(":id",$idRecipe);
                        $rez = $stmt->execute();
                        header("Location: ../../../myRecipes.php");
                    }

                }
                catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }

}
else{
    http_response_code(404);
}
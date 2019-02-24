<?php
session_start();
if(isset($_POST['insertRecipe'])) {
    include "../../Connection/connection.php";
    $recipeName = $_POST['recipeName'];
    $recipeContent = $_POST["recipeContent"];
    $video = $_POST["video"];
    $user = $_SESSION["user"]->user_id;
    $descriptionRecipe = $_POST["descriptionRecipe"];
    $descriptionImg = $_POST["descriptionImg"];
    $query = "INSERT INTO recipes(id_user,recepi_name,recipe_content,video,description) VALUES (:user,:rName,:rContent,:video,:description);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":user",$user);
    $stmt ->bindParam(":rName",$recipeName);
    $stmt ->bindParam(":rContent",$recipeContent);
    $stmt ->bindParam(":video",$video);
    $stmt ->bindParam(":description",$descriptionRecipe);
    try {
            $rez = $stmt->execute();
            if($rez){
                $file = $_FILES["file"];
                $name = $file["name"];
                $type = $file["type"];
                $tmp_name = $file["tmp_name"];
                $size= $file["size"];
                $errors = [];
                $niz = ["image/jpg","image/jpeg","image/png","image/gif"];
                if (!in_array($type,$niz)) array_push($errors,"type isn't suported");
                //if($size>3000000)array_push($errors,"file is too big");
                if(count($errors)==0){
                    $file_name = time().$name;
                    $new_path = "IMG/".$file_name;
                    $path = "../../../IMG/".$file_name;
                    $id = $conn->lastInsertId();
                    // upload of picture
                    $upis=move_uploaded_file($tmp_name, $path);
                    if($upis) {
                        $query = "INSERT INTO images VALUES ('',:src,:alt,:recipes);";
                        $stmt = $conn->prepare($query);
                        $stmt->bindParam(":src", $new_path);
                        $stmt->bindParam(":alt", $descriptionImg);
                        $stmt->bindParam(":recipes", $id);
                        try {
                            $rez = $stmt->execute();
                            if ($rez) {

                                http_response_code(204);
                                header("Location: ../../../myRecipes.php");
                            } else {
                                http_response_code(422);
                            }
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    }
                }
                else{
                    http_response_code(422);
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
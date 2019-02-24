<?php
if(isset($_POST['insertRecipe'])) {
    include "../../../Connection/connection.php";
    $recipeName = $_POST['recipeName'];
    $recipeContent = $_POST["recipeContent"];
    $video = $_POST["video"];
    $user = $_POST["user"];
    $description = $_POST["description"];
            $query = "INSERT INTO recipes(id_user,recepi_name,recipe_content,video,description) VALUES (:user,:rName,:rContent,:video,:description);";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":user",$user);
            $stmt ->bindParam(":rName",$recipeName);
            $stmt ->bindParam(":rContent",$recipeContent);
            $stmt ->bindParam(":video",$video);
            $stmt ->bindParam(":description",$description);
            try {
                $rez = $stmt->execute();
                if($rez){
                    http_response_code(204);
                    header("Location: ../../../../admin.php?page=recipes");
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

}
else{
    http_response_code(404);
}
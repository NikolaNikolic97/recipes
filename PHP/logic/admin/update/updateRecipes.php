<?php
if(isset($_POST['updateRecipe'])) {
    include "../../../Connection/connection.php";
    $id=$_POST["id"];
    $recipe_name = $_POST['recipe_name'];
    $recipe_content = $_POST["recipe_content"];
    $video = $_POST["video"];
    $user = $_POST["user"];
    $description = $_POST["description"];
    $query = "UPDATE recipes SET id_user=:user,recepi_name=:recipe_name,recipe_content=:recipe_content,video=:video,description=:description WHERE id =:id";
    $prepare=$conn->prepare($query);
    $prepare->bindParam(":recipe_name",$recipe_name);
    $prepare->bindParam(":recipe_content",$recipe_content);
    $prepare->bindParam(":video",$video);
    $prepare->bindParam(":description",$description);
    $prepare->bindParam(":user",$user);
    $prepare->bindParam(":id",$id);
    try {
        $rez = $prepare->execute();
        header("Location: ../../../../admin.php?page=recipes");

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
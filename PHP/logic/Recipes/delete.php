<?php
require_once "../../Connection/connection.php";
if(isset($_GET["id"])){
    $idRecipe = $_GET["id"];
    $idImg = $_GET["img"];
    $upit1 = "DELETE  FROM images WHERE id = :id";
    $prepare = $conn->prepare($upit1);
    $prepare->bindParam(":id",$idImg);
    try{
        $row = $prepare->execute();
        if($row){
            $upit2 = "DELETE  FROM recipes WHERE id = :id";
            $prepare = $conn->prepare($upit2);
            $prepare->bindParam(":id",$idRecipe);
            try{
                $row = $prepare->execute();
                header("Location: ../../../myRecipes.php");
            }
            catch (PDOException $e){
                echo $e->getMessage();
            }
        }
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}

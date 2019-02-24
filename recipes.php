<?php
session_start();
require_once "PHP/Connection/connection.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $query = "select r.id as recipe_id,i.id as image_id,u.id as user_id,i.alt,i.src,r.recepi_name,r.recipe_content,r.video,u.img as user_image,u.full_name from recipes r inner join users u on r.id_user=u.id inner join images i on r.id=i.id_recipes where r.id=:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam("id",$id);
    try{
        $stmt->execute();
        $recipes = $stmt->fetch();
    }catch (PDOException $e){
        $e->getMessage();
    }
}

    require_once "PHP/views/recipes/head.php";
    require_once "PHP/views/Index/navigation.php";
    require_once "PHP/views/Index/sideNav.php";
    require_once "PHP/views/recipes/actionButton.php";

if(isset($_GET["page"])){
    if(isset($_GET["id"])){
        $id = $_GET["id"];
    }
    $page = $_GET["page"];
    switch ($page){
        case "insert":
                include "PHP/views/myRecipes/insertForm.php";
            break;
        case "update":
            $upit ="SELECT *,r.id as recipe_id,u.id as user_id,i.id as image_id FROM recipes r inner join users u on r.id_user = u.id inner join images i on r.id=i.id_recipes WHERE r.id = :id";
            $prepare = $conn->prepare($upit);
            $prepare->bindParam(":id",$id);
            try{
                $prepare->execute();
                $recipe = $prepare->fetch();
                include "PHP/views/myRecipes/updateForm.php";
            }catch (PDOException $e){
                echo $e->getMessage();
            }
            break;
    }


}else{
    require_once "PHP/views/recipes/videoContent.php";
    require_once "PHP/views/recipes/recipesContent.php";
}
    require_once "PHP/views/recipes/footer.php";
    require_once "PHP/views/Index/loginModal.php";
    require_once "PHP/views/Index/signUpModal.php";



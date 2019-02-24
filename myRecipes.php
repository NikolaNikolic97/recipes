<?php
session_start();
if($_SESSION["user"]->role == "user"){
    //geting all recipes
    require_once "PHP/Connection/connection.php";
    $user = $_SESSION["user"]->user_id;
    $query = "select r.id as recipe_id,i.id as image_id,u.id as user_id,i.alt,i.src,r.recepi_name,r.description,r.recipe_content from recipes r inner join users u on r.id_user=u.id inner join images i on r.id=i.id_recipes where r.id_user=:user";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":user",$user);
    try{
        $stmt->execute();
        $recipes = $stmt->fetchAll();
    }catch (PDOException $e){
        $e->getMessage();
    }
    require_once "PHP/views/myRecipes/head.php";
    require_once "PHP/views/Index/navigation.php";
    require_once "PHP/views/Index/sideNav.php";
    require_once "PHP/views/Index/loginModal.php";
    require_once "PHP/views/Index/signUpModal.php";
    require_once "PHP/views/myRecipes/mainContent.php";
    require_once "PHP/views/myRecipes/actionButton.php";
    require_once "PHP/views/Index/footer.php";
}
else{
    header("Location: 404.php");
}

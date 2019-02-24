<?php
session_start();
    require_once "PHP/Connection/connection.php";
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    try{
        $upit = "SELECT COUNT(*) as br FROM recipes  ";
        $obj = $conn->query($upit)->fetch();
        $perPage =8;
        $linksNumber = ceil($obj->br / $perPage);
        $from = $perPage * ($page - 1);
        $upit = "select *,i.id as images_id,r.id as recipes_id from recipes r inner join images i on r.id=i.id_recipes LIMIT $from, $perPage";
        $recipe = $conn->query($upit)->fetchAll();
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
    require_once "PHP/views/all_recipes/head.php";
    require_once "PHP/views/Index/navigation.php";
    require_once "PHP/views/Index/sideNav.php";
    require_once "PHP/views/Index/signUpModal.php";
    require_once "PHP/views/Index/loginModal.php";
    require_once "PHP/views/all_recipes/search.php";
    require_once "PHP/views/all_recipes/content.php";
    require_once "PHP/views/all_recipes/pagination.php";
    require_once "PHP/views/all_recipes/footer.php";
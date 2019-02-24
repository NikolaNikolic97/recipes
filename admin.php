<?php
session_start();
if($_SESSION["user"]->role == "admin"):
    require_once "PHP/Connection/connection.php";
    require_once "PHP/views/admin/head.php";
    require_once "PHP/views/Index/navigation.php";
    require_once "PHP/views/Index/sideNav.php";
    require_once "PHP/views/Index/signUpModal.php";
    require_once "PHP/views/Index/loginModal.php";
    require_once "PHP/views/admin/dashboard.php";
    if(isset($_GET["page"])){
        $page = $_GET["page"];
        switch ($page){
            case "analytics":
                $query = "select * from users";
                $charts = $conn->query($query)->fetchAll();
                require_once "PHP/views/admin/Charts/chart.php";
                break;
            case "users":
                $query = "select *,u.id as user_id from users u inner join role r on u.id_role=r.id";
                $users = $conn->query($query)->fetchAll();
                require_once "PHP/views/admin/tables/users.php";
                break;
            case "question":
                $query = "select * from question";
                $question = $conn->query($query)->fetchAll();
                require_once "PHP/views/admin/tables/question.php";
                break;
            case "answer":
                $query = "select * from answer";
                $answer = $conn->query($query)->fetchAll();
                require_once "PHP/views/admin/tables/answer.php";
                break;
            case "menu":
                $query = "select * from menu";
                $menu = $conn->query($query)->fetchAll();
                require_once "PHP/views/admin/tables/menu.php";
                break;
            case "recipes":
                $query = "SELECT *,r.id as recipe_id FROM recipes r inner join users u on r.id_user = u.id ";
                $recipes = $conn->query($query)->fetchAll();
                require_once "PHP/views/admin/tables/recipes.php";
                break;
            case "images":
                $query = "SELECT *,i.id as id_img FROM images i inner join recipes r on i.id_recipes=r.id";
                $images = $conn->query($query)->fetchAll();
                require_once "PHP/views/admin/tables/images.php";
                break;
        }

    }
    else require_once "PHP/views/admin/Charts/chart.php";
    if(isset($_GET["update"])) {
        $update = $_GET["update"];
        if (isset($_GET["id"])) $id = $_GET["id"];
        switch ($update) {
            case "user":
                $upit ="SELECT *,u.id AS user_id FROM users u INNER JOIN role r on u.id_role = r.id WHERE u.id = :id";
                $prepare = $conn->prepare($upit);
                $prepare->bindParam(":id",$id);
                $upit2 = "select * from role";
                $roles = $conn->query($upit2)->fetchAll();
                try{
                    $prepare->execute();
                    $user = $prepare->fetch();
                    include "PHP/views/admin/updateForms/updateUser.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "recipes":
                $upit ="SELECT *,r.id as recipe_id,u.id as user_id FROM recipes r inner join users u on r.id_user = u.id WHERE r.id = :id";
                $prepare = $conn->prepare($upit);
                $prepare->bindParam(":id",$id);
                $upit2 = "select * from users";
                $users = $conn->query($upit2)->fetchAll();
                try{
                    $prepare->execute();
                    $recipe = $prepare->fetch();
                    include "PHP/views/admin/updateForms/updateRecipes.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "answer":
                $upit ="SELECT * FROM answer WHERE id = :id";
                $prepare = $conn->prepare($upit);
                $prepare->bindParam(":id",$id);
                $upit2 = "select * from question";
                $questions = $conn->query($upit2)->fetchAll();
                try{
                    $prepare->execute();
                    $answer = $prepare->fetch();
                    include "PHP/views/admin/updateForms/updateAnswer.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "images":
                $upit ="SELECT *,i.id as id_img FROM images i inner join recipes r on i.id_recipes=r.id WHERE i.id = :id";
                $prepare = $conn->prepare($upit);
                $prepare->bindParam(":id",$id);
                $upit2 = "select * from recipes";
                $recipes = $conn->query($upit2)->fetchAll();
                try{
                    $prepare->execute();
                    $images = $prepare->fetch();
                    include "PHP/views/admin/updateForms/updateImages.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "menu":
                $upit ="SELECT * FROM menu WHERE id = :id";
                $prepare = $conn->prepare($upit);
                $prepare->bindParam(":id",$id);
                try{
                    $prepare->execute();
                    $menu = $prepare->fetch();
                    include "PHP/views/admin/updateForms/updateMenu.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "question":
                $upit ="SELECT * FROM question WHERE id = :id";
                $prepare = $conn->prepare($upit);
                $prepare->bindParam(":id",$id);
                try{
                    $prepare->execute();
                    $question = $prepare->fetch();
                    include "PHP/views/admin/updateForms/updateQuestion.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
        }


    }
    if(isset($_GET["insert"])) {
        $insert = $_GET["insert"];
        if (isset($_GET["id"])) $id = $_GET["id"];
        switch ($insert) {
            case "user":
                try{
                    $upit2 = "select * from role";
                    $roles = $conn->query($upit2)->fetchAll();
                    include "PHP/views/admin/insertForms/insertUser.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "recipes":
                try{
                    $upit = "select * from users";
                    $users = $conn->query($upit)->fetchAll();
                    include "PHP/views/admin/insertForms/insertRecipes.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "answer":
                try{
                    $upit = "select * from question";
                    $questions = $conn->query($upit)->fetchAll();
                    include "PHP/views/admin/insertForms/insertAnswer.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "images":
                try{
                    $upit = "select * from recipes";
                    $recipes = $conn->query($upit)->fetchAll();
                    include "PHP/views/admin/insertForms/insertImages.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "menu":
                try{
                    include "PHP/views/admin/insertForms/insertMenu.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
            case "question":
                try{
                    include "PHP/views/admin/insertForms/insertQuestion.php";
                }catch (PDOException $e){
                    echo $e->getMessage();
                }
                break;
        }


    }
    require_once "PHP/views/admin/footer.php";
else: header("Location: 404.php");
endif;
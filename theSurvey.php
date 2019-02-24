<?php
session_start();
if($_SESSION["user"]->role =="user") {
    //geting the survey
    require_once "PHP/Connection/connection.php";
    //$query = "select count(*) as votes from question_user qu inner join answer a on qu.id_answer=a.id where qu.id_user=:user and a.id_question=:question";
    $query1 = "SELECT * FROM answer";
    $answer = $conn->query($query1)->fetchAll();
    $query2 = "SELECT * FROM question";
    $question = $conn->query($query2)->fetchAll();
    require_once "PHP/views/theSurvey/head.php";
    require_once "PHP/views/Index/navigation.php";
    require_once "PHP/views/Index/sideNav.php";
    require_once "PHP/views/Index/loginModal.php";
    require_once "PHP/views/Index/signUpModal.php";
    require_once "PHP/views/theSurvey/mainContent.php";
    require_once "PHP/views/theSurvey/modal.php";
    require_once "PHP/views/theSurvey/footer.php";
}
else{
    header("Location: 404.php");
}
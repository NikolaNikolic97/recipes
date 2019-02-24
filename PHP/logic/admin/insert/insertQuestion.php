<?php
if(isset($_POST['insertQuestion'])) {
    include "../../../Connection/connection.php";
    $question = $_POST['question'];
    $query = "INSERT INTO question (question) VALUES (:question)";
    $prepare=$conn->prepare($query);
    $prepare->bindParam(":question",$question);

    try {
        $rez = $prepare->execute();
        if($rez){
            http_response_code(204);
            header("Location: ../../../../admin.php?page=question");
        }


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
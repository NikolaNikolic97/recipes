<?php
if(isset($_POST['insertAnswer'])) {
    include "../../../Connection/connection.php";
    $answer = $_POST['answer'];
    $question = $_POST["question"];
    $query = "INSERT INTO answer(id_question,answer_content) VALUES (:question,:answer)";
    $prepare=$conn->prepare($query);
    $prepare->bindParam(":question",$question);
    $prepare->bindParam(":answer",$answer);

    try {
        $rez = $prepare->execute();
         header("Location: ../../../../admin.php?page=answer");

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
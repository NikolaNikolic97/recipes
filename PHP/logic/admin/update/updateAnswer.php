<?php
if(isset($_POST['updateAnswer'])) {
    include "../../../Connection/connection.php";
    $id=$_POST["id"];
    $answer = $_POST['answer'];
    $question = $_POST["question"];
    $query = "UPDATE answer SET id_question=:question,answer_content=:answer WHERE id =:id";
    $prepare=$conn->prepare($query);
    $prepare->bindParam(":question",$question);
    $prepare->bindParam(":answer",$answer);
    $prepare->bindParam(":id",$id);
    try {
        $rez = $prepare->execute();
        header("Location: ../../../../admin.php?page=answer");

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
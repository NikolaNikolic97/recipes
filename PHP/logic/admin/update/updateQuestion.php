<?php
if(isset($_POST['updateQuestion'])) {
    include "../../../Connection/connection.php";
    $id=$_POST["id"];
    $question = $_POST["question"];
    $query = "UPDATE question SET question=:question WHERE id =:id";
    $prepare=$conn->prepare($query);
    $prepare->bindParam(":question",$question);
    $prepare->bindParam(":id",$id);
    try {
        $rez = $prepare->execute();
        header("Location: ../../../../admin.php?page=question");

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
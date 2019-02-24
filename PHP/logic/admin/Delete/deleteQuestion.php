<?php
require_once "../../../Connection/connection.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $upit = "DELETE  FROM question WHERE id = :id";
    $prepare = $conn->prepare($upit);
    $prepare->bindParam(":id",$id);
    try{
        $row = $prepare->execute();
        header("Location: ../../../../admin.php?page=question");
    }
    catch (PDOException $e){
        echo $e->getMessage();
    }
}

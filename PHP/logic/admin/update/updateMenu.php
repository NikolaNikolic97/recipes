<?php
if(isset($_POST['updateMenu'])) {
    include "../../../Connection/connection.php";
    $id=$_POST["id"];
    $href = $_POST['href'];
    $content = $_POST["content"];
    $icon = $_POST["icon"];
    $query = "UPDATE menu SET href=:href,content=:content,icon=:icon WHERE id =:id";
    $prepare=$conn->prepare($query);
    $prepare->bindParam(":href",$href);
    $prepare->bindParam(":content",$content);
    $prepare->bindParam(":id",$id);
    $prepare->bindParam(":icon",$icon);
    try {
        $rez = $prepare->execute();
        header("Location: ../../../../admin.php?page=menu");

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
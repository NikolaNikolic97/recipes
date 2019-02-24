<?php
if(isset($_POST['insertMenu'])) {
    include "../../../Connection/connection.php";
    $href = $_POST['href'];
    $content = $_POST["content"];
    $icon = $_POST["icon"];
    $query = "INSERT INTO menu (href,content,icon) VALUES (:href,:content,:icon)";
    $prepare=$conn->prepare($query);
    $prepare->bindParam(":href",$href);
    $prepare->bindParam(":content",$content);
    $prepare->bindParam(":icon",$icon);
    try {
        $rez = $prepare->execute();
        if($rez){
            http_response_code(204);
            header("Location: ../../../../admin.php?page=menu");
        }


    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
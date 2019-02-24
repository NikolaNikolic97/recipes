<?php
if(isset($_POST['insertUser'])) {
    include "../../../Connection/connection.php";
    $full_name = $_POST['full_name'];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $role = $_POST["role"];
    if(isset($_POST["active"])){
        $active = 1;
    }else $active = 0;
    $token="0";
    $img = "IMG/avatar.png";
    $query = "INSERT INTO users(full_name,email,id_role,password,img,active,token) VALUES (:full_name,:email,:id_role,:password,:img,:active,:token);";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":full_name",$full_name);
    $stmt ->bindParam(":email",$email);
    $stmt ->bindParam(":id_role",$role);
    $stmt ->bindParam(":password",$password);
    $stmt ->bindParam(":img",$img);
    $stmt ->bindParam(":active",$active);
    $stmt ->bindParam(":token",$token);
    try {
        $rez = $stmt->execute();
        if($rez){
            http_response_code(204);
            header("Location: ../../../../admin.php?page=users");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

}
else{
    http_response_code(404);
}
<?php
if(isset($_POST['updateUser'])) {
    include "../../../Connection/connection.php";
    $id=$_POST["id"];
    $full_name = $_POST['full_name'];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);
    $role = $_POST["role"];
    if(isset($_POST["active"])){
        $active = 1;
    }else $active = 0;
    $token="0";
    $query = "UPDATE users SET full_name=:full_name,email=:email,id_role=:id_role,password=:password,active=:active,token=:token WHERE id =:id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":full_name",$full_name);
    $stmt ->bindParam(":email",$email);
    $stmt ->bindParam(":id_role",$role);
    $stmt ->bindParam(":password",$password);
    $stmt ->bindParam(":active",$active);
    $stmt ->bindParam(":token",$token);
    $stmt->bindParam(":id",$id);
    try {
        $rez = $stmt->execute();
        if($rez) {
            http_response_code(204);
            header("Location: ../../../../admin.php?page=users");
        }
    }
    catch (PDOException $e) {
        echo $e->getMessage();
    }
}
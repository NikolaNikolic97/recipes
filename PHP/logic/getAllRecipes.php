<?php
    if(isset($_GET)){
        require_once "../Connection/connection.php";
        $query =  "select recepi_name from recipes";
        try{
            $rez = $conn->query($query)->fetchAll();
            echo json_encode(["odg"=>$rez]);
        }catch (PDOException $e){
            $e->getMessage();
        }

    }
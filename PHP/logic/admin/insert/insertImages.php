<?php
if(isset($_POST['insertImages'])) {

    include "../../../Connection/connection.php";
    $description = $_POST['description'];
    $recipes = $_POST["recipes"];
    $file = $_FILES["file"];
    $name = $file["name"];
    $type = $file["type"];
    $tmp_name = $file["tmp_name"];
    $size= $file["size"];
    $errors = [];
    $niz = ["image/jpg","image/jpeg","image/png","image/gif"];
    if (!in_array($type,$niz)) array_push($errors,"type isnt suported");
    //if($size>3000000)array_push($errors,"file is too big");
    if(count($errors)==0){
        $file_name = time().$name;
        $new_path = "IMG/".$file_name;
        $path = "../../../../IMG/".$file_name;
        // upload of picture
        $upis=move_uploaded_file($tmp_name, $path);
            if($upis){
               $query = "INSERT INTO images VALUES ('',:src,:alt,:recipes);";
              $stmt = $conn->prepare($query);
                $stmt ->bindParam(":src",$new_path);
               $stmt ->bindParam(":alt",$description);
                $stmt ->bindParam(":recipes",$recipes);
                try {
                    $rez = $stmt->execute();
                    if($rez){

                       http_response_code(204);
                       header("Location: ../../../../admin.php?page=images");
                   }
                   else{
                      http_response_code(422);
                  }
                } catch (PDOException $e) {
                   echo $e->getMessage();
                }
            }
            else{
                http_response_code(409);
            }
        }


}
else{
    http_response_code(404);
}
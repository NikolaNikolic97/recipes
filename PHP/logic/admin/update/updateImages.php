<?php
include "../../../Connection/connection.php";
    if(isset($_POST['updateImage'])) {
        $id = $_POST["id"];
        $description = $_POST['alt'];
        $recipes = $_POST["recipe"];
        $file = $_FILES["file"];
        $size = $file["size"];
        if($size != 0) {
            $name = $file["name"];
            $type = $file["type"];
            $tmp_name = $file["tmp_name"];
            $errors = [];
            $niz = ["image/jpg", "image/jpeg", "image/png", "image/gif"];
            if (!in_array($type, $niz)) array_push($errors, "type isnt suported");
            //if($size>3000000)array_push($errors,"file is too big");
            if (count($errors) == 0) {
                $file_name = time() . $name;
                $new_path = "IMG/" . $file_name;
                $path = "../../../../IMG/" . $file_name;
                $upis = move_uploaded_file($tmp_name, $path);
                if ($upis) {
                    $query = "UPDATE images SET src=:src,alt=:alt,id_recipes=:recipe WHERE id =:id";
                    $prepare = $conn->prepare($query);
                    $prepare->bindParam(":src", $new_path);
                    $prepare->bindParam(":alt", $description);
                    $prepare->bindParam(":recipe", $recipes);
                    $prepare->bindParam(":id", $id);
                    try {
                        $rez = $prepare->execute();
                        header("Location: ../../../../admin.php?page=images");

                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }
            }
        }
            else{
                $query = "UPDATE images SET alt=:alt,id_recipes=:recipe WHERE id =:id";
                $prepare = $conn->prepare($query);
                $prepare->bindParam(":alt", $description);
                $prepare->bindParam(":recipe", $recipes);
                $prepare->bindParam(":id", $id);
            try {
                    $rez = $prepare->execute();
                    header("Location: ../../../../admin.php?page=images");

                }
                catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }

    }
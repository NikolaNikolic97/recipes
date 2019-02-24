<!------------------------ recipes content ---------------------------------->
<div class="container">
    <div class="row">
        <div class="col s12 m6 l6 left">
                <h4><?= $recipes->recepi_name?></h4>
                <p class="flow-text">
                    <?= $recipes->recipe_content?>
                </p>
        </div><div class="col s12 m6 l6 right">
            <img class="responsive-img" src="<?= $recipes->src?>" alt="<?= $recipes->alt?>">
        </div>
    </div>
    <input type="hidden" value="<?= $recipes->recipe_id?>" id="recipe_id">
    <input type="hidden" value="<?= @$_SESSION["user"]->user_id?>" id="user_id">
    <?php if (isset($_SESSION["user"])): ?>
    <div class="row">
        <div class="col s6 m6 left">
                <span>
                    <a href="#" class="left" id="avatar-img__index" ">
                        <img style="height: 60px;"class="circle" src="<?= $recipes->user_image ?>">
                    </a>
                    <p class="flow-text"><?= $recipes->full_name ?></p>
                </span>
        </div>
            <?php
            $user_id = $_SESSION["user"]->user_id;
            $recipe_id = $recipes->recipe_id;
            $query = "select l.likes from likes l where l.id_user=:user and l.id_recipes=:recipe";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":user",$user_id);
            $stmt->bindParam(":recipe",$recipe_id);
            $stmt->execute();
            $row = $stmt->fetch();
            ?>
            <?php if(@$row->likes == 1): ?>
                <div class="col s6 m6 right">
                    <a class="left" >
                        <img style="height: 60px;" src="IMG/like_full.png" id="recipe__like">
                    </a>
                </div>
            <?php else: ?>
                <div class="col s6 m6 right">
                    <a class="left" >
                        <img style="height: 60px;" src="IMG/like_outline.png" id="recipe__like">
                    </a>
                </div>
            <?php endif; ?>

    </div>
    <?php endif; ?>
</div>
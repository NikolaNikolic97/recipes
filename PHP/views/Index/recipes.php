<!-- --------------------------gallery--------------------------->
<?php
$query="SELECT *,r.id as recipe_id,COUNT(likes)as broj FROM recipes r inner join likes l on r.id=l.id_recipes inner join images i on r.id=i.id_recipes GROUP BY r.id ORDER BY broj DESC LIMIT 4";
try{
    $topRecipes = $conn->query($query)->fetchAll();
}
catch (PDOException $e){
   echo $e->getMessage();
}

?>
<div class="row margin-top">
    <h1 class="black-text center"> Top rated recipes </h1>
    <?php foreach ($topRecipes as $top): ?>
            <div class="col s12 m6 l3 xl3">
                <div class="card">
                    <div class="card-image">
                        <img src="<?= $top->src ?>" alt="<?= $top->alt ?>">
                        <a href="recipes.php?id=<?= $top->recipe_id ?>" class="btn-floating halfway-fab waves-effect waves-light red btn-large"><i class="material-icons">arrow_forward</i></a>
                    </div>
                    <div class="card-content">
                        <span class="card-title"><?= $top->recepi_name ?></span>
                    </div>
                </div>
            </div>
    <?php endforeach; ?>
    <div class="center">
        <a href="allRecipes.php" id="allRecipes__link" class="btn btn-large circle-clipper indigo"> All recipes </a>
    </div>

</div>
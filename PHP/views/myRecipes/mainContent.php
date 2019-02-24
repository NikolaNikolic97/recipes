<div class="row margin-top">
    <?php foreach ($recipes as $r) :?>
    <div class="col m6 l4 xl3">
        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <a href="recipes.php?id=<?= $r->recipe_id ?>"><img class="activator" alt="<?= $r->alt ?>" src="<?= $r->src ?>"></a>
            </div>
            <div class="card-content">
                <i class="material-icons right">more_horiz</i>
                <span class="truncate card-title activator grey-text text-darken-4"><?= $r->recepi_name ?></span>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><?= $r->recepi_name ?><i class="material-icons right">close</i></span>
                <p><?= $r->description?></p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>


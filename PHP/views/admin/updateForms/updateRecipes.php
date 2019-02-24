<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/update/updateRecipes.php" method="post">
            <div class="row">
                <div class="input-field">
                    <input  id="recipe_name" type="text" name="recipe_name"  value="<?= $recipe->recepi_name ?>">
                    <label for="recipe_name">Recipe Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input  id="recipe_content" type="text" name="recipe_content" value="<?= $recipe->recipe_content ?>">
                    <label for="recipe_content">Recipe Content</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field ">
                    <input id="video" type="text" name="video" value="<?= $recipe->video ?>" >
                    <label for="video">Video URL</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field ">
                    <input id="video" type="text" name="description" value="<?= $recipe->description ?>" >
                    <label for="video">Description</label>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <div class="row">
                <div class="input-field col s12">
                    <select name="user">
                        <?php
                        foreach ($users as $u): ?>
                            <option <?php if($u->id == $recipe->user_id) echo "selected" ?> value="<?= $u->id ?>" ><?= $u->full_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>User</label>
                </div>
            </div>
            <button id="updateRecipe" class="btn btn-large red right" name="updateRecipe" type="submit">Update</button>
        </form>
    </div>
</div>
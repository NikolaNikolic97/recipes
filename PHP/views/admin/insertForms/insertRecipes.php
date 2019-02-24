<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/insert/insertRecipes.php" method="post">
            <div class="row">
                <div class="input-field">
                    <input  id="recipeName" type="text" name="recipeName" value="">
                    <label for="recipeName">Recipe Name</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input  id="recipeContent" type="text" name="recipeContent" value="">
                    <label for="recipeContent">Recipe Content</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field ">
                    <input id="video" type="text" name="video" value="" >
                    <label for="video">Video URL</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field ">
                    <input id="video" type="text" name="description" value="" >
                    <label for="video">Description</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="user">
                        <?php
                        foreach ($users as $u): ?>
                            <option  value="<?= $u->id ?>" ><?= $u->full_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>User</label>
                </div>
            </div>
            <button id="insertRecipe" class="btn btn-large red right" name="insertRecipe" type="submit">Insert</button>
        </form>
    </div>
</div>
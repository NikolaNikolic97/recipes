<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/Recipes/update.php" method="post" enctype="multipart/form-data">
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
            <input type="hidden" name="idRecipe" value="<?= $_GET["id"] ?>">
            <input type="hidden" name="idImg" value="<?= $recipe->image_id ?>">
            <div class="row">
                <div class="input-field ">
                    <input id="descriptionRecipe" type="text" name="descriptionRecipe" value="<?= $recipe->description ?>" >
                    <label for="descriptionRecipe">Description for recipe</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="file-field input-field">
                        <div class="btn indigo lighten-1">
                            <span>New Image</span>
                            <input type="file" name="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="descriptionImg" type="text" name="descriptionImg" value="<?= $recipe->alt ?>">
                    <label for="descriptionImg">Description for Image</label>
                    <span class="helper-text left-align" data-error="invalid format of email"></span>
                </div>
            </div>
            <button id="updateRecipe" class="btn btn-large red right" name="updateRecipe" type="submit">Update</button>
        </form>
    </div>
</div>
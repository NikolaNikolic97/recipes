<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/Recipes/insert.php" method="post" enctype="multipart/form-data">
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
                    <input id="descriptionRecipe" type="text" name="descriptionRecipe" value="" >
                    <label for="descriptionRecipe">Description for recipe</label>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
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
                    <input id="descriptionImg" type="text" name="descriptionImg" value="">
                    <label for="descriptionImg">Description for Image</label>
                    <span class="helper-text left-align" data-error="invalid format of email"></span>
                </div>
            </div>
            <button id="insertRecipe" class="btn btn-large red right" name="insertRecipe" type="submit">Insert</button>
        </form>
    </div>
</div>
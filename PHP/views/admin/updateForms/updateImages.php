<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/update/updateImages.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col s12">
                    <img src="<?= $images->src ?>" alt="" style="height: 180px;">
                </div>
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
                    <input id="alt" type="text" name="alt" value="<?= $images->alt ?>">
                    <label for="alt">Description</label>
                    <span class="helper-text left-align" data-error="invalid format of email"></span>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <div class="row">
                <div class="input-field col s12">
                    <select name="recipe">
                        <?php
                        foreach ($recipes as $r): ?>
                            <option <?php if($images->id_recipes ==$r->id) echo "selected";?> value="<?= $r->id ?>" ><?= $r->recepi_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Recipe</label>
                </div>
            </div>
            <button id="updateImage" class="btn btn-large red right" name="updateImage" type="submit">Update</button>
        </form>
    </div>
</div>
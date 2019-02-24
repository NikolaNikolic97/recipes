<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/insert/insertImages.php" method="post" enctype="multipart/form-data">
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
                    <input id="description" type="text" name="description" value="">
                    <label for="description">Description</label>
                    <span class="helper-text left-align" data-error="invalid format of email"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="recipes">
                        <?php
                        foreach ($recipes as $r): ?>
                            <option value="<?= $r->id ?>" ><?= $r->recepi_name ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Recipe</label>
                </div>
            </div>
            <button id="insertImages" class="btn btn-large red right" name="insertImages" type="submit">Insert</button>
        </form>
    </div>
</div>
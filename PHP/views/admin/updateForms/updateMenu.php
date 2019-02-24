<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/update/updateMenu.php" method="post">
            <div class="row">
                <div class="input-field">
                    <input  id="href" type="text" name="href" value="<?= $menu->href ?>">
                    <label for="href">Source</label>
                    <span class="helper-text left-align" data-error="invalid format full name"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="content" type="text" name="content" value="<?= $menu->content ?>">
                    <label for="content">Content</label>
                    <span class="helper-text left-align" data-error="invalid format of email"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="icon" type="text" name="icon" value="<?= $menu->icon ?>">
                    <label for="icon">Icon</label>
                    <span class="helper-text left-align"></span>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <button id="updateMenu" class="btn btn-large red right" name="updateMenu" type="submit">Update</button>
        </form>
    </div>
</div>
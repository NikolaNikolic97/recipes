<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/insert/insertMenu.php" method="post">
            <div class="row">
                <div class="input-field">
                    <input  id="href" type="text" name="href" value="">
                    <label for="href">Source</label>
                    <span class="helper-text left-align" ></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="email_inline" type="text" name="content" value="">
                    <label for="email_inline">Content</label>
                    <span class="helper-text left-align"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field">
                    <input id="icon" type="text" name="icon" value="">
                    <label for="icon">Icon</label>
                    <span class="helper-text left-align"></span>
                </div>
            </div>
            <button id="insertMenu" class="btn btn-large red right" name="insertMenu" type="submit">Insert</button>
        </form>
    </div>
</div>
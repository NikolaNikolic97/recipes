<div class="col s12 m8 l9   ">
<div class="row ">
    <form class="col s6 offset-s3" action="PHP/logic/admin/insert/insertUsers.php" method="post">
        <div class="row">
            <div class="input-field">
                <input  id="full_name" type="text" class="validate" name="full_name" value="">
                <label for="full_name">Full Name</label>
                <span class="helper-text left-align" data-error="invalid format full name"></span>
            </div>
        </div>
        <div class="row">
                <div class="input-field">
                    <input id="email" type="email" class="validate" name="email" value="">
                    <label for="email">Email</label>
                    <span class="helper-text left-align" data-error="invalid format of email"></span>
                </div>
        </div>
        <div class="row">
            <div class="input-field ">
                <input id="password" type="password" name="password" class="validate" >
                <label for="password">Password</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
                <select name="role">
                <?php
                foreach ($roles as $r): ?>
                    <option  value="<?= $r->id ?>" ><?= $r->role ?></option>
                <?php endforeach; ?>
                </select>
                <label>Role</label>
            </div>
        </div>
        <label for="active">
            <input type="checkbox" name="active" id="active" />
            <span>Activate user</span>
        </label>
        <button id="insertUser" class="btn btn-large red right" name="insertUser" type="submit">Insert</button>
    </form>
</div>
</div>
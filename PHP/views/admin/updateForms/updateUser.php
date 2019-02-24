<div class="col s12 m8 l9   ">
<div class="row ">
    <form class="col s6 offset-s3" action="PHP/logic/admin/update/updateUsers.php" method="post">
        <div class="row">
            <div class="input-field">
                <input  id="full_name" type="text" class="validate" name="full_name" value="<?= $user->full_name ?>">
                <label for="full_name">Full Name</label>
                <span class="helper-text left-align" data-error="invalid format full name"></span>
            </div>
        </div>
        <div class="row">
                <div class="input-field">
                    <input id="email" type="email" class="validate" name="email" value="<?= $user->email ?>">
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
        <input type="hidden" value="<?= $_GET["id"] ?>" name="id">
        <div class="row">
            <div class="input-field col s12">
                <select name="role">
                <?php
                foreach ($roles as $r): ?>
                    <option <?php if($user->role ==$r->role) echo "selected";?> value="<?= $r->id ?>" ><?= $r->role ?></option>
                <?php endforeach; ?>
                </select>
                <label>Role</label>
            </div>
        </div>
        <label for="active">
            <input type="checkbox" id="active" name="active" <?php if($user->active==1) echo "checked";?>/>
            <span>Activate user</span>
        </label>
        <button id="updateUser" class="btn btn-large red right" name="updateUser" type="submit">Update</button>
    </form>
</div>
</div>
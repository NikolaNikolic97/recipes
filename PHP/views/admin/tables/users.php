<div class="col s12 m8 l9   ">
    <!-------------------------------table--------------------------------->
    <table class="striped responsive-table centered">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Email</th>
            <th>Password</th>
            <th style="height: 130px;">Image</th>
            <th>Active</th>
            <th>Role</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($users as $user):?>
        <tr>
            <td><?=$user->full_name?></td>
            <td><?=$user->email?></td>
            <td><?=$user->password?></td>
            <td><img src="<?=$user->img?>" alt="" style="height: 100px;"></td>
            <td><?=$user->active?></td>
            <td><?=$user->role?></td>
            <td><a id="userDelete" href="PHP/logic/admin/Delete/deleteUser.php?id=<?=$user->user_id?>" class="btn red darken-1 btn-small">Delete</a></td>
            <td><a id="userUpdate" href="admin.php?update=user&id=<?=$user->user_id?>" class="btn indigo darken-3 btn-small">Update</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

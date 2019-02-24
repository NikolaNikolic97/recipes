<div class="col s12 m8 l9   ">
    <!-------------------------------table--------------------------------->
    <table class="striped responsive-table centered">
        <thead>
        <tr>
            <th>User</th>
            <th>Recepi Name</th>
            <th>Recepi Content</th>
            <th>Video</th>
            <th>Description</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($recipes as $r):?>
            <tr>
                <td><?=$r->full_name?></td>
                <td><?=$r->recepi_name?></td>
                <td><?=$r->recipe_content?></td>
                <td><?=$r->video?></td>
                <td><?=$r->description?></td>
                <td><a href="PHP/logic/admin/Delete/deleteRecipes.php?id=<?=$r->recipe_id?>" class="btn red darken-1 btn-small">Delete</a></td>
                <td><a href="admin.php?update=recipes&id=<?=$r->recipe_id?>" class="btn indigo darken-3 btn-small">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

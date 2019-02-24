<div class="col s12 m8 l9   ">
    <!-------------------------------table--------------------------------->
    <table class="striped responsive-table centered">
        <thead>
        <tr>
            <th>Href</th>
            <th>Content</th>
            <th>Icon</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($menu as $m):?>
            <tr>
                <td><?=$m->href?></td>
                <td><?=$m->content?></td>
                <td><?=$m->icon?></td>
                <td><a href="PHP/logic/admin/Delete/deleteMenu.php?id=<?=$m->id?>" class="btn red darken-1 btn-small">Delete</a></td>
                <td><a href="admin.php?update=menu&id=<?=$m->id?>" class="btn indigo darken-3 btn-small">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

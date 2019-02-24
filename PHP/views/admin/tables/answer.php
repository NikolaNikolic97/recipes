<div class="col s12 m8 l9   ">
    <!-------------------------------table--------------------------------->
    <table class="striped responsive-table centered">
        <thead>
        <tr>
            <th>Answer</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($answer as $a):?>
            <tr>
                <td><?=$a->answer_content?></td>
                <td><a href="PHP/logic/admin/Delete/deleteAnswer.php?id=<?=$a->id?>" class="btn red darken-1 btn-small">Delete</a></td>
                <td><a href="admin.php?update=answer&id=<?=$a->id?>" class="btn indigo darken-3 btn-small">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

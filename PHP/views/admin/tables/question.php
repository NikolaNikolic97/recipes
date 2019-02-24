<div class="col s12 m8 l9   ">
    <!-------------------------------table--------------------------------->
    <table class="striped responsive-table centered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Question</th>

        </tr>
        </thead>

        <tbody>
        <?php foreach ($question as $q):?>
            <tr>
                <td><?=$q->id?></td>
                <td><?=$q->question?></td>
                <td><a href="PHP/logic/admin/Delete/deleteQuestion.php?id=<?=$q->id?>" class="btn red darken-1 btn-small">Delete</a></td>
                <td><a href="admin.php?update=question&id=<?=$q->id?>" class="btn indigo darken-3 btn-small">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

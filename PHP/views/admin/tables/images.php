<div class="col s12 m8 l9   ">
    <!-------------------------------table--------------------------------->
    <table class="striped responsive-table centered">
        <thead>
        <tr>
            <th style="height: 130px;">Image</th>
            <th>Description</th>
            <th>Recipes</th>
        </tr>
        </thead>

        <tbody>
        <?php foreach ($images as $img):?>
            <tr>
                <td><img src="<?=$img->src?>" alt="" style="height: 100px;"></td>
                <td><?=$img->alt?></td>
                <td><?=$img->recepi_name?></td>
                <td><a href="PHP/logic/admin/Delete/deleteImage.php?id=<?=$img->id_img?>" class="btn red darken-1 btn-small">Delete</a></td>
                <td><a href="admin.php?update=images&id=<?=$img->id_img?>" class="btn indigo darken-3 btn-small">Update</a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

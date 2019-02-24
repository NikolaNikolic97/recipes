<!------------------------- action btn ---------------------------------->
<?php  if(@$_SESSION["user"]->user_id ==$recipes->user_id): ?>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red tooltipped" data-position="left" data-tooltip="Edit your recipe">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating orange tooltipped" href="recipes.php?id=<?= $_GET["id"] ?>&page=update" data-position="left" data-tooltip="Update your recipe">
                    <i class="material-icons">update</i>
                </a>
            </li>
            <li>
                <a class="btn-floating blue tooltipped" href="PHP/logic/Recipes/delete.php?id=<?= $_GET["id"]?>&img=<?=$recipes->image_id?>" data-position="left" data-tooltip="Delete your recipe">
                    <i class="material-icons">clear</i>
                </a>
            </li>
        </ul>
    </div>
<?php endif; ?>

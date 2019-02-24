<!------------------------- action btn ---------------------------------->
<?php  if(@$_SESSION["user"]->role == "user"): ?>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large red tooltipped" data-position="left" data-tooltip="Edit your recipe">
            <i class="large material-icons">mode_edit</i>
        </a>
        <ul>
            <li>
                <a class="btn-floating green tooltipped" href="recipes.php?page=insert" data-position="left" data-tooltip="Insert your recipe">
                    <i class="material-icons">publish</i>
                </a>
            </li>
        </ul>
    </div>
<?php endif; ?>

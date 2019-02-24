<!-- ---------------------------------side nav---------------------- -->
<?php
require_once "PHP/Connection/connection.php";
$query = "select * from menu";
$menu = $conn->query($query)->fetchAll();
?>
        <ul class="sidenav" id="mobile-demo">
                <li>
                    <div class="user-view">
                        <div class="background grey lighten-3">

                        </div>
                        <?php if( isset($_SESSION["user"])) : ?>
                        <a href="#"><img class="circle" src="<?= $_SESSION["user"]->img ?>"></a>
                        <a href="#"><span class="black-text name"><?= $_SESSION["user"]->full_name ?></span></a>
                        <a href="#"><span class="black-text email"><?= $_SESSION["user"]->email ?></span></a>
                        <?php endif; ?>
                    </div>
                </li>
            <?php foreach ($menu as $m): ?>
                <li><a href="<?= $m->href ?>">
                        <i class="material-icons left"><?= $m->icon ?></i><?= $m->content ?>
                    </a></li>
            <?php endforeach; ?>
                    <?php if(isset($_SESSION["user"])): ?>
                <li>
                        <?php if($_SESSION["user"]->role == "admin"): ?>
                            <div class="fixed-action-btn margin-bootom-big">
                                <a class="btn btn-small red darken-2 margin-right-big" href="admin.php">
                                    Admin Panel
                                </a>
                            </div>
                        <?php endif;?>
                            <div class="fixed-action-btn margin-bootom-big">
                                <a class="btn btn-small red darken-2 " href="PHP/logic/logout.php">
                                    Logout
                                </a>
                            </div>
                        </li>
                        <li>
                            <a href="myRecipes.php">
                                <i class="material-icons left">local_dining</i>My recipes
                            </a>
                        </li>
                        <li>
                            <a href="theSurvey.php">
                                <i class="material-icons left">announcement</i>The survey
                            </a>
                        </li>
                    <?php else: ?>
                <li>
                    <div class="fixed-action-btn margin-bootom-big">
                        <a href="#loginModal" class="btn btn-small red darken-2 modal-trigger">
                            Login
                        </a>
                    </div>
                    <div class="fixed-action-btn margin-bootom-big margin-right-big">
                        <a href="#signUpModal" class="btn btn-small indigo darken-1 modal-trigger">
                            Sign up
                        </a>
                    </div>
                </li>
                    <?php endif; ?>
        </ul>
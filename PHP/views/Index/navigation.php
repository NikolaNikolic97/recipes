<!-- ----------------------------------navigation------------------------------- -->
<?php
require_once "PHP/Connection/connection.php";
$query = "select * from menu";
$menu = $conn->query($query)->fetchAll();
?>
<nav class="row  light-blue darken-4">
                <div class="nav-wrapper  light-blue darken-4 col s12 ">
                    <a href="index.php" class="brand-logo center">
                        <img src="IMG/logo_icon.png" alt="Logo" class="responsive-img" style="height:100px">
                    </a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                    <ul id="nav-mobile" class="left hide-on-med-and-down">
                        <?php foreach ($menu as $m): ?>
                        <li><a href="<?= $m->href ?>">
                            <i class="material-icons left"><?= $m->icon ?></i><?= $m->content ?>
                        </a></li>
                        <?php endforeach; ?>
                    </ul>
                    <ul id="nav-mobile" class="right hide-on-med-and-down">
                        <?php if(!isset($_SESSION["user"])): ?>
                            <li><a href="#signUpModal" class="btn red waves-effect btn-small modal-trigger">Sign Up</a></li>
                                <li><a href="#loginModal" class="btn indigo waves-effect btn-small modal-trigger">Login</a></li>
                        <?php else: ?>
                        <?php if($_SESSION["user"]->role == "admin"): ?>
                            <li><a href="admin.php" ">Admin Panel</a></li>
                            <li><a href="PHP/logic/logout.php" class="btn red waves-effect btn-small modal-trigger">Logout</a>
                        <?php endif; ?>
                        <?php if ($_SESSION["user"]->role == "user"): ?>
                        <li ><a href="myRecipes.php">My recipes</a ></li>
                        <li ><a href="theSurvey.php">The survey</a ></li>
                        <li><a href="PHP/logic/logout.php" class="btn red waves-effect btn-small modal-trigger">Logout</a></li>
                        <a href="updateProfile.php" class="left" id="avatar-img__index" data-target='dropdown1' "><img style="height: 60px;"class="circle" src="<?= $_SESSION["user"]->img ?>"></a>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
        </nav>
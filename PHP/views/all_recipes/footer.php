<?php
require_once "PHP/Connection/connection.php";
$query = "select * from menu";
$menu = $conn->query($query)->fetchAll();
?>
<footer class="page-footer light-blue darken-4">
    <div class="container">
        <div class="row ">
            <div class="col s12 center">
                <img src="IMG/logo.png" alt="logo" class="responsive-img" id="footer__image">
            </div>
            <div class="col s12" id="footer__list">
                <ul class="valign-wrapper " >
                    <?php foreach ($menu as $m): ?>
                        <li><a href="<?= $m->href ?>" class="grey-text text-lighten-3">
                                <?= $m->content ?>
                            </a></li>
                    <?php endforeach; ?>
                    <li><a class="grey-text text-lighten-3" href="#">Documenation</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- <a class="btn-floating btn-large waves-effect waves-light red right" id="btnScrollToTop"><i class="material-icons">arrow_upward</i></a> -->
<!--JavaScript at end of body for optimized loading-->
<script src="JS/vendor/jquery.min.js"></script>
<script src="JS/vendor/materialize.min.js"></script>
<script src="JS/allRecipes/main.js"></script>

</body>
</html>
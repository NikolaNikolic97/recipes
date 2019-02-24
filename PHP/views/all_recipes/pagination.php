<!-- -----------------------pagination------------------- -->
<ul class="pagination center">
    <?php for($i=1;$i<=$linksNumber;$i++): ?>
        <li class="<?php if ($i==$_GET['page']) echo 'active indigo'; ?> ">
            <a  href="allRecipes.php?page=<?= $i; ?>">
                <?= $i; ?>
            </a>
        </li>
    <?php endfor; ?>
</ul>
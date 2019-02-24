<div class="row">
    <div class="container">
        <h1 class="center-align">The Survey</h1>
    <div class="row">
        <?php foreach ($question as $q): ?>
                <div class="col s12 m6">
                    <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title"><?=$q->question?></span>
                            </div>
                            <form action="" method="">
                                <input type="hidden" name="id"  value="<?=$q->id?>">
                                <input type="hidden" name="user"  value="<?=$_SESSION["user"]->id?>">
                                <?php foreach ($answer as $a): ?>
                                <?php if($q->id == $a->id_question):?>
                                <div class="card-action">
                                    <label>
                                        <input type="radio" name="radio<?=$q->id?>"  value="<?= $a->id ?>"/>
                                        <span class="white-text"><?= $a->answer_content ?></span>
                                    </label>
                                </div>
                                <?php endif; ?>
                                <?php endforeach; ?>
                                <div class="card-action">
                                    <input type="submit" name="survey" data-id="<?=$q->id?>" class="btn btn-large  red accent-2" value="Vote"/>
                                </div>
                            </form>
                    </div>
                </div>
        <?php endforeach;?>
    </div>
</div>
</div>
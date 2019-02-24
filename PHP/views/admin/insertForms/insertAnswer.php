
<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/insert/insertAnswer.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input  id="answer" type="text" name="answer" value="">
                    <label for="answer">Answer</label>
                    <span class="helper-text left-align" data-error="invalid format full name"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="question">
                        <?php
                        foreach ($questions as $q): ?>
                            <option  value="<?= $q->id ?>" ><?= $q->question ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Question</label>
                </div>
            </div>
            <button id="insertAnswer" class="btn btn-large red right" name="insertAnswer" type="submit">Insert</button>
        </form>
    </div>
</div>
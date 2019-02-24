
<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/update/updateAnswer.php" method="post">
            <div class="row">
                <div class="input-field col s12">
                    <input  id="answer" type="text" name="answer" value="<?= $answer->answer_content ?>">
                    <label for="answer">Answer</label>
                    <span class="helper-text left-align" data-error="invalid format full name"></span>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <div class="row">
                <div class="input-field col s12">
                    <select name="question">
                        <?php
                        foreach ($questions as $q): ?>
                            <option <?php if($answer->id_question ==$q->id) echo "selected";?> value="<?= $q->id ?>" ><?= $q->question ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Question</label>
                </div>
            </div>
            <button id="updateAnswer" class="btn btn-large red right" name="updateAnswer" type="submit">Update</button>
        </form>
    </div>
</div>
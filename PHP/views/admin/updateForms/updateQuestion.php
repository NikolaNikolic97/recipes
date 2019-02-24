<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/update/updateQuestion.php" method="post">
            <div class="row">
                <div class="input-field">
                    <input  id="question" type="text" name="question" value="<?= $question->question ?>">
                    <label for="question">Question</label>
                    <span class="helper-text left-align" data-error="invalid format full name"></span>
                </div>
            </div>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <button id="updateQuestion" class="btn btn-large red right" name="updateQuestion" type="submit">Update</button>
        </form>
    </div>
</div>
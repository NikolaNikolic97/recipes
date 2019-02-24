<div class="col s12 m8 l9   ">
    <div class="row ">
        <form class="col s6 offset-s3" action="PHP/logic/admin/insert/insertQuestion.php" method="post">
            <div class="row">
                <div class="input-field">
                    <input  id="question" type="text" name="question" value="">
                    <label for="question">Question</label>
                    <span class="helper-text left-align" data-error="invalid format full name"></span>
                </div>
            </div>
            <button id="insertQuestion" class="btn btn-large red right" name="insertQuestion" type="submit">Insert</button>
        </form>
    </div>
</div>
        <!------------------------ Modal sing up ------------------------->
        <div id="loginModal" class="modal">
    <div class="modal-content center ">
      <h4 >Login</h4>
      <div class="container">
        <div class="row">
            <form class="col s12" action="PHP/logic/login.php" method="post">
              <div class="row">
                <div class="input-field ">
                    <input id="loginEmail" type="email" class=" black-text" name="loginEmail">
                    <label class="black-text" for="loginEmail">Email</label>
                    <span class="helper-text left black-text" >
                      <p id="emailText">
                        example@gmail.com
                      </p>
                    </span>
                  </div>
                </div>
                <div class="row">
                    <div class="input-field ">
                        <input id="loginPassword" type="password" class=" black-text" name="loginPassword">
                        <label class="black-text" for="loginPasswords">Password</label>
                        <span class="helper-text left black-text" >
                          <p id="password_text">
                            pass123
                          </p>
                        </span>
                    </div>
                </div>
                <button  class=" waves-effect waves-green btn-flat red white-text right" id="loginBtnSubmit" name="loginBtnSubmit">Login</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  <!---------------------------- Modal login ----------------------------->
  <div id="signUpModal" class="modal">
        <div class="modal-content center">
                <h4 >Sign up</h4>
                <div class="container">
                  <div class="row">
                      <form class="col s12" action="../../logic/signUp.php" method="post">
                        <div class="row">
                            <div class="input-field ">
                                <input id="signUpFullName" type="text" name="signUpFullName">
                                <label class="black-text "  for="signUpFullName">Full Name</label>
                                <span class="helper-text left black-text" >
                                    <p id="fullNameText">
                                         Pera Peric
                                    </p>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                          <div class="input-field ">
                              <input id="signUpEmail" type="email"  name="signUpEmail">
                              <label class="black-text" for="signUpEmail">Email</label>
                              <span class="helper-text left black-text" >
                                <p id="sEmailText">
                                    example@gmail.com
                                </p>
                              </span>
                            </div>
                          </div>
                          <div class="row">
                              <div class="input-field ">
                                  <input id="signUpPassword" type="password"  name="signUpPassword">
                                  <label class="black-text" for="signUpPassword">Password</label>
                                  <span class="helper-text left black-text" >
                                    <p id="sPassText">
                                        pass123
                                    </p>
                                  </span>
                              </div>
                          </div>
                          <button  class=" waves-effect waves-green btn-flat red white-text right" id="signUpBtnSubmit" name="signUpBtnSubmit">Sign up</button>
                      </form>
                    </div>
                  </div>
                </div>
  </div>

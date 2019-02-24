//materialize components initialization
document.addEventListener('DOMContentLoaded', function() {
    //initialization of  side nav
    M.Sidenav.init(document.querySelectorAll('.sidenav'));
    //modals
    M.Modal.init(document.querySelectorAll('.modal'));
    //login
    document.getElementById("loginBtnSubmit").addEventListener("click",loginHendler);
    //signUP
    document.getElementById("signUpBtnSubmit").addEventListener("click",signUpHeandler);
    //admin dashboard
    M.Collapsible.init(document.querySelectorAll('.collapsible'));
    //form select
    M.FormSelect.init(document.querySelectorAll('select'));
});
function loginHendler(e){
    e.preventDefault();

    const email = document.getElementById("loginEmail").value;
    const pass = document.getElementById("loginPassword").value;


    const regEmail = /^[a-z][A-z0-9\.]+\@[a-z]{3,6}(\.[a-z]{2,6})+$/;

    let errors = [];

    if(!regEmail.test(email)){
        errors.push("bad email");
        document.getElementById("loginEmail").style.borderBottom = "1px solid red";
        document.getElementById("emailText").innerHTML = "bad format of email";
    }
    else
    {
        document.getElementById("emailText").innerHTML = "";
        document.getElementById("loginEmail").style.borderBottom = "1px solid transparent";
    }
    if(pass.length < 6){
        errors.push("bad password");
        document.getElementById("loginPassword").style.borderBottom = "1px solid red";
        document.getElementById("password_text").innerHTML = "password must have at least 6 caracters";
    }
    else
    {
        document.getElementById("password_text").innerHTML = "";
        document.getElementById("loginPassword").style.borderBottom = "1px solid transparent";
    }
    if(errors.length === 0){
        let modal = document.getElementById("loginModal");
        M.Modal.getInstance(modal).close();

        //ajax
        $.ajax({
            url:"http://localhost/recipesSite/PHP/logic/login.php",
            method:"post",
            dataType:"json",
            data:{
                submit:"poslato",
                email:email,
                pass:pass

            },
            success:function (data) {
                if(data.odg ==="admin"){
                    window.location.href = "admin.php";
                }
                else {
                    window.location.href = "myRecipes.php";
                }

            },
            error:function (xhr,status,errMsg) {

                console.log(status);
                console.log(odgovor);
            }
        });
    }
}

function signUpHeandler(e)
{
    e.preventDefault();

    const email = document.getElementById("signUpEmail").value;
    const pass = document.getElementById("signUpPassword").value;
    const fullName = document.getElementById("signUpFullName").value;

    const regEmail = /^[a-z][A-z0-9\.]+\@[a-z]{3,6}(\.[a-z]{2,6})+$/;
    const regFullName = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/;

    let errors = [];
    if(!regFullName.test(fullName)){
        errors.push("bed fullName");
        document.getElementById("signUpFullName").style.borderBottom = "1px solid red";
        document.getElementById("fullNameText").innerHTML = "you must enter first name and last name with uppercase first letter";
    }
    else
    {
        document.getElementById("fullNameText").innerHTML = "";
        document.getElementById("signUpFullName").style.borderBottom = "1px solid transparent";
    }

    if(!regEmail.test(email)){
        errors.push("bad email");
        document.getElementById("signUpEmail").style.borderBottom = "1px solid red";
        document.getElementById("sEmailText").innerHTML = "bad format of email";
    }
    else
    {
        document.getElementById("sEmailText").innerHTML = "";
        document.getElementById("signUpEmail").style.borderBottom = "1px solid transparent";
    }

    if(pass.length < 6){
        errors.push("bad password");
        document.getElementById("signUpPassword").style.borderBottom = "1px solid red";
        document.getElementById("sPassText").innerHTML = "password must have at least 6 caracters";
    }
    else
    {
        document.getElementById("sPassText").innerHTML = "";
        document.getElementById("signUpPassword").style.borderBottom = "1px solid transparent";
    }
    if(errors.length === 0){
        let modal = document.getElementById("signUpModal");
        M.Modal.getInstance(modal).close();
        $.ajax({
            url:"http://localhost/recipesSite/PHP/logic/signUp.php",
            method:"post",
            dataType:"json",
            data:{
                submit:"ok",
                fullName:fullName,
                email:email,
                pass:pass
            },
            success :function (data) {
                let mess = data.odg;
                M.toast({html: mess})
            },
            error:function(xhr,status,errMsg){
                console.log(status);
                console.log(xhr);
            }
        });
    }
}

//window.onload = function () {
 //   $.ajax({

 //   })
//}
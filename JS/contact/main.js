document.getElementById("contact__btn").addEventListener("click",contactBtnHendler);
function  contactBtnHendler(e) {
    e.preventDefault();
    const fullName = document.getElementById("input_name").value;
    const email = document.getElementById("input_email").value;
    const message = document.getElementById("text_area").value;

    const regEmail = /^[a-z][A-z0-9\.]+\@[a-z]{3,6}(\.[a-z]{2,6})+$/;
    const regFullName = /^[A-Z][a-z]{2,14}(\s[A-Z][a-z]{2,14})+$/;
    let errors = [];

    if(!regFullName.test(fullName)){
        errors.push("bed fullName");
        document.getElementById("input_name").style.borderBottom = "1px solid red";
        document.getElementById("contact__nameText").innerHTML = "you must enter first name and last name with uppercase first letter";
    }
    else
    {
        document.getElementById("contact__nameText").innerHTML = "Paja Patak";
        document.getElementById("input_name").style.borderBottom = "1px solid #888";
        document.getElementById("input_name").value = "";
    }

    if(!regEmail.test(email)){
        errors.push("bad email");
        document.getElementById("input_email").style.borderBottom = "1px solid red";
        document.getElementById("contact__emailText").innerHTML = "bad format of email";
    }
    else
    {
        document.getElementById("contact__emailText").innerHTML = "example@gmail.com";
        document.getElementById("input_email").style.borderBottom = "1px solid #888";
        document.getElementById("input_email").value = "";
    }
    if(message.length === 0){
        errors.push("you must enter message");
        document.getElementById("text_area").style.borderBottom = "1px solid red";
        document.getElementById("contact__message").innerHTML = "You must enter message";
    }
    else{
        document.getElementById("contact__message").innerHTML = "Here enter message";
        document.getElementById("text_area").style.borderBottom = "1px solid #888";
        document.getElementById("text_area").value = "";
    }
    if(errors.length === 0){
        $.ajax({
            url:"http://localhost/recipesSite/PHP/logic/contact.php",
            method:"post",
            dataType:"json",
            data:{
                contact : "ok",
                fullName:fullName,
                email:email,
                message : message
            },
            success:function (data) {
                const mess = data.odg;
                M.toast({html: mess});
            },
            error:function (xhr,status,errMsg) {

            }
        });
    }

}


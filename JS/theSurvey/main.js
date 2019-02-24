//materialize components initialization

document.addEventListener('DOMContentLoaded', function() {
    //initialization of  side nav
    M.Sidenav.init(document.querySelectorAll('.sidenav'));
    //modals
    M.Modal.init(document.querySelectorAll('.modal'));
    //drop down menu
    M.Dropdown.init(document.querySelectorAll('.dropdown-trigger'));
});

$("input:submit[name=survey]").on("click",function (e) {
    e.preventDefault();
    const id = $(this).data("id");
    const radioBtn = document.querySelector('input[name="radio'+id+'"]:checked').value;
    const user = document.querySelector('input[name="user"]').value;
    $.ajax({
        url:"http://localhost/recipesSite/PHP/logic/theSurvey.php",
        method:"post",
        dataType:"json",
        data:{
            survey:"ok",
            id:id,
            radio:radioBtn,
            user:user
        },
        success :function (data) {
            document.getElementById("modal__responseText").innerHTML = "You have successfully voted on the survey";
            M.Modal.getInstance(document.getElementById("modalSurvey")).open();
        },
        error:function(xhr,status,errMsg){
            var odgovor = JSON.parse(xhr.responseText);
            switch (odgovor.code) {
                case 409:
                    document.getElementById("modal__responseText").innerHTML = "You have already voted on this question";
                    M.Modal.getInstance(document.getElementById("modalSurvey")).open();
                    break;
                case 500:
                    document.getElementById("modal__responseText").innerHTML = "there was a server error";
                    M.Modal.getInstance(document.getElementById("modalSurvey")).open();
                    break;

            }
        }
    });
});


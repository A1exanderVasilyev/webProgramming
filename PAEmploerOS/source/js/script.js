//
//account/signin.php
//
/* 
    Авторизация
*/

$('.login-button').click(function (e) {

    e.preventDefault();
    $(`input`).removeClass('validate-error');

    let loginValue = $('input[name="login"]').val(),
        passwordValue = $('input[name="password"]').val();

    $.ajax({
        url: 'account/signin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: loginValue,
            password: passwordValue,
        },
        success(data) {


            if (data.status) {
                document.location.href = '/profile.php';
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('validate-error');
                    });
                }
                $('.msg').removeClass('hidden').text(data.message);
            }


        }
    });

})


/* 
    Регистрация
*/


/* 
    Получение документов с формы
*/

let docs = false;

$('input[name="documents"]').change(function (e) {
    docs = e.target.files[0];
    console.log(docs);
});


$('.register-button').click(function (e) {

    e.preventDefault();
    $(`input`).removeClass('validate-error');

    let organisationNameValue = $('input[name="organisation_name"]').val(),
        organisationAdressValue = $('input[name="organisation_adress"]').val(),
        organisationEmailValue = $('input[name="organisation_email"]').val(),
        tinValue = $('input[name="tin"]').val(),
        loginValue = $('input[name="login"]').val(),
        passwordValue = $('input[name="password"]').val(),
        passwordConfirmValue = $('input[name="password_confirm"]').val();

    let formData = new FormData();
    formData.append('organisation_name', organisationNameValue);
    formData.append('organisation_adress', organisationAdressValue);
    formData.append('organisation_email', organisationEmailValue);
    formData.append('tin', tinValue);
    formData.append('documents', docs);
    formData.append('login', loginValue);
    formData.append('password', passwordValue);
    formData.append('password_confirm', passwordConfirmValue);

    $.ajax({
        url: 'account/signup.php',
        type: 'POST',
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        data: formData,
        success(data) {


            if (data.status) {
                document.location.href = '/index.php';
            } else {
                if (data.type === 1) {
                    data.fields.forEach(function (field) {
                        $(`input[name="${field}"]`).addClass('validate-error');
                    });
                }

                $('.msg').removeClass('hidden').text(data.message);
            }


        }
    });

})

/*
    Зависимый список ratings.php
*/

$(document).ready(function () {
    $("#faculty").change(function () {
        let facultyVal = parseInt($("#faculty").val());
        selectSpecialty(facultyVal);
    });

    $("#specialty").change(function () {
        let specialtyVal = parseInt($("#specialty").val());
        selectGroup(specialtyVal);
    });
});

function selectSpecialty(facultyVal) {
    let specialtyOption = $("#specialty");

    $("#divspecialty,#divgroup").hide();
    clear(specialtyOption);
    clear($("#group"));

    if (facultyVal > 0) {
        $("#divspecialty").fadeIn("fast");
        specialtyOption.attr("disabled", false);
        specialtyOption.load(
            "ratings.php",
            {
                facultyVal: facultyVal,
            }
        );
    }
}
//

function selectGroup(specialtyVal) {
    let groupOption = $("#group");

    $("#divgroup").hide();
    clear(groupOption);

    if (specialtyVal > 0) {
        $("#divgroup").fadeIn("fast");
        groupOption.attr("disabled", false);
        groupOption.load(
            "ratings.php",
            {
                specialtyVal: specialtyVal,
            }
        );
    }
}

function clear(value) {
    value.empty();
    value.attr("disabled", true);
}
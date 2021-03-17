
$('#form').submit(function (Event) {
    let emptyFields = $('input').filter(function () {
        return $(this).data('required') && $(this).val() === "";
    }).addClass('popup__validate-error');
    console.log(emptyFields);
    let ef = emptyFields.length;
    console.log(ef);

    if (emptyFields.length > 0) {
        event.preventDefault();
    }
})
$('input').focus(function () {
    $(this).removeClass('popup__validate-error');
});

$('#form-email').submit(function (Event) {
    let emptyField = $('#email').filter(function () {
        return $(this).data('required') && $(this).val() === "";
    }).addClass('popup__validate-error');
    console.log(emptyField);
    let ef = emptyField.length;
    console.log(ef);

    if (emptyField.length > 0) {
        event.preventDefault();
    }
})
$('#email').focus(function () {
    $(this).removeClass('popup__validate-error');
});

/* $('#form').submit(function (Event) {
    let suka = $('input');
    console.log(suka);
    let emptyFields = $('input').filter(function () {
        return $(this).data('required') && $(this).val() === "";
    }).addClass('popup__validate-error');

    if (emptyFields.length > 0 || emptyCheckBox.length > 0) {
        event.preventDefault();
    }
})
console.log(emptyFields);
$('input').focus(function () {
    $(this).removeClass('popup__validate-error');
});
$('select').focus(function () {
    $(this).removeClass('popup__validate-error');
}); */
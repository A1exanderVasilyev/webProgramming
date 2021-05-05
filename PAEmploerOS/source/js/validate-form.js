$('#form').submit(function (Event) {
    let emptyFields = $(this).find(':input').filter(function () {
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
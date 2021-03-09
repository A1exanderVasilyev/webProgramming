$('#form').submit(function(Event) {
    let emptyFields = $('input').filter(function() {
        return $(this).data('required') && $(this).val() === "";
    }).addClass('popup_validate_error');
    
    let emptySelect = $('select').filter(function() {
        let emptyActivity = $(this).prop("selectedIndex") == false;
        return emptyActivity;
    }).addClass('popup_validate_error');

    let emptyCheckBox = $('#agreement_checkbox').filter(function() {
        let emptyCheck = $(this).is(":not(:checked)");
        return emptyCheck;
    }).addClass('popup_validate_error');
    let ef = emptyFields.length;
    console.log(ef);
    let es = emptySelect.length;
    console.log(es);
    
    if(emptyFields.length > 0 || emptyCheckBox.length > 0) {
        event.preventDefault();
    }
})
$('input').focus(function() {
        $(this).removeClass('popup_validate_error');
    });
$('select').focus(function() {
        $(this).removeClass('popup_validate_error');
    });
$(function(){
    $('#register_form').on('submit',function(e){
        validate_form(e);
    });
});

function validate_name_empty(){
    let validated = true;
    if($('#name').val()===""){
        validated = false;
    }
    return validated;


}

function validate_email_empty(){
    let validated = true;
    if($('#mail').val()===""){
        validated = false;
    }
    return validated;
}

function validate_password_empty(){
    let validated = true;
    if($('#pass').val()===""){
        validated = false;
    }
    return validated;
}

function validate_password_confirm_empty(){
    let validated = true;
    if($('#password_confirm').val()===""){
        validated = false;
    }
    return validated;
}

function validate_name_six_chars(){
    let validated = true;
    if($('#name').val().length<6){
        validated = false;
    }
    return validated;
}

function validate_password_six_chars(){
    let validated = true;
    if($('#pass').val().length<6){
        validated = false;
    }
    return validated;
}

function validate_name_regex(){
    let validated = false;
    let check = /^[a-zA-Z]*$/
    if(check.test($('#name').val())){
        validated = true;
    }
    return validated;
}

function validate_mail_regex(){
    let validated = false;
    let check = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/g
    if(check.test($('#mail').val())){
        validated = true;
    }
    return validated;
}

function validate_password_regex(){
    let validated = false;
    let check = /^[a-zA-Z0-9]*$/
    if(check.test($('#pass').val())){
        validated = true;
    }
    return validated;
}

function validate_password_same_confirm(){
    let validated = false;
    if($('#pass').val()===$('#password_confirm').val()){
        validated = true;
    }
    return validated;
}





function validate_form(e){
    e.preventDefault();
    if(validate_name_empty() && validate_email_empty() && validate_password_empty() && validate_password_confirm_empty() && validate_name_six_chars() &&
    validate_password_six_chars() && validate_password_same_confirm() && validate_name_regex() && validate_mail_regex() && validate_password_regex()
    ){
        document.getElementById('register_form').submit();
    } else{
        check_errors();
    }
}

function check_errors(){
    $('#name').removeClass('is-invalid');
    $('#nameErrors').empty();
    $('#mail').removeClass('is-invalid');
    $('#emailErrors').empty();
    $('#pass').removeClass('is-invalid');
    $('#passwordErrors').empty();
    $('#password_confirmation').removeClass('is-invalid');
    $('#passwordConfirmErrors').empty();

    if(!validate_name_empty()){
        $('#name').addClass('is-invalid');
        $('#nameErrors').append('<div>Name is needed</div>');
    }

    if(!validate_email_empty()){
        $('#mail').addClass('is-invalid');
        $('#emailErrors').append('<div>Email is needed</div>');
    }

    if(!validate_password_empty()){
        $('#pass').addClass('is-invalid');
        $('#passwordErrors').append('<div>Password is needed</div>');
    }

    if(!validate_password_confirm_empty()){
        $('#password_confirm').addClass('is-invalid');
        $('#passwordConfirmErrors').append('<div>Password confirmation is needed</div>');
    }

    if(!validate_name_six_chars()){
        $('#name').addClass('is-invalid');
        $('#nameErrors').append('<div>Name need six characters or more</div>');
    }

    if(!validate_password_six_chars()){
        $('#pass').addClass('is-invalid');
        $('#passwordErrors').append('<div>Password need six characters or more</div>');
    }

    if(!validate_password_same_confirm()){
        $('#password_confirm').addClass('is-invalid');
        $('#passwordConfirmErrors').append('<div>Password and password confirmation need to be equals</div>');
    }

    if(!validate_name_regex()){
        $('#name').addClass('is-invalid');
        $('#nameErrors').append('<div>Name only can have alphabetic characters</div>');
    }

    if(!validate_mail_regex()){
        $('#email').addClass('is-invalid');
        $('#emailErrors').append('<div>Email need to be like: email@example.com</div>');
    }

    if(!validate_password_regex()){
        $('#pass').addClass('is-invalid');
        $('#passwordErrors').append('<div>Password only can have alphanumeric characters</div>');
    }
}
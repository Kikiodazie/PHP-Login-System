

$(document).on('submit', "form.js-register",function(event){
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error",_form);

    var dataobj = {
        email: $("input[type='email']",_form).val(),
        password: $("input[type='password']",_form).val()

    };

        if(dataobj.email.length < 16){
            _error
                .text("Please write a valid email address")
                .show();
            return false;

        } else if(dataobj.password.length<11){
            _error
                .text("please enter a passphrase that is at least 11 characters long.")
                .show();
            return false;

        }




    _error.hide();

    $.ajax({
		type: 'POST',
		url: '/php_login_course/ajax/register.php',
		data: dataobj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
        // Whatever data is 
       
        if(data.redirect !== undefined) {
            window.location = data.redirect;

        }else if(data.error !== undefined){
            _error
                .text(data.error)
                .show();
        }
		
	})
	.fail(function ajaxFailed(e) {
        // This failed 
        
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
    })
    
    return false;
})

//
//
.on('submit', "form.js-login",function(event){
    event.preventDefault();

    var _form = $(this);
    var _error = $(".js-error",_form);

    var dataobj = {
        email: $("input[type='email']",_form).val(),
        password: $("input[type='password']",_form).val()

    };

        if(dataobj.email.length < 16){
            _error
                .text("Please write a valid email address")
                .show();
            return false;

        } else if(dataobj.password.length<11){
            _error
                .text("please enter a passphrase that is at least 11 characters long.")
                .show();
            return false;

        }




    _error.hide();

    $.ajax({
		type: 'POST',
		url: '/php_login_course/ajax/login.php',
		data: dataobj,
		dataType: 'json',
		async: true,
	})
	.done(function ajaxDone(data) {
        // Whatever data is 
       
        if(data.redirect !== undefined) {
            window.location = data.redirect;

        }else if(data.error !== undefined){
            _error
                .html(data.error)
                .show();
        }
		
	})
	.fail(function ajaxFailed(e) {
        // This failed 
        
	})
	.always(function ajaxAlwaysDoThis(data) {
		// Always do
		console.log('Always');
    })
    
    return false;
})
$('form.form-login .input-submit').click(function() {
    // Fade in load icon
    // Disable submit button
    // Clear/Hide error messages
    // Get vars from form
    var email = $('form.form-login input.input-email').val();
    var pass = $('form.form-login input.input-pass').val();
    var dstring = 'email='+email+'&pass='+pass;
    $.ajax({
	url: 'assets/php/user-login.php',
	type: 'POST',
	data: dstring,
	dataType: 'json',
	success: function(json) {
	    console.log(json);
	}
    });

});
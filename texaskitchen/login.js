// JavaScript Document
$(document).ready(function() {
  
    // Setup form validation on the #register-form element
    $("#login-form").validate({
    
        // Specify the validation rules
        rules: {
            username: {
                required: true,
                email: true,
				minlength: 6
            },
            password: {
                required: true,
                minlength: 6
            }
        },
        
        // Specify the validation error messages
        messages: {
           
            password: {
                required: "Password cannot be left blank. Please provide a Password",
                minlength: "Your password must be at least 6 characters long"
            },
            username: {
				required: "Email cannot be left blank. Please enter an email address",
				email: "Please enter a valid email address",
				minlength: "Your e-mail must be at least 6 characters long"
			}
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
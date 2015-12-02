// JavaScript Document
$(document).ready(function() {
  
    // Setup form validation on the #register-form element
    $("#userchangepassword-form").validate({
    
        // Specify the validation rules
        rules: {
            password: {
                required: true,
                minlength: 6
            },
			newpassword: {
                required: true,
                minlength: 6
            },
			confirmnewpassword: {
                required: true,
                minlength: 6,
				equalTo: "#newpassword"
            }
        },
        
        // Specify the validation error messages
        messages: {
            password: {
                required: "Please provide current Password",
                minlength: "Your password must be at least 6 characters long"
            },
			newpassword: {
                required: "Please provide new Password",
                minlength: "Your password must be at least 6 characters long"
            },
			confirmnewpassword: {
                required: "Please provide new Password again",
                minlength: "Your password must be at least 6 characters long",
				equalTo: "Both new passwords did not match"
            }
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
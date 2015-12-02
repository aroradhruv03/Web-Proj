// JavaScript Document

$(document).ready(function() {
  
    // Setup form validation on the #register-form element
    $("#signup-form").validate({
    
        // Specify the validation rules
        rules: {
            firstname: {
				required : true,
				minlength : 1
			},
            lastname: {
				required : true,
				minlength : 1
			},
            username: {
                required: true,
                email: true,
				minlength: 6
            },
            password: {
                required: true,
                minlength: 6
            },
			confirmpassword: {
                required: true,
                minlength: 6,
				equalTo: "#password"
            },
			phonenumber: {
				required: true,
				minlength: 10,
				digits: true
			},
			address: {
				required: true
			},
			security_answer: {
				required: true	
			}
        },
        
        // Specify the validation error messages
        messages: {
            firstname: {
				required: "Please enter your first name",
				minlength: "Please enter your first name"
			},
            lastname: {
				required: "Please enter your last name",
				minlength: "Please enter your last name"
			},
            password: {
                required: "Please provide a Password",
                minlength: "Your password must be at least 6 characters long"
            },
			confirmpassword: {
                required: "Please provide a Password",
                minlength: "Your password must be at least 6 characters long",
				equalTo: "Both passwords did not match"
            },
            username: {
				required: "Please enter a email address",
				email: "Please enter a valid email address",
				minlength: "Your e-mail must be at least 6 characters long"
			},
			phonenumber: {
				required: "Please enter a Phone number",
				minlength: "Phone number should be atleast 10 digits",
				digits: "Enter valid phone number which should consist of only digits"
			},
			address: {
				required: "Please enter Address"
			},
			security_answer: {
				required: "Please enter a Security Answer"
			}
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });
	
    $("#username").keyup(function (e) { //user types username on inputfiled
   var username = $(this).val(); //get the string typed by user
   $.post('check_username.php', {'username':username}, function(data) { //make ajax call to check_username.php
   $("#user-result").html(data); //dump the data received from PHP page
   });
});

  });
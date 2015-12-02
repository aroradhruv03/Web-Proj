// JavaScript Document
$(document).ready(function() {
  
    // Setup form validation on the #register-form element
    $("#userupdatecontactinfo-form").validate({
    
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
   $.post('updatecontactinfo_check_username.php', {'username':username}, function(data) { //make ajax call to check_username.php
   $("#user-result").html(data); //dump the data received from PHP page
   });
});

  });
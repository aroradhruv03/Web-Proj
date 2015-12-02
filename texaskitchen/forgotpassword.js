// JavaScript Document
$(document).ready(function() {
	
	$("#forgotpassword-form").validate({
		rules: {
            username: {
                required: true,
                email: true,
				minlength: 6
            },
			answer: {
				required: true,
			}
        },
        
        // Specify the validation error messages
        messages: {
            username: {
				required: "Please enter a email address",
				email: "Please enter a valid email address",
				minlength: "Your e-mail must be at least 6 characters long"
			},
			answer: {
				required: "Please enter Answer to security question"
			}
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });
	
	$("#username").keyup(function (e) { //user types username on inputfiled
   var username = $(this).val(); //get the string typed by user
   $.post('check_username_forgot_password.php', {'username':username}, function(data) { 
   $("#user-result").html(data); //dump the data received from PHP page
   });
});

$("#answer").keyup(function (e) { //user types answer on inputfiled
   var username = $(this).val(); //get the string typed by user
   $.post('check_answer_forgot_password.php', {'answer':username}, function(data) { 
   $("#user-result").html(data); //dump the data received from PHP page
   });
});

	

});
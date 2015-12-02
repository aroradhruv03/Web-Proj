$(document).ready(function(){
	$("#login").click(function(){
		var email = $("#email").val();
		var password = $("#password").val();
// Checking for blank fields.
if( email =='' || password ==''){
	$('input[type="email"],input[type="password"]').css("border","1px solid red");
	$('input[type="email"],input[type="password"]').css("box-shadow","0 0 3px red");
	// alert("Please fill all fields...!!!!!!");
	$('#error').addClass('alert alert-danger').html("Please fill all the fields...!");
}
else {
	$.post("login_script.php",{ email1: email, password1:password},
		function(data) {
			if(data=='Invalid Email...!') {
				$('input[type="email"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
				$('input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
				// alert(data);
			}else if(data=='Invalid Email/Password...!'){
				$('input[type="email"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
				$('#error').addClass('alert alert-danger').html(data);
				// alert(data);
			} else if(data=='Successfully Logged in...!'){
				$("form")[0].reset();
				$('input[type="email"],input[type="password"]').css({"border":"2px solid green","box-shadow":"0 0 5px green"});
				$('#error').addClass('alert alert-success').html(data);
				

				var delay = 1000; //Your delay in milliseconds
				setTimeout(function(){ window.location = '/index.php'; }, delay);
				// alert(data);
			} else{
				$('#error').addClass('alert alert-success').html(data);
				// alert("Some Error Occured..!");
			}
		});
}
});

$('#password').keyup(function(){
	$('#pswd_info').show();

	var pswd = $('#password').val();

	//validate the length
if ( pswd.length < 8 ) {
    $('#length').removeClass('valid').addClass('invalid');
} else {
    $('#length').removeClass('invalid').addClass('valid');
}

//validate letter
if ( pswd.match(/[A-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
} else {
    $('#letter').removeClass('valid').addClass('invalid');
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
} else {
    $('#capital').removeClass('valid').addClass('invalid');
}

//validate number
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
} else {
    $('#number').removeClass('valid').addClass('invalid');
}								

        // $('#result').html(checkStrength($('#password').val()));
    })

function checkStrength(password){ 
//initial strength 
var strength = 0 ;

//if the password length is less than 6, return message. 
if (password.length < 6) 
{ 
	$('#result').removeClass();
	$('#result').addClass('short');
	return 'Too short';
} 

//length is ok, lets continue. 

//if length is 8 characters or more, increase strength value 
if (password.length > 7)
	strength += 1;

//if password contains both lower and uppercase characters, increase strength value 
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
	strength += 1;

//if it has numbers and characters, increase strength value 
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
	strength += 1;

//if it has one special character, increase strength value 
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))
	strength += 1;

//if it has two special characters, increase strength value 
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/))
	strength += 1 ;

//now we have calculated strength value, we can return messages 

//if value is less than 2 
if (strength < 2 ) { $('#result').removeClass() 
	$('#result').addClass('weak');
	return 'Weak';
}
else if (strength == 2 )
{ 
		$('#result').removeClass(); 
		$('#result').addClass('good');
		return 'Good';
	} 
else 
	{
		$('#result').removeClass();
		$('#result').addClass('strong');
		return 'Strong';
	}
}



});
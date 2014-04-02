$(document).ready(function(){
	LoginForm = new JackForm("#loginForm");
	$('#loginForm').validator("validate/login", function(response) {
			LoginForm.check(response);
	});
});
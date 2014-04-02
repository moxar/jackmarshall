$(document).ready(function(){
	loginForm = new JackForm("#loginForm");
	$('#loginForm').validator("validate/login", function(response) {
			loginForm.check(response);
	});
});
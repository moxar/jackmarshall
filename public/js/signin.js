$(document).ready(function(){
	SigninForm = new JackForm("#signinForm");
	$('#signinForm').validator("validate/signin", function(response) {
			SigninForm.check(response);
	});
});
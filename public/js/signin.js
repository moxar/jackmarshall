$(document).ready(function(){
	signinForm = new JackForm("#signinForm");
	$('#signinForm').validator("validate/signin", function(response) {
			signinForm.check(response);
	});
});
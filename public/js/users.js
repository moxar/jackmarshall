function SigninForm ()
{
	var name = $("input[name=name]");
	var email = $("input[name=email]");
	var password = $("input[name=password]");
	var confirm = $("input[name=confirm]");
	var self = this;
	
	self.validate = function(input, response)
	{		
	}
	
	$('input').change(function(){
		$.getJSON("signin/validate", {
			email: email.val(),
			name: name.val(),
			password: password.val(),
			confirm: confirm.val()
		}, function(response){
			console.log(response);
		});
	})
}

$(document).ready(function(){
	signinForm = new SigninForm();
});
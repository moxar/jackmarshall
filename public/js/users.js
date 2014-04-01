function SigninForm ()
{
	var name = $("input[name=name]");
	var email = $("input[name=email]");
	var password = $("input[name=password]");
	var confirm = $("input[name=confirm]");
	var self = this;
	
	self.validate = function(input, response)
	{
		switch(response)
		{
			case "valid":
				input.parent().removeClass("has-warning").removeClass("has-error").addClass("has-success");
				input.parent().find('span').removeClass("glyphicon-warning-sign").removeClass("glyphicon-remove").addClass("glyphicon-ok"); 
				break;
			case "used":
				input.parent().removeClass("has-success").removeClass("has-warning").addClass("has-error");
				input.parent().find('span').removeClass("glyphicon-ok").removeClass("glyphicon-warning-sign").addClass("glyphicon-remove");
				break;
			case "null":
				input.parent().removeClass("has-success").removeClass("has-error").addClass("has-warning");
				input.parent().find('span').removeClass("glyphicon-ok").removeClass("glyphicon-remove").addClass("glyphicon-warning-sign");
				break;
		}
	}
	/*
	name.blur(function(){
		$.getJSON("secure/isValidUserName", {name: name.val()}, function(response){
			self.validate(name, response.name);
		});
	});
	
	email.blur(function(){
		$.getJSON("secure/isValidEmail", {email: email.val()}, function(response){
			self.validate(email, response.email);
		});
	});
	
	password.blur(function(){
		$.getJSON("secure/isValidPassword", {password: password.val(), confirm: confirm.val()}, function(response){
			self.validate(password, response.password);
		});
	});
	
	confirm.blur(function(){
		$.getJSON("secure/isValidPassword", {password: password.val(), confirm: confirm.val()}, function(response){
			self.validate(password, response.password);
		});
	});
	*/
}

$(document).ready(function(){
	signinForm = new SigninForm();
});
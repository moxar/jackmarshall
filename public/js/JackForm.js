function JackForm(selector)
{
	var self = this;
	var node = $(selector);
	
	self.check = function(messageBag) {
		
		var success = true;
		
		node.find('input').each(function() {
			
			var input = $(this);
			if(typeof(messageBag[input.attr("name")]) == "undefined")
			{
				input.parent().removeClass("has-error").addClass("has-success");
				input.parent().find('span').removeClass("glyphicon-remove").addClass("glyphicon-ok")
					.off("click");
				input.parent().find('p').hide().text("");
			}
			else
			{
				input.parent().removeClass("has-success").addClass("has-error");
				input.parent().find('span').removeClass("glyphicon-ok").addClass("glyphicon-remove")
					.click(function(){
						$(this).parent().find('input').val('');
					});
				input.parent().find('p').show().text(messageBag[input.attr("name")]);
				success = false;
			}
		});
		
		if(success)
			node.find('input[type=submit]').removeAttr('disabled');
		else
			node.find('input[type=submit]').attr('disabled', 'disabled');
	};
}
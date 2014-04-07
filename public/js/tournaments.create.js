$(document).ready(function(){
	tournamentCreateForm = new TournamentCreateForm("#tournamentCreateForm");
	tournamentCreateForm.test();
});

function TournamentCreateForm(selector) {
	
	JackForm.apply(this, arguments);
	var self = this;
	var node = $(selector);
	var it = 0;
	
	self.test = function() {
		
		console.log("TournamentCreateForm test");
	}
	
	self.addPlayer = function() {
		
		var fieldsets = node.find('fieldset');
		
		fieldsets.eq(2).find('div:eq(1)').append($('<p/>')
			.attr({
				'class': 'active'
			})
			.text(fieldsets.eq(1).find('input[type=text]:eq(1)').val())
			.append($('<input/>')
				.attr({
					'type': 'hidden',
					'name': 'newPlayers['+ it +']',
					'value': fieldsets.eq(1).find('input[type=text]:eq(1)').val(),
					'data-id': it
				})
			 )
		);
		
		fieldsets.eq(1).find('input[type=text]:eq(1)').val('');
		it++;
	};
	
 	$(document).on('click', '#tournamentCreateForm fieldset:eq(2) div p', function() {
		
		console.log("test");
		var input = $(this).find('input');
		var regExp = new RegExp("newPlayer");
		
		if(regExp.test(input.attr("name")))
		{
			$(this).remove();
		}
		else
		{
			if($(this).hasClass('active'))
			{
				input.attr('value', 'inactive');
			}
			else
			{
				input.attr('value', 'active');
			}
			$(this).toggleClass('active inactive');
		}
	})
	
	$('#addPlayerButton').click(function(){
		
		if(node.find('fieldset:eq(1) input[type=text]:eq(1)').val() != '')
		{
			console.log(node.find('fieldset:eq(1) input[type=text]:eq(1)').val());
			self.addPlayer();
		}
	});
}

TournamentCreateForm.prototype = new JackForm();
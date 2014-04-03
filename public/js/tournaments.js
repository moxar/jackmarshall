$(document).ready(function(){
	tournamentCreateForm = new TournamentCreateForm("#tournamentCreateForm");
	tournamentCreateForm.test();
});

function TournamentCreateForm() {
	
	JackForm.apply(this, arguments);
	var self = this;
	var node = $('#tournamentCreateForm');
	var it = 0;
	
	self.test = function() {
		
		console.log("TournamentCreateForm test");
	}
	
	self.addPlayer = function() {
		
		var fieldset = $('#tournamentCreateForm fieldset:eq(1)');
			
 		fieldset.append($('<input/>')
 			.attr({
 				'type': 'hidden',
 				'name': 'newPlayers['+ it +']',
 				'value': fieldset.find('input[type=text]:eq(0)').val(),
				'data-id': it
 			})
		);
		
		fieldset.append($('<p/>')
			.attr({
				'data-id': it,
				'class': 'active'
			})
			.text(fieldset.find('input[type=text]:eq(0)').val())
		);
		
		fieldset.find('input[type=text]').val('');
		it++;
	};
	
 	$(document).on('click', '#tournamentCreateForm fieldset:eq(1) > p[data-id]', function() {
		
		var id = $(this).attr('data-id');
		var input = $(this).parent().find('input[data-id=' + id + ']');
		var regExp = new RegExp("newPlayer");
		if(regExp.test(input.attr("name")))
		{
			input.remove();
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
		
		if($('#tournamentCreateForm fieldset:eq(1)').find('input[type=text]').val() != '')
		{
			self.addPlayer();
		}
	});
}

TournamentCreateForm.prototype = new JackForm();
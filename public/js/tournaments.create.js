$(document).ready(function(){
	tournamentCreateForm = new TournamentCreateForm("#tournamentCreateForm");
});

function TournamentCreateForm(selector) {
	
	var self = this;
	var node = $(selector);
	var it = 0;
	
	self.addPlayer = function() {
		var name = $('#addPlayerText').val();
		var player = $('<p/>');
		player.addClass('checker active newPlayer');
		player.append($('<span/>').text(name));
		player.append($('<input/>').attr({
			'type': 'hidden',
			'name': 'newPlayer[' + it + ']',
			'value': name
		}));
		$('#newPlayersFieldset').append(player);
	};
	
	self.togglePlayerStatus = function() {
		var checker = $(this);
		checker.toggleClass('active inactive');
		var input = checker.find('input[type=hidden]');
		input.val(input.val() == "active" ? "inactive" : "active");
	};
	
	self.removePlayer = function() {
		$(this).remove();
	};
	
	$('#addPlayerButton').click(function() {
		self.addPlayer();
	});
	
	$(document).on('click', 'p.registeredPlayer', function() {
		self.togglePlayerStatus();
	});
	
	$(document).on('click', 'p.newPlayer', function() {
		self.removePlayer();
	});
}
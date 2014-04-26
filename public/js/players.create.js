$(document).ready(function(){
	tournamentCreateForm = new TournamentCreateForm("#tournamentCreateForm");
});

function TournamentCreateForm(selector) {
	
	var self = this;
	var node = $(selector);
	var it = 0;
	
	self.addPlayer = function() {
		var name = $('#addPlayerText').val();
		var player = $('<section/>');
		player.addClass('checker active newPlayer cell');
		player.append($('<span/>').text(name));
		player.append($('<input/>').attr({
			'type': 'hidden',
			'name': 'newPlayers[' + it + ']',
			'value': name
		}));
		$('#newPlayersFieldset').append(player);
		$('#addPlayerText').val('');
		it++;
	};
	
	self.togglePlayerStatus = function(node) {
		var checker = node;
		checker.toggleClass('active inactive');
		var input = checker.find('input[type=hidden]');
		if (input.attr('disabled')) input.removeAttr('disabled');
		else input.attr('disabled', 'disabled');
	};
	
	self.removePlayer = function(node) {
		node.remove();
	};
	
	$('#addPlayerButton').click(function() {
		self.addPlayer();
	});
	
	$(document).on('click', 'section.registeredPlayer', function() {
		self.togglePlayerStatus($(this));
	});
	
	$(document).on('click', 'section.newPlayer', function() {
		self.removePlayer($(this));
	});
}
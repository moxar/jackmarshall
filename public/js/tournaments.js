$(document).ready(function(){
	tournamentCreateForm = new TournamentCreateForm("#tournamentCreateForm");
	tournamentCreateForm.test();
});

function TournamentCreateForm() {
	
	JackForm.apply(this, arguments);
	var self = this;
	
	self.test = function() {
		
		console.log("TournamentCreateForm test");
	}
}

TournamentCreateForm.prototype = new JackForm();
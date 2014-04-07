$(document).ready(function(){
	tournamentManageForm = new TournamentManageForm("#tournamentManageForm");
	TournamentManageForm.test();
});

function TournamentManageForm(selector) {
	
	JackForm.apply(this, arguments);
	var self = this;
	var node = $(selector);
	var it = 0;
	
	self.publishReport = function() {
		
		var report1 = $('fieldset[data-player=1]');
		var report2 = $('fieldset[data-player=2]');
		
		var error = false;
		report1.find('input').each(function(){
			
			if($(this).val() == '') error = true; return;
		});
		report2.find('input').each(function(){
			
			if($(this).val() == '') error = true; return;
		});
		/*
		var data = {};
		data.tournament = tournament;
		data.
		
		if(!error)
		{
			$.post("Reports/add", data, success);
		}
		*/
	}
	
	self.test = function() {
		
		console.log("TournamentManageForm test");
	}
}

TournamentManageForm.prototype = new JackForm();
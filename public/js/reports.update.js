$(document).ready(function(){
	reportsUpdater = new ReportsUpdater('#reportsUpdater');
});

function ReportsUpdater(selector) {

	var self = this;
	var node = $(selector);
	
	self.updateReport = function(node) {
	
		var score = node.attr('data-score');
		var data = {};
		switch(score) {
			case 'victory':
				data = {'victory': node.val()}; break;
			case 'control':
				data = {'control': node.val()}; break;
			case 'destruction':
				data = {'destruction': node.val()}; break;
		}
		console.log(data);
		$.post('reports/' + node.attr('data-id') + '/update' , data, function(response){
			var prev = $('#rankingSection').prev()
			$('#rankingSection').remove();
			prev.after(response);
		});
	}
	
	$(document).on('blur', '.scoreInput', function() {
		self.updateReport($(this));
	});
}
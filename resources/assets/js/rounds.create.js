$(document).ready(function(){
    var playerPool = new PlayerPool('#playerPool');
});
function PlayerPool(selector) {
    
    // VARS
    var self = this;
	var node = $(selector);
	var cells = node.find('.row + .row .cell + .cell');
	var originalOrder;
	
	construct: {
		originalOrder = [];
		cells.each(function(){
			originalOrder.push({
				'name': $(this).find('span').text(),
				'id': $(this).find('input').val()
			});
		});
	}
	
	self.shuffle = function() {
		var players = [];
		cells.each(function(){
			players.push({
				'name': $(this).find('span').text(),
				'id': $(this).find('input').val()
			});
		});
		players.shuffle();
		for(pt = 0; pt < players.length; pt++) {
			cells.eq(pt).find('span').text(players[pt].name);
			cells.eq(pt).find('input').val(players[pt].id);
		}
	};
	
	self.order = function() {
		for(pt = 0; pt < originalOrder.length; pt++) {
			cells.eq(pt).find('span').text(originalOrder[pt].name);
			cells.eq(pt).find('input').val(originalOrder[pt].id);
		}
	}
	
	node.css({
		'width': cells.outerWidth(true) * node.children().first().children().length
	});
	
	cells.draggable({
		helper: 'clone',
		containment: node
	});
	
	cells.droppable({
		accept: '.cell',
		drop: function(event, ui){
			var newCell = ui.draggable;
			var oldCell = $(this);
			var swap = newCell.clone();
			newCell.find('span').text(oldCell.find('span').text());
			newCell.find('input[type=hidden]').attr({
				'value': oldCell.find('input[type=hidden]').val()
			})
			oldCell.find('span').text(swap.find('span').text());
			oldCell.find('input[type=hidden]').attr({
				'value': swap.find('input[type=hidden]').val()
			})
		},
		hoverClass: 'active'
	});
	
	$('#shuffleButton').click(function(){
		self.shuffle();
	});
	
	$('#orderButton').click(function(){
		self.order();
	});
    
};
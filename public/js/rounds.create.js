$(document).ready(function(){
    var playerPool = new PlayerPool('#playerPool');
});
function PlayerPool(selector) {
    
    // VARS
    var self = this;
	var node = $(selector);
	var cells = node.find('.row + .row .cell + .cell');
	
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
	})
    
};
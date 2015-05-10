$(function() {	
	
		/*
		 * Shuffles the player order in round
		 */
		$(document).on('click', '.btn-shuffle', function() {
				var cells = $('.round-create .players-pool .cell:not(.th)');
				var players = [];
				cells.each(function(){
						players.push({
								id: 		$(this).attr('data-id'),
								name: 		$(this).attr('data-name'),
								opponents:	$(this).attr('data-opponents')
						});
				});
				players.shuffle();
				$.each(players, function(k, p) {
						cells.eq(k).attr('data-id', p.id).attr('data-name', p.name).attr('data-opponents', p.opponents);
						cells.eq(k).find('span').text(p.name);
						cells.eq(k).find('input').val(p.id);
				});
				
				$(this).parents('form').find('.players-pool').trigger('status.check');
		});
		
		/*
		 * Checks each player has never confronted his new opponent
		 */
		$(document).on('status.check', '.players-pool', function() {
				var rows = $(this).find('.row:not(:first-child)');
				rows.each(function() {
						var cells = $(this).find('.cell:not(:first-child)');
						var id = cells.eq(0).attr('data-id');
						var opponents = cells.eq(1).attr('data-opponents').split(',');
						cells.removeClass("alert-danger");
						if($.inArray(id, opponents) != -1) {
								cells.addClass("alert-danger");
						}
				});
		});
		
		$(document).on('order', '.players-pool', function() {
				order();
		});
		
		/*
		 * Makes players drag & dropable
		 */
		$('.round-create .players-pool .cell:not(.th)').draggable({
			helper: function() {
				return $(this).clone().removeClass("alert-danger").addClass("clone");
			},
			containment: $('.round-create .players-pool'),
		});
		
		$('.round-create .players-pool .cell:not(.th)').droppable({
			accept: '.cell:not(.th)',
			drop: function(event, ui){
				swap(ui.draggable, $(this));
				$(this).trigger('status.check');
			},
			hoverClass: 'reciever'
		});
		
		/*
		 * Checks validity on page load
		 */
		$(document).find('.players-pool .row:not(:first-child)').trigger('status.check');
});
		
function swap(newCell, oldCell) {
		
		var s = newCell.clone();
		newCell.find('span').text(oldCell.attr('data-name'));
		newCell.find('input[type=hidden]').attr('value', oldCell.attr('data-id'));
		newCell.attr({
			'data-id': oldCell.attr('data-id'),
			'data-name': oldCell.attr('data-name'),
			'data-opponents': oldCell.attr('data-opponents'),
		});
		
		oldCell.find('span').text(s.attr('data-name'));
		oldCell.find('input[type=hidden]').attr('value', s.attr('data-id'));
		oldCell.attr({
			'data-id': s.attr('data-id'),
			'data-name': s.attr('data-name'),
			'data-opponents': s.attr('data-opponents'),
		});
}

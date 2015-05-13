$(function() {	
	
		$('[data-toggle="tooltip"]').tooltip();
	
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
				
				$(this).trigger('maps.check');
		});
		
		/*
		 * Reorganize the maps to avoid players using the same twice
		 */
		$(document).on('maps.check', '.players-pool', function() {
				var availables = [];
				var tables = [];
				
				$(this).find('.cell').removeClass('alert-warning');
				$(this).find('.row:not(:first-child) .cell:first-child').each(function() {
						var id = $(this).attr('data-id');
						var name = $(this).attr('data-name');
						availables.push(id);
						tables[id] = name;
						$(this).data('asigned', false);
				});
				
				while(availables.length != 0) {
					
						// retrieve each unasigned map
						var lines = $(this).find('.row:not(:first-child) .cell:first-child').filter(function() {
								return typeof($(this).data('asigned')) == "undefined" || !$(this).data('asigned');
						});
						
						var asigned = false;
						
						// for each line, retrieve the potentials maps
						// allocate table if only one option is available 
						lines.each(function() {
								var maps = [];
								$(this).siblings('.cell:not(:first-child)').each(function() {
										maps = maps.concat($(this).attr('data-maps').split(','));
								});
								var potentials = $(availables).not(maps);
								
								if(potentials.length == 1) {
										var id = potentials[0];
										var name = tables[id];
										
										$(this).attr({
												'data-id': id,
												'data-name': name,
										});
										$(this).find('span:first-child').text(name);
										$(this).find('input[type=hidden]').val(id);
										availables.splice(availables.indexOf(id), 1);
										
										asigned = true;
										$(this).data('asigned', true);
										return false;
								}
						});
						if(asigned) {
								continue;
						}
						
						
						// allocate table if many option are available 
						lines.each(function() {
								var maps = [];
								$(this).siblings('.cell:not(:first-child)').each(function() {
										maps = maps.concat($(this).attr('data-maps').split(','));
								});
								var potentials = $(availables).not(maps).get();
								
								if(potentials.length > 1) {
										var id = potentials[0];
										var name = tables[id];
										
										$(this).attr({
												'data-id': id,
												'data-name': name,
										});
										$(this).find('span:first-child').text(name);
										$(this).find('input[type=hidden]').val(id);
										availables.splice(availables.indexOf(id), 1);
										
										asigned = true;
										$(this).data('asigned', true);
										return false;	
								}
						});
						if(asigned) {
								continue;
						}
						
						// allocate table if no option is available 
						lines.each(function() {
								var maps = [];
								$(this).siblings('.cell:not(:first-child)').each(function() {
										maps = maps.concat($(this).attr('data-maps').split(','));
								});
								
								var id = availables[0];
								var name = tables[id];
										
								$(this).attr({
										'data-id': id,
										'data-name': name,
								});
								$(this).find('span:first-child').text(name);
								$(this).find('input[type=hidden]').val(id);
								$(this).addClass('alert-warning');
								availables.splice(availables.indexOf(id), 1);
								
								$(this).siblings('.cell:not(:first-child)').filter(function() {
										return $.inArray(id, $(this).attr('data-maps').split(',')) != -1;
								}).addClass('alert-warning');
								
								asigned = true;
								$(this).data('asigned', true);
								return false;
						});
						if(asigned) {
								continue;
						}
				}
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
		$(document).find('.players-pool').trigger('status.check');
});
		
function swap(newCell, oldCell) {
		
		var s = newCell.clone();
		newCell.find('span:first-child').text(oldCell.attr('data-name'));
		newCell.find('input[type=hidden]').attr('value', oldCell.attr('data-id'));
		newCell.attr({
			'data-id': oldCell.attr('data-id'),
			'data-name': oldCell.attr('data-name'),
			'data-opponents': oldCell.attr('data-opponents'),
			'data-maps': oldCell.attr('data-maps'),
		});
		
		oldCell.find('span:first-child').text(s.attr('data-name'));
		oldCell.find('input[type=hidden]').attr('value', s.attr('data-id'));
		oldCell.attr({
			'data-id': s.attr('data-id'),
			'data-name': s.attr('data-name'),
			'data-opponents': s.attr('data-opponents'),
			'data-maps': s.attr('data-maps'),
		});
}

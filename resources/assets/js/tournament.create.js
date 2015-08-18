$(function() {
	
	var SCENARII_PER_MAP = 2;
	
	/*
	 * Filters the player list when typing a name into the input text
	 */
	$(document).on('keyup', '.group-add-player input[type=text]', function() {
			var val = $(this).val();
			var view = $(this).parents('form').find('.players-pool');
			$.get('tournaments/create', {term: val}, function(response) {
						view.empty().append($(response).find('.players-pool').children());
			});
	});
	

	/*
	 * Adds a player to the registered list and resets the filter
	 * when clicking the button "add player"
	 */
	$(document).on('click', '.group-add-player .btn', function() {
			var input = $(this).parents('.input-group').find('input[type=text]');
			var name = input.val();
			input.val('');
			var view = $(this).parents('form').find('.players-pool');
			$.get('tournaments/create', {}, function(response) {
						view.empty().append($(response).find('.players-pool').children());
			});
			var p = {
				name: name,
			};
			$(document).find('.players-registered').trigger('player.add', {player: p});
	});
	
	/*
	 * Removes a player from the registered list when clicking the remove btn
	 */
	$(document).on('click', '.players-registered .btn-remove', function() {
			var pool = $(this).parents('.players-registered');
			$(this).parents('li').remove();
			$('.players-registered h4 span').text("(" + pool.find('ul li').length + ")");
	});
	
	/*
	 * Adds a player to the registered list when clicking the add btn
	 */
	$(document).on('click', '.players-pool .btn-add-player', function() {
			var p = {
				id: $(this).parents('li').data('id'),
				name: $(this).parents('li').data('name'),
			};
			
			$(document).find('.players-registered').trigger('player.add', {player: p});
	});
	
	/*
	 * Adds a player to the registered list when event is triggered
	 * the new list is sorted alphabeticaly
	 */
	$(document).on('player.add', '.players-registered', function(e, data) {
			var buffer = [];
			var names = [];
			var p = data.player;
			
			buffer.push(p);
			names.push(p.name);
			
			$('.players-registered ul li').each(function() {
					var p = {
						id: $(this).data('id'),
						name: $(this).data('name'),
					};
					if ($.inArray(p.name, names) == -1) {
						buffer.push(p);
						names.push(p.name);
					}
			});
			
			names.sort();
			
			var players = [];
			$.each(names, function(i, name) {
					$.each(buffer, function(k, p) {
							if(p.name == name) {
									players.push(p);
							}
					});
			});
			
			$('.players-registered h4 span').text("(" + names.length + ")");
			$('.players-registered ul').empty();
			$.each(players, function(k, p) {
					var input = $('.players-registered').find('.template .player').clone();
					input.data('name', p.name);
					input.data('id', p.id);
					input.find('span').text(p.name);
					if(typeof(p.id) == "undefined") {
						input.find('input[type=hidden]').attr('name', 'players[names][' + p.name + ']').val(true);
					}
					else {
						input.find('input[type=hidden]').attr('name', 'players[ids][' + p.id + ']').val(true);
					}
					$('.players-registered ul').append(input);
			});
	});
	
	/*
	 * Makes the scenarii draggable
	 */
	$('.scenario').draggable({
		helper: "clone"
	});
	
	
	/*
	 * Makes the maps droppable: the droppables are the scenarii
	 * Triggers the map.scenarii-changed after drop
	 * Also locks the form
	 */
	$('.map').droppable({
		accept: '.scenario',
		hoverClass: 'reciever',
		drop: function(event, ui) {
			
			// checks the number of scenarii already selected
			if($(this).find('li.scenario').length >= SCENARII_PER_MAP) {
				return;
			}		
			
			// checks the unicity of the scenario
			var duplicates = $(this).find('li.scenario').filter(function() {
				return $(this).data('id') == ui.draggable.data('id');
			});
			if(duplicates.length != 0) {
				return;
			}
			
			// appends the node and triggers the event
			$(this).find('ul').append(ui.draggable.clone());
			$(this).parents('form').find('input[type=submit]').addClass('disabled');
			$(this).trigger('map.scenarii-changed');
		}
	});
	
	/*
	 * Removes the scenario from the map
	 * Triggers the map.scenarii-changed
	 * Also locks the form
	 */
	$(document).on('click', '.map .scenario .btn-remove', function() {
		var map = $(this).parents('.map');
		$(this).parent('li').remove();
		map.parents('form').find('input[type=submit]').addClass('disabled');
		map.trigger('map.scenarii-changed');
	});
	
	/*
	 * Changes the value of the map's scenario input regarding the
	 * remaining scenarii belonging the the map
	 * Also unlocks the form
	 */
	$(document).on('map.scenarii-changed', '.map', function() {
		var val = [];
		var map = $(this);
		map.find('li.scenario').each(function(it) {
			val[it] = $(this).data('id');
		});
		map.find('input[type=hidden]').val(val);
		map.parents('form').find('input[type=submit]').removeClass('disabled');
	});
	
	/*
	 * Checks the status of the form before submit
	 */
	$('form').on('submit', function(e) {
		if($(this).find('input[type=submit]').hasClass('disabled')) {
			return false;
		}
	});
});
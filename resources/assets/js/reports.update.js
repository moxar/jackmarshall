$(function() {
		/*
		* Saves the reports on click
		*/
		$(document).on('click', '.reports-update .btn-save', function() {
				var reports = [];
				
				console.log($(this).parents('.reports-update').find('input[type=text][value=""]').length);
				
				$(this).parents('.reports-update').find('tbody tr').each(function() {
						reports.push({
							report: $(this).find('[name=report]').first().val(),
							victory: $(this).find('[name=victory]').first().val(),
							control: $(this).find('[name=control]').first().val(),
							destruction: $(this).find('[name=destruction]').first().val(),
						});
						reports.push({
							report: $(this).find('[name=report]').last().val(),
							victory: $(this).find('[name=victory]').last().val(),
							control: $(this).find('[name=control]').last().val(),
							destruction: $(this).find('[name=destruction]').last().val(),
						});
				});
				var tournament = $(this).parents('.reports-update').find('[name=tournament]').val();
				
				var spinner = $(this).parents('.reports-update').find('.fa-spinner');
				spinner.addClass('fa-spin');
				$.post('reports/update' , {
					reports: reports,
					tournament: tournament,
				}, function(response){
					$('#rankingSection').empty().append($(response).children());
					$(document).find('.reports-update table tfoot a').removeClass('disabled');
				}).always(function() {
					spinner.removeClass('fa-spin');
				});
		});

		/*
		* prevents from creating a new round while the reports are not saved
		*/
		$(document).on('click', '.reports-update a.disabled', function(e) {
					e.preventDefault();
		});
		
		/*
		 * checks the new score value on blur
		 */
		$(document).on('blur', '.reports-update .score', function() {
				$(this).trigger('score.check');
		});

		/*
		* prevents from saving the reports while all are not filled
		*/
		$(document).on('score.check', '.reports-update', function() {
			
			var scores = $(this).find('.score').removeClass('empty').filter(function() {
					return $(this).val() == '';
			}).addClass('empty');
			if(scores.length != 0) {
					$(this).find('.btn-save').addClass('disabled');
			}
			else {
					$(this).find('.btn-save').removeClass('disabled');
			}
		});
		
		/*
		 * triggers the report check event on document load
		 */
		$(document).find('.reports-update').trigger('score.check');
});
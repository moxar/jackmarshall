(function($) {
	
	$.fn.validator=function(url, callback) {
		   
		return this.each(function() {
			
			var self = this;
			var inputs = $(this).find('input');
			
			self.attempt = function(){
				
				var fields = [];
				inputs.each(function(){
					
					fields.push({
						"name": $(this).attr('name'),
						"value": $(this).val()
					});
				});
				
				$.getJSON(url, fields, function(response){
					
					callback(response);
				});
			};
			
			inputs.change(self.attempt);
			self.attempt();
       });
    };
})(jQuery);
(function($) {
	$.fn.parttable = function(options) {
		return this.each(function() {
			var $table = $(this);
			options = options || {};
			options = $.extend({}, $.fn.parttable.defaults, options);

			options.size = $table.attr("data-size") || options.size;

			var current = 1;
			var $current = $table.find("tfoot ul.pagination li:nth-child(2)");
			var $previous = $table.find("tfoot ul.pagination li:first-child");
			var $next = $table.find("tfoot ul.pagination li:last-child");
			var max = $table.find("tfoot ul.pagination li").length - 2;

			function refresh() {
				$current.siblings().removeClass("active");
				$current.addClass("active");

				if(current == 1) {
					$previous.addClass("disabled");
				} else {
					$previous.removeClass("disabled");
				}

				if(current == max) {
					$next.addClass("disabled");
				} else {
					$next.removeClass("disabled");
				}

				$table.find("tbody tr").css("display", "none");
				$table.find("tbody tr").slice((current - 1) * options.size, current * options.size).css("display", "table-row");
			}

			$table.on("click", "tfoot ul.pagination a", function(event) {
				$clicked = $(this).parent();

				var text = $(this).text();
				if(text == "«") {
					current--;
					$current = $current.prev();
				} else if(text == "»") {
					current++;
					$current = $current.next();
				} else {
					$current = $clicked;
					current = text;
				}

				refresh();

				event.preventDefault();
				return false;
			});

			refresh();
			$table.on("aftertablesort", function() {
				refresh();
			});
		});
	};

	$.fn.parttable.defaults = {
		size: 10
	};
})(jQuery);

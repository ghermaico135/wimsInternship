$(document).ready(function() {

	if (!$("ul li.column-filter").length) return;
	if (!window.localStorage) return;

	var storage = window.localStorage;

	$("ul li.column-filter").each(function(i) {
		
		var key = "Human-" + 
			window.location.search.split("&")[0].split("=")[1] +
			i;
		var filter = $(this);
		var table = filter.parents(".x_panel").find(".x_content table:first-child");

		var menu = $(this).find("ul.dropdown-menu");
		menu.html("");

		if (storage[key]) {
			
			var filters = JSON.parse(storage.getItem(key));
			filters.forEach(function(e, index) {

				if (!filters[index].hidden)
					menu.append('<li><a href="#" i="'+ index +'">'+
						'<i class="fa '+ 
						(e.selected?'fa-chevron-left':'fa-circle') +'"></i>'+ 
						e.name +'</a></li>');

				if (!filters[index].selected) {
					table.find("thead tr th").eq(parseInt(index)+1).addClass("hide");
					table.find("tbody tr").each(function() {
						$(this).find("td").eq(parseInt(index)+1).addClass("hide");
					});
				} else {
					table.find("thead tr th").eq(parseInt(index)+1).removeClass("hide");
					table.find("tbody tr").each(function() {
						$(this).find("td").eq(parseInt(index)+1).removeClass("hide");
					});
				}

			});

			/* SET LISTENER FOR CLICK EVENT */
			menu.find("li a").unbind('click').on('click', function(e) {
				e.stopPropagation();
				
				var index = $(this).attr("i");
				filters[index].selected = !filters[index].selected;
				storage.setItem(key, JSON.stringify(filters));

				$(this).find("i").removeClass('fa-chevron-left fa-circle');
				$(this).find("i").addClass(filters[index].selected?'fa-chevron-left':'fa-circle');

				if (!filters[index].selected) {
					table.find("thead tr th").eq(parseInt(index)+1).addClass("hide");
					table.find("tbody tr").each(function() {
						$(this).find("td").eq(parseInt(index)+1).addClass("hide");
					});
				} else {
					table.find("thead tr th").eq(parseInt(index)+1).removeClass("hide");
					table.find("tbody tr").each(function() {
						$(this).find("td").eq(parseInt(index)+1).removeClass("hide");
					});
				}

			});

			return;
		}
		
		/* LOOP THROUGH the respective table's ths */
		/* STORE initial values for the ths in storage */
		var filters = [];
		$(this).parents(".x_panel").find(".x_content table:first-child thead > tr > th:not(:first-child)")
		.each(function() {
			filters.push({
				name: $(this).text(),
				selected: true,
				hidden: $(this).hasClass("hide")
			});
		});

		storage.setItem(key, JSON.stringify(filters));

		filters.forEach(function(e, index) {

			if (!filters[index].hidden)
				menu.append('<li><a href="#" i="'+ index +'">'+
					'<i class="fa '+ 
					(e.selected?'fa-chevron-left':'fa-circle') +'"></i>'+ 
					e.name +'</a></li>');

			if (!filters[index].selected) {
				table.find("thead tr th").eq(parseInt(index)+1).addClass("hide");
				table.find("tbody tr").each(function() {
					$(this).find("td").eq(parseInt(index)+1).addClass("hide");
				});
			} else {
				table.find("thead tr th").eq(parseInt(index)+1).removeClass("hide");
				table.find("tbody tr").each(function() {
					$(this).find("td").eq(parseInt(index)+1).removeClass("hide");
				});
			}

		});

		/* SET LISTENER FOR CLICK EVENT */
		menu.find("li a").unbind('click').on('click', function(e) {
			e.stopPropagation();
			
			var index = $(this).attr("i");
			filters[index].selected = !filters[index].selected;
			storage.setItem(key, JSON.stringify(filters));

			$(this).find("i").removeClass('fa-chevron-left fa-circle');
			$(this).find("i").addClass(filters[index].selected?'fa-chevron-left':'fa-circle');

			if (!filters[index].selected) {
				table.find("thead tr th").eq(parseInt(index)+1).addClass("hide");
				table.find("tbody tr").each(function() {
					$(this).find("td").eq(parseInt(index)+1).addClass("hide");
				});
			} else {
				table.find("thead tr th").eq(parseInt(index)+1).removeClass("hide");
				table.find("tbody tr").each(function() {
					$(this).find("td").eq(parseInt(index)+1).removeClass("hide");
				});
			}

		});

	});

});
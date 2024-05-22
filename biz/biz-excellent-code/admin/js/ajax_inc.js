
Event.observe($("pref"), "change", function(){
	set_select($("city"), city_list[$("pref").value], $("city_value").value);
}, true);

set_select($("city"), city_list[$("pref").value], $("city_value").value);

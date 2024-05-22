// マップ
var map;
var marker;

function do_map(mapID, ctrlSize, CenterLon, CenterLat, zoom, maptype)
{
	var point;
	var map;

	zoom = parseFloat(zoom);

	map = new GMap2(document.getElementById(mapID));
	if (maptype) {
		map.addControl(new GMapTypeControl());
	}
	if (ctrlSize == "L") {
		map.addControl(new GLargeMapControl());
	} else {
		map.addControl(new GSmallMapControl());
	}
//	GEvent.addListener(map, "click", get_address);
	// 中心位置と倍率
	if (CenterLon && CenterLat) {
		point = new GLatLng(parseFloat(CenterLat), parseFloat(CenterLon));
	} else {
		if (default_lat != "undefined") {
			point = new GLatLng(default_lat, default_lon);
		} else {
			point = new GLatLng(35.9, 139.7);
		}
	}
	if (!zoom) {
		zoom = 8;
	}
	map.setCenter(point, zoom);

	map.clearOverlays();
	marker = new GMarker(point, {draggable: true});
	map.addOverlay(marker);

	return map;
}

function setGeo()
{
	// マーカーの位置を得る
	var point;
	point = marker.getPoint();
	if (point) {
		$("map_lat").value = point.lat();
		$("map_lon").value = point.lng();
		$("map_zoom").value = map.getZoom();
	}
/*
	// マップの中央を得る
	var latlng = map.getCenter();
	if (latlng) {
		$("map_lat").value = latlng.lat();
		$("map_lon").value = latlng.lng();
		$("map_zoom").value = map.getZoom();

		map.clearOverlays();
		var marker = new GMarker(latlng);
		map.addOverlay(marker);
	}
*/
}

function geoMove(latlng)
{
	if (latlng) {
		map.clearOverlays();
		map.setCenter(latlng, map.getZoom());
		marker = new GMarker(latlng, {draggable: true});
		map.addOverlay(marker);
		marker.openInfoWindowHtml(key);
		//
		setGeo();
	} else {
		alert("該当する場所はありませんでした。");
	}
}
function do_move(map, place)
{
alert(place);
	var ary = place.split(" ");
	if (ary.length > 0) {
		place = ary[0];
	}
	gGeo = new GClientGeocoder();
	gGeo.getLatLng(place, function(point) {
		if (point) {
			map.clearOverlays();
			map.setCenter(point, map.getZoom());
			marker = new GMarker(point, {draggable: true});
			map.addOverlay(marker);
		}
	});
}

map = do_map('map', 'S', $("map_lon").value, $("map_lat").value, $("map_zoom").value, 1);

Event.observe($("map_btn"), "click", function(){
	setGeo();
}, true);

// 住所から地図移動
Event.observe($("address_btn"), "click", function(){
	do_move(map, pref_list[$("pref").value] + $("city").value + $("address").value);
}, true);

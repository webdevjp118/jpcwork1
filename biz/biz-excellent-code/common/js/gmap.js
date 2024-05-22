let g_map = null;
let g_myLocationMarker = null;
let g_myLocation = null;

let g_markers = [];
let g_places = [];

let g_infoWnd = null;
let mstPrefectures = {};
let mstSyokusyu = {};
let mstKoyou = {};

jQuery(document).ready(function () {

    $("#btn-my-location").on('click', function(e) {
        e && e.stopPropagation();
        moveToMyLocation();
        return false;
    });

    $("[data-remodal-target='modal_neighborhood']").on('click', function() {
        moveToMyLocation();
    });

    $("#btn-search-nearby").on('click', function(e) {
        e && e.stopPropagation();
        if (g_myLocation == null) {
            alert('先に現在地の情報を取得してください。');
            return false;
        }
        location.href=g_topURL + 's/coord/' + g_myLocation.lat + '/' + g_myLocation.lng + '/';
        return false;
    });
});

// 地図の初期化、表示
function initMap() {
    // Create the Google Map…
    g_map = new google.maps.Map(document.getElementById("map"), {
        zoom: 12,
        minZoom: 11,
        center: new google.maps.LatLng(35.19, 136.9),
        zoomControlOptions: {
            position: google.maps.ControlPosition.LEFT_CENTER,
        },
        streetViewControlOptions: {
            position: google.maps.ControlPosition.LEFT_BOTTOM,
        }
    });

    g_infoWnd = new google.maps.InfoWindow();
}

// 現在地に移動する
function moveToMyLocation() {

    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                g_myLocation = {
                    //lat: 35.18475, lng: 136.899688
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                g_map && g_map.setCenter(g_myLocation);

                // 現在地をMarkerで表示する
                if (g_map && g_myLocationMarker == null) {
                    const svgMarker = {
                        path: "M172.3,501.7C27,291,0,269.4,0,192C0,86,86,0,192,0s192,86,192,192c0,77.4-27,99-172.3,309.7 C202.2,515.4,181.8,515.4,172.3,501.7L172.3,501.7z M192,272c44.2,0,80-35.8,80-80s-35.8-80-80-80s-80,35.8-80,80S147.8,272,192,272 z",
                        fillColor: "pink",
                        fillOpacity: 0.8,
                        strokeWeight: 0,
                        rotation: 0,
                        scale: 0.07,
                        anchor: new google.maps.Point(196, 480),
                    };

                    g_myLocationMarker = new google.maps.Marker({
                        position: g_map.getCenter(),
                        map: g_map,
                        icon: svgMarker,
                        title: "現在地"
                    });

                    searchNearBy(g_myLocation.lat, g_myLocation.lng);
                }
            },
            () => {
                alert('現在地の取得が失敗しました。');
            }
        );
    } else {
        // Browser doesn't support Geolocation
        alert("現在地の取得が失敗しました。\n最新ブラウザをご利用ください。");
    }
}

/**
 * 現在地付近の求人を地図に表示する
 * @param lat
 * @param lng
 */
function searchNearBy(lat, lng) {
    $.ajax({
        method: "post",
        url: g_topURL + '?act=nearby',
        dataType: 'json',
        data: {
            'lat': lat,
            'lng': lng
        },
        success: function(data) {
            g_places = data.items.data;
            mstPrefectures = data.prefectures;
            mstSyokusyu = data.syokusyu;
            mstKoyou = data.koyou;
            displayMarkers(g_places);
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log('付近の求人を検索中にエラーが発生しました。');
        }
    });
}

/**
 * Markerをクリックした時に表示される窓のコンテンツを構成する
 *
 * @param pInfo
 * @returns {string}
 */
function buildInfoWindow(pInfo) {
    let i, syokusyuNames = '';
    let koyouNames = '';
    for (i in pInfo.syokusyu) {
        syokusyuNames = (syokusyuNames.length > 0 ? '、' : '') + mstSyokusyu[pInfo.syokusyu[i]];
    }
    for (i in pInfo.koyou) {
        koyouNames = (koyouNames.length > 0 ? '、' : '') + mstKoyou[pInfo.koyou[i]];
    }
    let c = '<table class="tbl-place-info" cellspacing="1" cellpadding="3">';
    c += '<tr><td colspan="3" class="title_f"><a href="' + g_topURL + 'detail/' + pInfo.item_id + '">' + pInfo.title + '</a></td></tr>';
    c += '<tr><td colspan="3" class="place_name"><span>施設名：</span>' + pInfo.text02 + "</td></tr>";
    c += '<tr><td class="cat_f" rowspan="2" style="width:80px;"><img src="' + g_topURL + 'img.php?id=' + pInfo.image + '" style="height:auto;width:90%;"></td>';
    c += '    <td class="cat_f">職種</td><td class="value_f">' + syokusyuNames + "</td></tr>";
    c += '<tr><td class="cat_f">雇用形態</td><td class="value_f">' + koyouNames + "</td></tr>";
    c += '<tr><td colspan="3" class="colorful_f">' + mstPrefectures[pInfo.kinmu_pref] + pInfo.city_name + pInfo.kinmu_address1 + pInfo.kiinmu_address2 + '</td></tr>';
    return c + "</table>";
}

// 求人（勤務地）を地図にマーカーとして表示する
function displayMarkers(places) {
    deleteMarkers();

    for (let i = 0; i < places.length; i++) {
        const marker = new google.maps.Marker({
            position: new google.maps.LatLng(parseFloat(places[i].lat), parseFloat(places[i].lon)),
            map: g_map,
            //icon: svgMarker,
            title: places[i].title
        });
        marker._idx = i;
        marker.addListener("click", () => {
            g_infoWnd.close();
            g_infoWnd.setContent(buildInfoWindow(g_places[marker._idx]));
            g_infoWnd.open(marker.getMap(), marker);
        });

        g_markers.push(marker);
    }
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    for (let i = 0; i < g_markers.length; i++) {
        g_markers[i].setMap(null);
    }
    g_markers = [];
}
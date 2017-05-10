if(document.getElementById('2gis-map')) {
	var map;
	DG.then(function () {
		map = DG.map('2gis-map', {
			center: [52.988692, 36.119842],
			zoom: 17,
			scrollWheelZoom: false,
			fullscreenControl: false
		});
		var myIcon = DG.icon({
			iconUrl: '/wp-content/themes/azbnbasetheme/img/icon/icon-map.png',//'/img/icon/icon-map.png',//
			iconRetinaUrl: '/wp-content/themes/azbnbasetheme/img/icon/icon-map.png',//'/img/icon/icon-map.png',
			iconSize: [105, 125],
			iconAnchor: [14, 125],
			popupAnchor: [0, 0]
		});
		DG.marker([52.988337, 36.119565], {icon: myIcon}).addTo(map).bindPopup('ул. Михалицына, д.1');
	});
} 
function initMap() {       
	var coordOffice = {lat: 52.967100, lng: 36.063229},
		zoom_map_office = 18,
		mapOptionsOffice = {
			zoom: zoom_map_office,
			center: new google.maps.LatLng(coordOffice.lat, coordOffice.lng),
			//scrollwheel: false,	
			/*styles: [{"elementType":"geometry","stylers":[{"color":"#eaeaea"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"elementType":"labels.text.fill","stylers":[{"color":"#616161"}]},{"elementType":"labels.text.stroke","stylers":[{"color":"#f5f5f5"}]},{"featureType":"administrative.land_parcel","elementType":"labels.text.fill","stylers":[{"color":"#424242"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"color":"#eeeeee"}]},{"featureType":"landscape.man_made","elementType":"geometry.stroke","stylers":[{"color":"#c1c1c1"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"color":"#424242"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#c4c4c4"}]},{"featureType":"poi.park","elementType":"labels.text.fill","stylers":[{"color":"#424242"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#ffffff"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#424242"}]},{"featureType":"road.highway","elementType":"geometry","stylers":[{"color":"#dadada"}]},{"featureType":"road.highway","elementType":"labels.text.fill","stylers":[{"color":"#424242"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#424242"}]},{"featureType":"transit.line","elementType":"geometry","stylers":[{"color":"#e5e5e5"}]},{"featureType":"transit.station","elementType":"geometry","stylers":[{"color":"#eeeeee"}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#b8d8e7"}]},{"featureType":"water","elementType":"labels.text.fill","stylers":[{"color":"#424242"}]}]*/		 
		};
	var mapElementOffice = document.getElementById('map-google-office');

	var mapOffice = new google.maps.Map(mapElementOffice, mapOptionsOffice);

	var iconOffice = '/img/default/icon-map.png';
	var iconOffice = {        
        path: "M13,5.5C13,2.463,10.762,0,8,0S3,2.463,3,5.5C3,5.669,3.007,5.835,3.021,6H3c0,3.021,5,10,5,10s5-6.994,5-10h-0.021C12.993,5.835,13,5.669,13,5.5z M8,7C6.896,7,6,6.104,6,5s0.896-2,2-2s2,0.896,2,2S9.104,7,8,7z",
        fillColor: '#00794b',
        fillOpacity: 1,
        anchor: new google.maps.Point(0,15),
        strokeWeight: 0,
        scale: 3
    };

	var	zenitOfficeCoord = {lat: 52.967100, lng: 36.063229};

	var 
		zenitOffice = new google.maps.Marker({
			position: zenitOfficeCoord,
			map: mapOffice,
			icon: iconOffice
		});

        $(window).on('resize', function() {
			google.maps.event.trigger(map, "resize");
			map.setCenter(coord);
        });
};
$(function () {
	$(document.body).on('shown.bs.modal', '.modal', {}, function(event){
		event.preventDefault();
		$(window).trigger('resize');      
	});  
});
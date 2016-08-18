<section id="location-map" class="directions-closed">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<script>
	var TLW_MAP_ID = 'TLW_style';
	
    var map;
    var myLatLang = new google.maps.LatLng( <?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
    var TLW_MAPTYPE_ID = 'custom_style';
    var directionsDisplay;
	var directionsService = new google.maps.DirectionsService();
	var img_url = "<?php echo $map_marker; ?>";
	var marker;
	
	 var image = {
		 url: img_url,
		 // This marker is 20 pixels wide by 32 pixels tall.
		 size: new google.maps.Size(60, 70),
		 // The origin for this image is 0,0.
		 origin: new google.maps.Point(0,0),
		 // The anchor for this image is the base of the flagpole at 0,32.
		 anchor: new google.maps.Point(30, 60)
		 };
		
   
    function initialize() {
    
    directionsDisplay = new google.maps.DirectionsRenderer();
    
	var mapOptions = {
		zoom: 12, 
		center: myLatLang, 
		//mapTypeId: TLW_MAPTYPE_ID,
		mapTypeControlOptions: {
			 mapTypeIds: [google.maps.MapTypeId.ROADMAP, TLW_MAPTYPE_ID]
		}
		};
		
    map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    	
    	marker = new google.maps.Marker({
        position: myLatLang,
        map: map,
        icon: image,
        title: "TLW Solicitors"
		});
					
		directionsDisplay.setMap(map);
		directionsDisplay.setPanel(document.getElementById('directions-panel'));
		
	};
	
	function reset_map() {
	
	var wrap = document.getElementById('location-map');
	var panel = document.getElementById('directions-panel')
	
	marker.setMap(map);
	directionsDisplay.setMap();
	
	wrap.className = "directions-closed";
	panel.innerHTML = "";
	document.getElementById('start').value = "";
	}
	
	function calcRoute() {
	  var wrap = document.getElementById('location-map');
	  var start = document.getElementById('start').value;
	  
	  var end = myLatLang;
	  var request = {
	    origin: start,
	    destination: end,
	    travelMode: google.maps.TravelMode.DRIVING
	  };
	  directionsService.route(request, function(response, status) {
	    if (status == google.maps.DirectionsStatus.OK) {
	      directionsDisplay.setDirections(response);	  
		  marker.setMap(null);
	      wrap.className = "directions-open";
	      $('html,body').animate({scrollTop: $("#directions-panel-wrap").offset().top},'slow');
	    }
	  });
	};
	
	$(window).resize(function(){
		map.setCenter(myLatLang); 
    });
	
	google.maps.event.addDomListener(window, 'load', initialize);
	
</script>
	<div id="map-canvas"></div>

	<div id="directions-panel-wrap" class="hidden-xs">
		<div class="panel-head">Your directions</div>
		<div id="directions-panel"></div>
	</div>
	<button class="close-btn hidden-xs" onclick="reset_map();"><span class="glyphicon glyphicon-remove"></span></a>
	
</section>
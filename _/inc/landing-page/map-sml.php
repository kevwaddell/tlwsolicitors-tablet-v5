<section id="small-map">
<script>
	var TLW_MAP_ID = 'TLW_style';
	
    var sml_map;
    var TLW_MAPTYPE_ID = 'small_map';
    var myLatLang = new google.maps.LatLng( <?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
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
		
   
   function sml_map_init() {
    
	var mapOptions = {
		zoom: 12, 
		center: myLatLang, 
		mapTypeControlOptions: {
			 mapTypeIds: [google.maps.MapTypeId.ROADMAP, TLW_MAPTYPE_ID]
		}
		};
		
    sml_map = new google.maps.Map(document.getElementById('sml-map-canvas'), mapOptions);
    	
    marker = new google.maps.Marker({position: myLatLang,map: sml_map,icon: image,title: "TLW Solicitors"});
		
	};

	google.maps.event.addDomListener(window, 'load', sml_map_init);
	
</script>
<div id="sml-map-canvas"></div>

</section>
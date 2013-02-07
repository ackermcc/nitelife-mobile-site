
	// All of this is done on page load
	function initialize()
	{
		
		function codeAddress(street, zipcode) {
			var address = document.getElementById("address").value;
			geocoder.geocode( { 'address': address}, function(results, status) {
			  if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
				var marker = new google.maps.Marker({
					map: map,
					position: results[0].geometry.location
				});
			  } else {
				alert("Geocode was not successful for the following reason: " + status);
			  }
			});
		}

		var mapProp = {
			  zoom:12,
			  mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		  
		var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	  
		// first we need to get the user's current location, and we will get local bars from there.
		// Try W3C Geolocation (Preferred)
		var initialLocation;
		if(navigator.geolocation) {
			browserSupportFlag = true;
			navigator.geolocation.getCurrentPosition(function(position) {
				initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
				map.setCenter(initialLocation);
			}, function() {
			  handleNoGeolocation(browserSupportFlag);
			});
		}
		
		// Browser doesn't support Geolocation
		else {
			browserSupportFlag = false;
			handleNoGeolocation(browserSupportFlag);
		}
	  
		function handleNoGeolocation(errorFlag) {
			if (errorFlag == true) {
				alert("Geolocation service failed.");
				initialLocation = newyork;
			} else {
				alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
				initialLocation = siberia;
			}
			map.setCenter(initialLocation);
		}
		
		console.log(map.getCenter());
		
		
		//var marker = new google.maps.Marker({
		//	position: cincinnati,
		//	map: map,
		//	title:"Hello World!"
		//});
		
		// now we have an initialLocation! 
		
		// Lets use ajax to get the bars, we will send the location later.
		
		function getBars(location)
		{
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}else{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
				}
			}
			
			xmlhttp.open("GET","scripts/database.php?location="+location,true);
			xmlhttp.send();
		}
	
		function getLatLong(address){
			var mygc = new google.maps.Geocoder();
			mygc.geocode({'address' : address}, function(results, status){
				alert( "latitude : " + results[0].geometry.location.lat() );
				alert( "longitude : " + results[0].geometry.location.lng() );
			});
		}


	}

google.maps.event.addDomListener(window, 'load', initialize);

	
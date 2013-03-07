
		
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

		//var mapProp = {
		//	  zoom:12,
		//	  mapTypeId:google.maps.MapTypeId.ROADMAP
		//  };
		  
		//var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
	  
		// first we need to get the user's current location, and we will get local bars from there.
		// Try W3C Geolocation (Preferred)
		function getLatLongOfUser(){
			var initialLocation;
			var loc = new Array();
			
			if(navigator.geolocation) {
					browserSupportFlag = true;
					navigator.geolocation.getCurrentPosition(function(position) {
						//initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
						//map.setCenter(initialLocation);
						alert("lat: "+position.coords.latitude+" long: "+position.coords.longitude);
						loc[0] = position.coords.latitude;
						loc[1] = position.coords.longitude;
						//return loc;
					}, function() {
					  handleNoGeolocation(browserSupportFlag);
					  alert("no geoloc");
					 // return null;
					});
		
			//return loc;
			// Browser doesn't support Geolocation
			}else {
				//browserSupportFlag = false;
				//handleNoGeolocation(browserSupportFlag);
				alert("no geoloc");
				return null;
			}
			return loc;
			
		}
		
		function getCurrentLocation(callback) {
		  if(!navigator.geolocation) return;
		  navigator.geolocation.getCurrentPosition(function(position) {
			var currLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
			callback(currLocation);
		  });
		}
	  
		function handleNoGeolocation(errorFlag) {
			if (errorFlag == true) {
				alert("Geolocation service failed.");
				initialLocation = newyork;
			} else {
				alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
				initialLocation = siberia;
			}
			//map.setCenter(initialLocation);
		}
		
		//console.log(map.getCenter());
		
		
		//var marker = new google.maps.Marker({
		//	position: cincinnati,
		//	map: map,
		//	title:"Hello World!"
		//});
		
		// now we have an initialLocation! 
		
		// Lets use ajax to get the bars, we will send the location later.
		
		function getBars()
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
					document.getElementById("nearby-locations").innerHTML=xmlhttp.responseText;
				}
			}
			//var coords = getLatLongOfUser();
			//alert(coords[0]);
			getCurrentLocation(function(loc){
				xmlhttp.open("GET","scripts/database.php?lat="+loc.ib+"&lng="+loc.jb,true);
				xmlhttp.send();
			});

		}
		
		function getBarsWithSearch(){
			
			var xmlhttp;
			if (window.XMLHttpRequest)
			  {// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			}else{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			
			xmlhttp.onreadystatechange=function(){
				if (xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById("nearby-locations").innerHTML=xmlhttp.responseText;
				}
			}
			
			var searchValue = $("#location-search").val();
			xmlhttp.open("GET","scripts/database.php?search="+searchValue,true);
			xmlhttp.send();

		
		
		}
		/*
		function getLatLong(address, id){
			if(address != null && id != null){
				var mygc = new google.maps.Geocoder();
				mygc.geocode({'address' : address}, function(results, status){
					if(results != null){
						 $("#lat-"+id).val(results[0].geometry.location.lat());
						$("#long-"+id).val(results[0].geometry.location.lng());
					}
				});
			}
		}
		*/


	
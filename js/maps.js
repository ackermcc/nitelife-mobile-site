
		function getGeolocation(){
			try {
				if(!! navigator.geolocation)
					return navigator.geolocation;
				else
					return undefined;
			} catch(e) {
				return undefined;
			}
		}
		
		
		
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
			http = new XMLHttpRequest();

			http.open("GET", "/getdata/dummy.xml");
			http.onreadystatechange=function() {
				if(http.readyState == 4) {
					// alert(http.responseText);
				}
			}
			http.send(null);
			
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
	
function getClosestBars(position){
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				$('.loadingDiv').css('display','none');
				document.getElementById("nearby-locations").innerHTML=xmlhttp.responseText;
				$("#number-of-bars").val($('.bar-location').length);
				$(window).scroll(addBars);
				
			}
		}
		//getLatLongOfUser(xmlhttp);
		
		$("#current-lat").val(position.coords.latitude.toString());
		$("#current-lng").val(position.coords.longitude.toString());
		xmlhttp.open("GET","scripts/database.php?lat="+position.coords.latitude.toString()+"&lng="+position.coords.longitude.toString()+"&start=0",true);
		xmlhttp.send();
}


function getGeolocation(){
	try {
		if(!! navigator.geolocation)
			return navigator.geolocation;
		else
			return undefined;
	} catch(e) {
		return undefined;
	}
}
	
function initialize() {
	if(geo = getGeolocation()){
		geo.watchPosition(getClosestBars);
	}else{
		//get random bars
	
	}



/*
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(-34.397, 150.644),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
  
  */
}
/*
function loadScript() {
  var script = document.createElement("script");
  script.type = "text/javascript";
  script.src = "http://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&sensor=TRUE_OR_FALSE&callback=initialize";
  document.body.appendChild(script);
}

window.onload = loadScript;

*/
window.onload = function() {
    initialize();
        }
		


function addBars() {

   if($(window).scrollTop() + $(window).height() > .9*$(document).height()) {
	
		//console.log('scrolled!');
		var start = $("#number-of-bars").val();
		var lat = $("#current-lat").val();
		var lng = $("#current-lng").val();
		var xmlhttp;
		
		if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		}else{// code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp.onreadystatechange=function(){
			if (xmlhttp.readyState==4 && xmlhttp.status==200){
				//document.getElementById("nearby-locations").innerHTML=xmlhttp.responseText;
				$("#nearby-locations").append(xmlhttp.responseText);
				$(window).scroll(addBars);
				$("#number-of-bars").val($('.bar-location').length);
			}
		}
		
		$(window).off("scroll", addBars);
		xmlhttp.open("GET","scripts/database.php?lat="+lat+"&lng="+lng+"&start="+start,true);					
		xmlhttp.send();
   }
  }
	
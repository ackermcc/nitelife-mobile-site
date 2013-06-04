/*

Copyright (c) 2013 Nitelife Entertainment, http://www.cincynitelife.com
Not for use by any other entities

Main javascript utilities used for mobile Nitelife site

*/

var markersArray = [];
var latlngArray = [];

function getGeolocation(){
	try {
		if(!!navigator.geolocation){
			return navigator.geolocation;
		}else{
			alert('in else');
			return undefined;
		}
	} catch(e) {
		alert('in catch');
		return undefined;

	}
}

/*
	Gets bars when the search bar is used
*/
function getBarsWithSearch(){
	
	var searchValue = $("#location-search").val();
	$('.loadingDiv').css('display','block');
	var lat = $("#current-lat").val();
	var lng = $("#current-lng").val();
	
	$.getJSON( "scripts/database.php?search="+searchValue+"&lat="+lat+"&lng="+lng, function(data) {
		$(window).off("scroll", addBars);
		$('.loadingDiv').css('display','none');
		
		clearMarkers();
		addMarkers(data.bars);
		centerAroundMarkers();
		
		$('#nearby-locations').html("Search results for "+data.search);
		$('#nearby-locations').append(displayBars(data.bars));
	});

}

/*
TODO: Use function to implement getting lat and long on admin page for new bars
Works! Just needs to be put in the right place
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
	

/*
	Method used for initial bar list and to populate more on scrolldown
	If position.coords is defined then it's getting the initial bar list.  
	If position.coords is undefined, then make sure the user scrolled to the bottom
*/
var map;

function addRandomBars(){
	alert('here!');
	
	$.getJSON('scripts/database.php?lat=0&lng=0&start='+$('.bar-location').length, null, function(data) {

		$('.loadingDiv').css('display','none');


		centerAroundMarkers();
		$("#nearby-locations").append("Sorry there are no bars nearby.  Here are some random bars!");
		$("#nearby-locations").append(displayBars(data.bars));
		$(window).scroll(addBars);
		
		addMarkers(data.markers);
	});

}

function addBars(position) {

	// Works better if it updates 90% to the bottom instead
   if($(window).scrollTop() + $(window).height() > .9*$(document).height() || position.coords != undefined) {
		
		if(position.coords != undefined){	// save lat and long if first call for list
		
			var lat = position.coords.latitude.toString()
			var lng = position.coords.longitude.toString()
			$("#current-lat").val(lat);
			$("#current-lng").val(lng);
			
				
			var latlng = new google.maps.LatLng(lat, lng);
			var myOptions = {
				zoom: 12,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
			map = new google.maps.Map(document.getElementById("nested-map-section"),
			myOptions);
			
			
		}else{	// get lat and long if getting more bars
		
			if (!$("#current-lat").val() || !lng = $("#current-lng").val()){
				var lat = 0;
				var lng = 0;
			}else{
				var lat = $("#current-lat").val();
				var lng = $("#current-lng").val();
			}
			
			
		}
		
		$(window).off("scroll", addBars);	// Disable scroll listener
		$('.loadingDiv').css('display','block');	// Start loading gif
		//console.log('Lat : '+lat+' Long: '+lng);
		
		$.getJSON('scripts/database.php?lat='+lat+"&lng="+lng+"&start="+$('.bar-location').length, null, function(data) {

			$('.loadingDiv').css('display','none');

			if(data.random == true){

				centerAroundMarkers();
				$("#nearby-locations").append("Sorry there are no bars nearby.  Here are some random bars!");
 
			}
			$("#nearby-locations").append(displayBars(data.bars));
			$(window).scroll(addBars);
			
			addMarkers(data.markers);
		});
	}
 }
  
function clearMarkers() {
	for (var i = 0; i < markersArray.length; i++ ) {
		markersArray[i].setMap(null);
	}
	markersArray = [];
	latlngArray = [];
}
  
function addMarkers(bars){

	for (var i = 0; i < bars.length; i++)
	{
		var myLatlng = new google.maps.LatLng(bars[i].lat,bars[i].lng);
		
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title:bars[i].name
		});
		
		/*
		console.log('slug: '+bars[i].slug+' name: '+bars[i].name);
		
		marker.info = new google.maps.InfoWindow({
			content: '<a href="?bar='+bars[i].slug+'">'+bars[i].name+'</a>'
		});
		
		google.maps.event.addListener(marker, 'click', function() {
			marker.info.open(map, marker);
		});
		*/
		markersArray.push(marker);
		latlngArray.push(myLatlng);
	}
}

function centerAroundMarkers(){

	console.log(map.toString());

	var bounds = new google.maps.LatLngBounds();

	for (var i = 0, LtLgLen = latlngArray.length; i < LtLgLen; i++) {
	  bounds.extend (latlngArray[i]);
	  console.log(latlngArray[i].toString());
	}
	console.log(bounds.getCenter());
	var cent = bounds.getCenter();
	
	map.setOptions({
        center: cent,
        zoom: 15
    });

}
  
  
function displayBars(bars){
	
	barList = '';

	for (var i = 0; i < bars.length; i++)
	{

		barObject = '<a class="bar-page-link" href="?bar='+bars[i].slug+'">';
		barObject += '<div id="'+bars[i].slug+'" class="bar-location">';
		if(bars[i].icon_url != null && bars[i].icon_url != ''){
			barObject += '<div class="bar-icon"><img src="icons/'+bars[i].icon_url+'" alt="" /></div>';
		}else{
			barObject += '<div class="bar-icon"><img src="images/no-img-icon.jpg" alt=""/></div>';
		}
		barObject += '<div class="bar-info">';
		barObject += '<div class="bar-name truncate">'+bars[i].name+'</div>';
		barObject += '<div class="bar-address truncate">'+bars[i].address+'</div>';
		barObject += '</div>';
		barObject += '<div class="bar-miles">'+ Math.round(bars[i].distance * 10)/10+' mi</div>';
		barObject += '</div>';
		barObject += '</a>';
		
		barList += barObject;
	}
	
	return barList;

}
  	
function initialize() {

	if(geo = getGeolocation()){
		geo.getCurrentPosition(addBars); //TODO: Add parameters to customize getCurrentPosition call
	}else{
		//TODO: Add code to deal with no geolocation provided
		// Use getRandomBars method of db
		addRandomBars();
		
	}
	
	$('#location-nav-map').click(function() {
	
		$('#location-search').css('display', 'none');
		$('#nearby-locations').css('display', 'none');
		
		$('#map-section').css('display', 'block');
		google.maps.event.trigger(map, 'resize');
	
	});
	
	$('#location-nav-list').click(function() {
		
		$('#map-section').css('display', 'none');
		google.maps.event.trigger(map, 'resize');
	
		$('#location-search').css('display', 'block');
		$('#nearby-locations').css('display', 'block');

	});

}

function loadScript() {
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBtoUkFZDAjp_11DUBQB6pfzi6anr00aLc&sensor=false&callback=initialize";
	document.body.appendChild(script);
}



//google.maps.event.addDomListener(window, 'load', initialize);
//window.onload = function() {
 //   initialize();
//}
	
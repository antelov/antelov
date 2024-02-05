var map;

var col_inp = document.getElementById("collection_address");
var drop_inp = document.getElementById("dropoff_address");
var col_lat = '';
var col_lng = '';
var drop_lat = '';
var drop_lng = '';
// var lat = '';
// var lng = '';

// 308215
// 546080


// Initialize and add the map
function initMap() {
    // The location of Uluru
    const uluru = { lat: -25.344, lng: 131.036 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: {
            lat: 1.3521,
            lng: 103.8198
        },
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: {
            lat: 1.3521,
            lng: 103.8198
        },
        map: map,
    });
  }

function col_loc(event) {
    event.preventDefault();
    var collection_postal = document.getElementById("collection_address").value;
    $.ajax({
        url : 'https://maps.googleapis.com/maps/api/geocode/json?address='+collection_postal+'&region=sg&key=AIzaSyDQIFzHGjGqhxRa7YJWAZZwN_zi0Ati5Ro',
        type: 'GET', 
        cache : false,
        async : false,
        contentType: false,
        processData: false,
        success: function(response, textStatus, jqXHR) {
            // console.log(response);
            // console.log(response.results[0]);
            // console.log(response.results[0].geometry);
            // console.log(response.results[0].geometry.location);
            // console.log(response.results[0].geometry.location.lat);
            // console.log(response.results[0].geometry.location.lng);
            col_lat = response.results[0].geometry.location.lat;
            col_lng = response.results[0].geometry.location.lng;

            document.getElementById("my_lat").value = col_lat;
            document.getElementById("my_lng").value = col_lng;

            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 6
            });
            
            markerA = new google.maps.Marker({
                map: map
            });
            markerB = new google.maps.Marker({
                map: map
            });
            infoWindow1 = new google.maps.InfoWindow;
            infoWindow2 = new google.maps.InfoWindow;
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer1 = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true
            });
            var directionsRenderer2 = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true,
                polylineOptions: {
                    strokeColor: "gray"
                }
            });
            var pos = {
                lat: col_lat,
                lng: col_lng
            };   
            var new_pos = {
                lat: drop_lat,
                lng: drop_lng
            };
        
            map.setCenter(pos);
            map.setZoom(15);
            //Put markers on the place
            infoWindow1.setContent('Collection');
            infoWindow2.setContent('Dropoff');
        
        
            
            markerA.setPosition(pos);
            markerA.setVisible(true);
            markerA.setLabel('A');
            infoWindow1.open(map, markerA);
        
        
        
            markerB.setPosition(new_pos, );
            markerB.setVisible(true);
            markerB.setLabel('B');
            infoWindow2.open(map, markerB);
        
            directionsService.route({
                    origin: pos,
                    destination: new_pos,
                    travelMode: 'DRIVING',
                    provideRouteAlternatives: true
                },
                function(response, status) {
                    if (status === 'OK') {
        
                        for (var i = 0, len = response.routes.length; i < len; i++) {
                            if (i === 0) {
                                directionsRenderer1.setDirections(response);
                                directionsRenderer1.setRouteIndex(i);
        
                            } else {
        
                                directionsRenderer2.setDirections(response);
                                directionsRenderer2.setRouteIndex(i);
                            }
                        }
                        console.log(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                });
   
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}
function drop_loc(event) {
    event.preventDefault();
    var dropoff_postal = document.getElementById("dropoff_address").value;
    $.ajax({
        url : 'https://maps.googleapis.com/maps/api/geocode/json?address='+dropoff_postal+'&region=sg&key=AIzaSyDQIFzHGjGqhxRa7YJWAZZwN_zi0Ati5Ro',
        type: 'GET', 
        cache : false,
        async : false,
        contentType: false,
        processData: false,
        success: function(response, textStatus, jqXHR) {
            // console.log(response);
            // console.log(response.results[0]);
            // console.log(response.results[0].geometry);
            // console.log(response.results[0].geometry.location);
            // console.log(response.results[0].geometry.location.lat);
            // console.log(response.results[0].geometry.location.lng);
            drop_lat = response.results[0].geometry.location.lat;
            drop_lng = response.results[0].geometry.location.lng;

            document.getElementById("my_lat_2").value = drop_lat;
            document.getElementById("my_lng_2").value = drop_lng;
            
            map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 6
            });
            
            markerA = new google.maps.Marker({
                map: map
            });
            markerB = new google.maps.Marker({
                map: map
            });
            infoWindow1 = new google.maps.InfoWindow;
            infoWindow2 = new google.maps.InfoWindow;
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer1 = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true
            });
            var directionsRenderer2 = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: true,
                polylineOptions: {
                    strokeColor: "gray"
                }
            });
            var pos = {
                lat: col_lat,
                lng: col_lng
            };   
            var new_pos = {
                lat: drop_lat,
                lng: drop_lng
            };
                
            map.setCenter(pos);
            map.setZoom(15);
            //Put markers on the place
            infoWindow1.setContent('Collection');
            infoWindow2.setContent('Dropoff');
        
        
            
            markerA.setPosition(pos);
            markerA.setVisible(true);
            markerA.setLabel('A');
            infoWindow1.open(map, markerA);
        
        
        
            markerB.setPosition(new_pos, );
            markerB.setVisible(true);
            markerB.setLabel('B');
            infoWindow2.open(map, markerB);
        
            directionsService.route({
                    origin: pos,
                    destination: new_pos,
                    travelMode: 'DRIVING',
                    provideRouteAlternatives: true
                },
                function(response, status) {
                    if (status === 'OK') {
        
                        for (var i = 0, len = response.routes.length; i < len; i++) {
                            if (i === 0) {
                                directionsRenderer1.setDirections(response);
                                directionsRenderer1.setRouteIndex(i);
        
                            } else {
        
                                directionsRenderer2.setDirections(response);
                                directionsRenderer2.setRouteIndex(i);
                            }
                        }
                        console.log(response);
                    } else {
                        window.alert('Directions request failed due to ' + status);
                    }
                }
            );

        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}



if(typeof(col_inp) != 'undefined' && col_inp != null) {
    col_inp.addEventListener('change', function() {
        return col_loc(event);
    });
}
if(typeof(drop_inp) != 'undefined' && drop_inp != null) {
    drop_inp.addEventListener('change', function() {
        return drop_loc(event);
    });
}
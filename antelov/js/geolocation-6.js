var my_lat = document.getElementById('my_lat').value;
var my_lng = document.getElementById('my_lng').value;
var my_lat_2 = document.getElementById('my_lat_2').value;
var my_lng_2 = document.getElementById('my_lng_2').value;
var searchString1 = my_lat + ',' + my_lng;
var searchString2 = my_lat_2 + ',' + my_lng_2;
var commaPos1 = searchString1.indexOf(',');
var commaPos2 = searchString2.indexOf(',');
var coordinatesLat = parseFloat(searchString1.substring(0, commaPos1));
var coordinatesLong = parseFloat(searchString1.substring(commaPos1 + 1, searchString1.length));
var coordinatesLat_2 = parseFloat(searchString2.substring(0, commaPos2));
var coordinatesLong_2 = parseFloat(searchString2.substring(commaPos2 + 1, searchString2.length));


var map, infoWindow, markerA, markerB, drag_pos1, drag_pos2;

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: coordinatesLat,
            lng: coordinatesLong
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
        lat: coordinatesLat,
        lng: coordinatesLong
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
        
    var new_pos = {
        lat: coordinatesLat_2,
        lng: coordinatesLong_2
    };

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
        
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
infoWindow.setPosition(pos);
infoWindow.setContent(browserHasGeolocation ?
    'Error: The Geolocation service failed.' :
    'Error: Your browser doesn\'t support geolocation.');
infoWindow.open(map);
}
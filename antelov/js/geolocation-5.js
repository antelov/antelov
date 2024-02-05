var map, infoWindow, markerA, markerB, drag_pos1, drag_pos2;

        function initMap() {
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

            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    map.setCenter(pos);
                    map.setZoom(15);
                    //Put markers on the place
                    infoWindow1.setContent('Collection');
                    infoWindow2.setContent('Dropoff');


                    
                    markerA.setPosition(pos);
                    markerA.setVisible(true);
                    markerA.setLabel('A');
                    markerA.setDraggable(true);
                    // markerA.addListener('click', function() {
                        infoWindow1.open(map, markerA);
                    // });

                    //Get new lat long to put marker B 500m above Marker A
                    var earth = 6378.137, //radius of the earth in kilometer
                        pi = Math.PI,
                        m = (1 / ((2 * pi / 360) * earth)) / 1000; //1 meter in degree

                    var new_latitude = pos.lat + (500 * m);
                    var new_pos = {
                        lat: new_latitude,
                        lng: position.coords.longitude
                    };


                    document.getElementById('my_lat').value = position.coords.latitude,
                    document.getElementById('my_lng').value = position.coords.longitude;
                    document.getElementById('my_lat_2').value = new_latitude;
                    document.getElementById('my_lng_2').value = position.coords.longitude;

                    markerB.setPosition(new_pos, );
                    markerB.setVisible(true);
                    markerB.setLabel('B');
                    markerB.setDraggable(true);
                    infoWindow2.open(map, markerB);

                    //Everytime MarkerB is drag Directions Service is use to get all the route
                    google.maps.event.addListener(markerA, 'dragend', function(evt) {
                        pos = {
                            lat: evt.latLng.lat(),
                            lng: evt.latLng.lng()
                        };
                        document.getElementById("my_lat").value = evt.latLng.lat();
                        document.getElementById("my_lng").value = evt.latLng.lng();
                        
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
                    });
                    google.maps.event.addListener(markerB, 'dragend', function(evt) {
                        new_pos = {
                            lat: evt.latLng.lat(),
                            lng: evt.latLng.lng()
                        };

                        document.getElementById("my_lat_2").value = evt.latLng.lat();
                        document.getElementById("my_lng_2").value = evt.latLng.lng();

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
                    });
                }, function() {
                    handleLocationError(true, infoWindow, map.getCenter());
                });
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        }

        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
            infoWindow.setPosition(pos);
            infoWindow.setContent(browserHasGeolocation ?
                'Error: The Geolocation service failed.' :
                'Error: Your browser doesn\'t support geolocation.');
            infoWindow.open(map);
        }
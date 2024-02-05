
// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.
let map, infoWindow;
let markers = [];


function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 41.43206, lng: -81.38992 },
        zoom: 18,
    });

    
    infoWindow = new google.maps.InfoWindow();

    const locationButton = document.createElement("button");

    locationButton.textContent = "Current Location";
    locationButton.classList.add("custom-map-control-button");
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude,
                };
                // The marker
                const marker = new google.maps.Marker({
                    position: { lat: position.coords.latitude, lng: position.coords.longitude },
                    map: map,
                });         
                markers.push(marker);
                document.getElementById("my_lat").value = position.coords.latitude;
                document.getElementById("my_lng").value = position.coords.longitude;
                infoWindow.setPosition(pos);
                infoWindow.setContent("Location found.");
                infoWindow.open(map);
                map.setCenter(pos);
            },
        () => {
            handleLocationError(true, infoWindow, map.getCenter());
        }
        
    );
    } else {
    // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
    locationButton.addEventListener("click", () => {
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };

                    // The marker
                    addMarker(pos);

                    infoWindow.setPosition(pos);
                    infoWindow.setContent("Location found.");
                    infoWindow.open(map);
                    map.setCenter(pos);
                },
            () => {
                handleLocationError(true, infoWindow, map.getCenter());
            }
            
        );
        } else {
        // Browser doesn't support Geolocation
            handleLocationError(false, infoWindow, map.getCenter());
        }
    });
    map.addListener("click", (event) => {
        addMarker(event.latLng);
    });
    console.log(markers);
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(
        browserHasGeolocation
        ? "Error: The Geolocation service failed."
        : "Error: Your browser doesn't support geolocation."
    );
    infoWindow.open(map);
}




// Adds a marker to the map and push to the array.
// function addMarker(position) {
//     if(typeof(marker) != 'undefined' && marker != null) {
//         console.log(marker);
//         marker.setMap(null);
//     }
//     marker = new google.maps.Marker({
//         position,
//         map,
//     });
// }








// Adds a marker to the map and push to the array.
function addMarker(position) {
    hideMarkers();
    const marker = new google.maps.Marker({
        position,
        map,
    });
    markers.push(marker);
    for (let i = 0; i < markers.length; i++) {
        var lat = markers[i].getPosition().lat();
        var lng = markers[i].getPosition().lng();
        
        document.getElementById("my_lat").value = lat;
        document.getElementById("my_lng").value = lng;
        console.log(lat, lng);
    }
}

// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (let i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function hideMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    hideMarkers();
    markers = [];
}
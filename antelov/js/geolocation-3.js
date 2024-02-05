// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&libraries=places">

var markers = [];
// var marker = '';



function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), {
      mapTypeControl: false,
      center: { lat: 41.43206, lng: -81.38992 },
      // center: { lat: 1.287953, lng: 103.851784 },
      zoom: 16,
    });
  
    new AutocompleteDirectionsHandler(map).addMarker();
    new AutocompleteDirectionsHandler(map);
    
  }
  
  class AutocompleteDirectionsHandler {
    map;
    originPlaceId;
    destinationPlaceId;
    travelMode;
    directionsService;
    directionsRenderer;
    constructor(map) {
      this.map = map;
      this.originPlaceId = "";
      this.destinationPlaceId = "";
      // this.travelMode = google.maps.TravelMode.WALKING;
      this.directionsService = new google.maps.DirectionsService();
      this.directionsRenderer = new google.maps.DirectionsRenderer();
      this.directionsRenderer.setMap(map);
  
      const originInput = document.getElementById("origin-input");
      const destinationInput = document.getElementById("destination-input");
      const modeSelector = document.getElementById("mode-selector");
      const originAutocomplete = new google.maps.places.Autocomplete(originInput);
  
      // Specify just the place data fields that you need.
      originAutocomplete.setFields(["place_id"]);
  
      const destinationAutocomplete = new google.maps.places.Autocomplete(
        destinationInput
      );
  
      // Specify just the place data fields that you need.
      destinationAutocomplete.setFields(["place_id"]);
      // this.setupClickListener(
      //   "changemode-walking",
      //   google.maps.TravelMode.WALKING
      // );
      // this.setupClickListener(
      //   "changemode-transit",
      //   google.maps.TravelMode.TRANSIT
      // );
      // this.setupClickListener(
      //   "changemode-driving",
      //   google.maps.TravelMode.DRIVING
      // );
      this.setupPlaceChangedListener(originAutocomplete, "ORIG");
      this.setupPlaceChangedListener(destinationAutocomplete, "DEST");
      this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
      this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(
        destinationInput
      );
      this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
    }
    // // Sets a listener on a radio button to change the filter type on Places
    // // Autocomplete.
    // setupClickListener(id, mode) {
    //   const radioButton = document.getElementById(id);
  
    //   radioButton.addEventListener("click", () => {
    //     this.travelMode = mode;
    //     this.route();
    //   });
    // }
    addMarker() {
      this.map.addListener("click", (event) => {
          var myLatLng = event.latLng;
          var lat = myLatLng.lat();
          var lng = myLatLng.lng();
          var ll = lat+","+lng;
          markers.push(ll);
          if(markers.length > 2) {
            markers.shift();
          }
          console.log(markers);
      });
    }
    setupPlaceChangedListener(autocomplete, mode) {
      autocomplete.bindTo("bounds", this.map);
      autocomplete.addListener("place_changed", () => {
        const place = autocomplete.getPlace();
  
        if (!place.place_id) {
          window.alert("Please select an option from the dropdown list.");
          return;
        }
  
        if (mode === "ORIG") {
          this.originPlaceId = place.place_id;
        } else {
          this.destinationPlaceId = place.place_id;
        }
  
        this.route();
      });
    }
    route() {
      // if (!this.originPlaceId || !this.destinationPlaceId) {
      //   return;
      // }
  
      const me = this;
  
      this.directionsService.route(
        {
          // origin: { placeId: this.originPlaceId },
          origin: markers[0],
          // destination: { placeId: this.destinationPlaceId },
          destination: "42.43206,-82.38992",
          travelMode: markers[1],
        },
        (response, status) => {
          if (status === "OK") {
            me.directionsRenderer.setDirections(response);
          } else {
            window.alert("Directions request failed due to " + status);
          }
        }
      );
    }
  }

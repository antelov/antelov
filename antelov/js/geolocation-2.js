$(document).ready(function() {
    var directionDisplay;
    var directionsService = new google.maps.DirectionsService();
    var infowindow = new google.maps.InfoWindow();
    var map;
    var pickUpMarker, dropToMarker; // add marker variables
    
    
    function initialize() {
    
        directionsDisplay = new google.maps.DirectionsRenderer({
            suppressMarkers: true
        });
    
        var mapOptions = {
            zoom: 3,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
    
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
    
        directionsDisplay.setMap(map);
        calcRoute();
    }
    
    function calcRoute(pickUpLat,pickUplon,droplat,droplon) {
        var pickUpLat   = "<?= $pickUpLat ?>";
        var pickUplon   = "<?= $pickUplon ?>";
        var droplat     = "<?= $model->drop_off_latitude ?>";
        var droplon     = "<?= $model->drop_off_longitude ?>";
        var start = new google.maps.LatLng(pickUpLat,pickUplon);
        var end = new google.maps.LatLng(droplat,droplon);
    
        if(!pickUpMarker) {
            pickUpMarker = createMarker(start,"<?= $model->item_delivery_title; ?>","<?= Yii::$app->urlManagerFrontEnd->createAbsoluteUrl('/images/track_route.png')?>");
        } else {
            pickUpMarker.setPosition(start)
        }
    
        if(!dropToMarker) {
            dropToMarker = createMarker(end,"<?= $model->drop_off_address; ?>",'');
        } else {
            dropToMarker.setPosition(start)
        }
    
        var request = {
            origin: start,
            destination: end,
            optimizeWaypoints: true,
            travelMode: google.maps.DirectionsTravelMode.WALKING
        };
    
        directionsService.route(request, function (response, status) {
            if (status == google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];
            }
        });
    }
    
    function createMarker(latlng,title,icon) {
        var marker = new google.maps.Marker({
            position: latlng,
            animation: google.maps.Animation.DROP,
            title: title,
            icon: icon,
            map: map
        });
        google.maps.event.addListener(marker, 'click', function () {
            infowindow.setContent(title);
            infowindow.open(map, marker);
        });
    
        return marker;
    }
    
    initialize();
    function makeRequest(){
        $.ajax({
        url:"<?php echo Url::base(true).'/delivery/map-data'; ?>",
        type:"POST",
        data:{"delivery_id":"<?= $model->id ?>"}
    
        })
        .done(function(result){
            var respon=JSON.parse(result);
            if(respon.status==200){
                // want to cupdate the pickup location here
                pickUpMarker.setPosition(result.position)
            }
    
    
        });
    
    } 
    setInterval(makeRequest, (3000));
    
});
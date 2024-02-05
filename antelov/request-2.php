<?php include './partials/header.php'; ?>
<?php include './partials/navigation.php'; ?>

<?php 
    echo "<div class='page-wrapper' id='page-wrapper-request'>";
        $request = new Request();
        $bid = new Bid();
        echo $request->show_request($_GET['id']);
        echo $bid->show_bids_by_request_id($_GET['id']);
    echo "</div>";
?>




<script>
    function apply(id) {
        var toArr = id.split("-");
        var b = toArr[0];
        var i = toArr[1];

        // var loader = document.getElementById('loader');
        // loader.classList.add('loader-animation');
        // setTimeout(function(){ 
            $.ajax({
                url : './template-parts/popup', // Url of backend (can be python, php, etc..)
                type: 'POST', // data type (can be get, post, put, delete)
                data : "apply=true+&"+"booking="+b+"&id="+i,
                async: false,
                success: function(response, textStatus, jqXHR) {
                    document.getElementById('popup-wrapper').innerHTML = response;
                    popup('applyPopup');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        // }, 2000);
    }
</script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQIFzHGjGqhxRa7YJWAZZwN_zi0Ati5Ro&callback=initMap&v=weekly&channel=2"
    async
></script>
<script>
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
    function initMap() {
        const myLatlng = { lat: coordinatesLat, lng: coordinatesLong};
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 18,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        // let infoWindow = new google.maps.InfoWindow({
        //     content: "Location",
        //     position: myLatlng,
        // });
        const marker = new google.maps.Marker({
            position: { lat: coordinatesLat, lng: coordinatesLong},
            map: map,
        });  

        // infoWindow.open(map);
        // Configure the click listener.
        // map.addListener("click", (mapsMouseEvent) => {
        //     // Close the current InfoWindow.
        //     infoWindow.close();
        //     // Create a new InfoWindow.
        //     infoWindow = new google.maps.InfoWindow({
        //     position: mapsMouseEvent.latLng,
        //     });
        //     infoWindow.setContent(
        //     JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        //     );
        //     infoWindow.open(map);
        // });
    }
    initMap();
</script>


<script>
    function dropFilter() {
        var mobileFilter = document.querySelector('.proposals-head-row2 #filter');
        if(!mobileFilter.classList.contains('active')) {
            mobileFilter.classList.add('active');
            return;
        } else {
            mobileFilter.classList.remove('active');
            return;
        }
    } 
</script>



<script>
    function accept(id) {
        var bidId = id.split('-')[1];
        var loader = document.getElementById('loader');
        loader.classList.add('loader-animation');
        setTimeout(function(){ 
            $.ajax({
                url : './controllers/bid-handler',
                type: 'POST',
                data : "accept=true+&"+"bidid="+bidId,
                async: false,
                success: function(response, textStatus, jqXHR) {
                    window.location.href = './';
                    // document.getElementById('popup-wrapper').innerHTML = response;
                    // popup('applyPopup');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }, 2000);
    }
</script>
<?php include './partials/footer.php'; ?>


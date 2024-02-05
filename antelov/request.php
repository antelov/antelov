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


<script src="./js/geolocation-6.js"></script>


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


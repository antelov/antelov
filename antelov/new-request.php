<?php include './partials/header.php'; ?>
<?php include './partials/navigation.php'; ?>

<style>
    #page-wrapper-request {
        width: 55%;
    }
    .additional-services-row {
        display: grid;
        /* grid-template-rows: 100%; */
        row-gap: 15px;
    }
    #request-page {
        padding: 0px 0 0px 0;
        display: grid;
        grid-template-columns: 100%;
        grid-template-rows: auto;
        row-gap: 50px;
        background-color: #fff;
        margin: 0;
    }
    #request-page .page-content {
        margin: 0;
    }
    #request-page .content-inner-div {
        display: grid;
        grid-template-columns: 100%;
        grid-template-rows: auto;
        row-gap: 50px;
        justify-content: center;
        align-items: center;
    }
    /* Form */
    #new_request {
        width: 100%;
        display: grid;
        grid-template-columns: 100%;
        grid-template-rows: auto;
        row-gap: 50px;
    }
    .request-group {
        display: grid;
        grid-template-rows: auto;
        grid-template-columns: 100%;
        row-gap: 30px;
        box-shadow: 0 2px 16px 0 rgb(0 0 0 / 8%);
        padding: 60px;
        justify-items: space-between;
        border-radius: 8px;
    }


    #grid-row-1 {
        display: grid;
        grid-template-columns: 480px 300px;
        /* grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); */
        /* column-gap: 30px; */
        justify-content: space-between;
    }
    #request-group-0 {
        display: grid;
        grid-template-rows: auto;
        grid-template-columns: 100%;
        row-gap: 20px;
    }
    #request-group-0 .grid-row {
        display: grid;
        grid-template-rows: auto;
        grid-template-columns: 100%;
        row-gap: 50px;
    } 
    #new_request .form-heading {
        text-align: center;
        line-height: 1;
    }
    #new_request .form-subheading {
        text-align: center;
    }
    #new_request input[type="text"],
    #new_request input[type="number"],
    #new_request input[type="date"],
    #new_request input[type="password"],
    select {
        background-color: rgb(250,250,250);
        border: 1px solid #b2b2b2;
        border-radius: 8px;
        height: 50px !important;
    }
    #new_request .input-group {
        display: grid;
        row-gap: 10px;
    }
    .additional-services-row .input-group {
        display: grid;
        grid-template-rows: 100%;
        grid-template-columns: 20px auto;
        column-gap: 10px;
        align-items: center;
    }
    #new_request .input-group label {
        color: black;
        font-weight: bold;
        font-family: "Open Sans",Arial,sans-serif;
        font-size: 16px;
    }
    #new_request #pfp-group {
        margin: 0;
        width: 250px;
        height: 250px;
    }
    .request-group-title {
        font-size: 25px;
        font-weight: bold;
        font-family: var(--font-2);
    }

    #basic-info-row .grid-box:nth-child(1) {
        display: grid;
        row-gap: 15px;
        align-content: flex-start;
    }
    #basic-info-row .grid-box:nth-child(2) {
        /* display: grid;
        align-content: center; */
        padding-top: 20px;
    }
    form {
        display: grid;
        row-gap: 50px;
    }
    label span {
        color: gray;
    }
    #request-group-3 {
        width: 100%;
    }
    #request-group-3 textarea {
        background-color: #fff;
        resize: none;
        border: 1px solid #b2b2b2;
    }
    #bid-type-row {
        margin: 20px 0 10px 0;
    }
    /* Profile pic */
    #new_request #pfp-group {
        width: 300px;
        height: auto;
        display: grid;
        grid-template-rows: auto;
        grid-template-columns: 100%;
        justify-content: center;
        justify-items: center;
        align-items: center;
        row-gap: 20px;
        
        margin: 0 auto 30px auto;
        position: relative;
    }
    #default-photo {
        opacity: .9;
    }
    #vid-default-photo {
        opacity: .9;
    }
    #pfp-img-preview {
        display: none;
    }
    #video-thumbnail-preview {
        display: none;
    }
    .pfp-placeholder {
        width: 200px;
        height: 200px;
        /* border-radius: 50%; */
        border-radius: 4px;
        overflow: hidden;
        position: relative;
    }
    .pfp-placeholder img {
        width: inherit;
        height: inherit;
        object-fit: cover;
        /* position: absolute; */
    }
    /* Video thumbnail */
    .video-thumbnail-placeholder {
        width: 300px;
        height: 200px;
        /* border-radius: 50%; */
        border-radius: 4px;
        overflow: hidden;
        position: relative;
    }
    .video-thumbnail-placeholder img {
        width: inherit;
        height: inherit;
        object-fit: cover;
    }
    #infos {
        position: absolute;
        z-index: 3;
        /* color: #000;  */
        bottom: 0;
        color: #fff;
        padding: 10px 15px;
    }
    #upload-btns {
        position: relative;
        /* z-index: 3;
        top: 0;
        right: 0; */
    }
    #upload_btn, #remove_btn, #vid_upload_btn, #vid_remove_btn {
        border-radius: 4px;
        color: rgb(0, 0, 0);
        padding: 0 25px;
        width: 100%;
        text-align: center;
        font-size: 15px;
        font-family: var(--font-1);
        cursor: pointer;
        border: none;
        grid-template-columns: auto auto;
        align-items: center;
        justify-content: center;
        column-gap: 10px;
        border: none;
        background-color: rgb(255,255,255);
        border: 1px solid #b3b3b3;
        opacity: 1;
        transition: .3s;
        opacity: 1;
        height: 45px;
    }
    @media screen and (max-width: 1280px) {
        #page-wrapper-request {
            width: 70%;
        }
    }
    @media screen and (max-width: 414px) {
        #page-wrapper-request {
            width: 90%;
        }
        .request-group {
            padding: 20px;
        }
    }
</style>

<style>
    .map-wrapper {
        height: 500px;
    }
    /* Always set the map height explicitly to define the size of the div
    * element that contains the map. */
    #map {
        height: 100%;
        width: 100%;
        /* width: 1000px;
        height: 600px; */
    }
    /* Optional: Makes the sample page fill the window. */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    .custom-map-control-button {
        background-color: #fff;
        border: 0;
        border-radius: 2px;
        box-shadow: 0 1px 4px -1px rgba(0, 0, 0, 0.3);
        margin: 10px;
        padding: 0 0.5em;
        font: 400 18px Roboto, Arial, sans-serif;
        overflow: hidden;
        height: 40px;
        cursor: pointer;
    }
    .custom-map-control-button:hover {
        background: #ebebeb;
    }
</style>




<div class='page-wrapper' id='page-wrapper-request'>
    <div class='page' id='request-page'>
        <!-- <div class='page-title'>
            <h1>Sign Up</h1>
        </div> -->
        <div class='page-content'>
            <div class='content-inner-div'>
                <div id='new_request'>
                    <div class='form-header'>
                        <div class='form-heading'>
                            <h3>Create New Request</h3>
                        </div>
                        <div class='form-subheading'>
                            <p>Sed do eiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                    <form onsubmit='return validateRequest(event)' autocomplete='off' action='' class='requestform' runat='server' method='POST' enctype="multipart-formdata">
                        <input type="hidden" name='create_request' value='true'>
                        <div class='request-group'  id='request-group-0'>
                            <div class='request-group-title'>
                                Location
                            </div>
                            <div class='grid-row'>
                                <input type="hidden" name='my_lat' id='my_lat'>
                                <input type="hidden" name='my_lng' id='my_lng'>
                                <input type="hidden" name='my_lat_2' id='my_lat_2'>
                                <input type="hidden" name='my_lng_2' id='my_lng_2'>


                            








                                <div class='map-wrapper'>
                                    <div id='map'></div>
                                </div>
                                <div class='input-group'>
                                    <label for='collection_address'>Collection <span>(Postal Code)</span></label>
                                    <input style='margin-bottom: 10px;' type='number' class='collection_address' name='collection_address' id='collection_address'>
                                    <label for='dropoff_address'>Dropoff <span>(Postal Code)</span></label>
                                    <input type='number' class='dropoff_address' name='dropoff_address' id='dropoff_address'>
                                    <div class='error' id='locError'></div>
                                </div>
                            </div>
                        </div>
                        <div class='request-group' id='request-group-1'>
                            <div class='request-group-title'>
                                Basic Information
                            </div>
                            <div class='grid-row' id='basic-info-row'>
                                <div class='grid-box'>
                                    <div class='input-group'>
                                        <label for="item_name">Item Name</label>
                                        <input type='text' class='item_name' name='item_name' id='item_name'>
                                    </div>
                                    <div class='input-group'>
                                        <label for="unit_type">Unit Type</label>
                                        <select class="unit_type" name="unit_type" id="unit_type">
                                            <option value="Ground floor">Ground floor</option>
                                            <option value="Accessible by lift">Accessible by lift</option>
                                            <option value="Use stairs">Use stairs</option>
                                        </select>
                                    </div>

                                    <div class='input-group'>
                                        <label for="vehicle">Vehicle</label>
                                        <select class='vehicle' name='vehicle' id='vehicle'>
                                            <option value="Van">Van</option>
                                            <option value="10ft lorry">10ft lorry</option>
                                            <option value="14ft lorry">14ft lorry</option>
                                        </select>
                                    </div>
                                    <style>
                                        #bid-type-row {
                                            display: grid;
                                            grid-template-columns: auto auto;
                                            column-gap: 20px;
                                            justify-content: flex-start;
                                        }
                                        #bid-type-row .input-group {
                                            display: grid;
                                            grid-template-columns: 20px auto;
                                            column-gap: 5px;
                                            justify-content: flex-start;
                                        }
                                    </style>
                                    <div class='input-group'>
                                        <label for="budget">Budget (Optional)</label>
                                        <input type='number' class='budget' name='budget' id='budget'>
                                    </div>
                                    <div id='bid-type-row'>
                                        <div class='input-group'>
                                            <input type='radio' class='fragility' name='booking' id='bid' value='bid'> Bid
                                        </div>
                                        <div class='input-group'>
                                            <input type='radio' class='staircase' name='booking' id='fixed' value='fixed'> Fixed
                                        </div>
                                    </div>

                                </div>
                                <div class='grid-box'>
                                    <div id='pfp-group'>
                                        <div class='pfp-placeholder'>
                                            <img id='default-photo' src='./img/placeholder.png' alt=''>
                                            <img id='pfp-img-preview' src='#' alt='your image' />
                                        </div>                 
                                        <div id='upload-btns'>
                                            <button id='upload_btn' onclick='return fireButton(event);'>Upload Photo</button>       
                                            <input class='input' id='image' type='file' name='image' value='' style='display: none;'>
                                            <button id='remove_btn' onclick='return removeImg(event);'>Remove</button>
                                        </div> 
                                        
                                    </div>
                                    <div id='pfp-group'>
                                        <div class='video-thumbnail-placeholder'>
                                            <img id='vid-default-photo' src='./img/video.png' alt=''>
                                            <img id='video-thumbnail-preview' src='#' alt='your image' />
                                            <div id='infos'></div>
                                        </div>                 
                                        <div id='upload-btns'>
                                            <button id='vid_upload_btn' onclick='return fireButton2(event);'>Add a Video</button>       
                                            <input class='input' id='video_file' type='file' name='video_file' value='' style='display: none;'>
                                            <button id='vid_remove_btn' onclick='return removeImg2(event);'>Remove</button>
                                        </div> 
                                        <input type="hidden" id='imgBase64' name='imgBase64' value=''>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='request-group' id='request-group-2'>
                            <div class='request-group-title'>
                                Choose Additional Services
                            </div>
                            <div class='additional-services-row' id=''>
                                <div class='input-group'>
                                    <input type='radio' class='fragility' name='fragility' id='fragility'> Fragility
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='staircase' name='staircase' id='staircase'> Staircase/lift
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='manpower' name='manpower' id='manpower'>Manpower
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='stair_carry' name='stair_carry' id='stair_carry'>Stair Carry
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='long_distance_push' name='long_distance_push' id='long_distance_push'>Long Distance Push
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='assembly' name='assembly' id='assembly'>Assembly/disassembly
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='storage' name='storage' id='storage'>Storage
                                </div>
                            </div>
                        </div>
                        <div class='request-group' id='request-group-3'>
                            <div class='request-group-title'>
                                Additional Info
                            </div>
                            <div class='' id='additional-infos-row'>
                                <div class='input-group'>
                                    <textarea name='additional_info' id='additional_info' cols='20' rows='8'></textarea>
                                </div>
                            </div>
                        </div>
                        <div class='request-group' id='request-group-2'>
                            <div class='request-group-title'>
                                Payment Method
                            </div>
                            <div class='additional-services-row' id='payment_method_row'>
                                <div class='input-group'>
                                    <input type='radio' class='payment_method' name='payment_method' id='cod' value='cod'> COD
                                </div>
                                <!-- <div class='input-group'>
                                    <input type='radio' class='payment_method' name='payment_method' id='cards' id='cards'> Mastercard/Visa
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='payment_method' name='payment_method' id='online payment' value='online payment'> Online Payment
                                </div>
                                <div class='input-group'>
                                    <input type='radio' class='payment_method' name='payment_method' id='any' value='any'> Any
                                </div> -->
                            </div>
                        </div>
                        <div class='input-group'>
                            <!-- onclick='save(event);' -->
                            <input type='submit' class='send' name='send' value='Submit'>
                        </div>
                    </form>
                </div>

            </div>
        </div>  

    </div>  
</div>  




    <canvas style='display: none;' id="prevImgCanvas">Your browser does not support the HTML5 canvas tag.</canvas>  
    <!-- <a id="link"></a> -->



<script
    src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyDQIFzHGjGqhxRa7YJWAZZwN_zi0Ati5Ro&callback=initMap&v=weekly&channel=2"
    async
></script>

<!-- <script src="./js/geolocation-5.js?v=7"></script>
<script src="./js/geolocation-7.js?v=10"></script> -->
<script src="./js/geolocation-7.js?v=13"></script>
<!-- <b>Mode of Travel: </b>
      <select id="mode">
        <option value="DRIVING">Driving</option>
        <option value="WALKING">Walking</option>
        <option value="BICYCLING">Bicycling</option>
        <option value="TRANSIT">Transit</option>
      </select> -->

<script>
    var img = document.getElementById('pfp-img-preview');

    var video = document.createElement("video");
    
    var canvas = document.getElementById("prevImgCanvas");
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;

    video.addEventListener('loadeddata', function() {
        reloadRandomFrame();
    }, false);

    video.addEventListener('seeked', function() {
        var vidFileType = get_vid_type('video_file');
        
        if(vidFileType == 'mp4') {
        // if(isVideo(video)) {
            var context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);
            $("#video-thumbnail-preview").attr("src", $("#prevImgCanvas").get(0).toDataURL("img/png"));
            $("#imgBase64").attr("val", $("#prevImgCanvas").get(0).toDataURL("img/png"));
        } else {
            return;
        }
    
        // var link = document.getElementById('link');
        // link.setAttribute('download', 'MintyPaper.png');
        // link.setAttribute('href', canvas.toDataURL("image/png").replace("image/png", "image/octet-stream"));
        // link.click();
    }, false);


    var playSelectedFile = function(event) {
        var file = this.files[0];
        var fileURL = URL.createObjectURL(file);
        video.src = fileURL;
    }

    var input = document.getElementById('video_file');
    input.addEventListener('change', playSelectedFile, false);

    function reloadRandomFrame() {
        if (!isNaN(video.duration)) {
            var rand = Math.round(Math.random() * video.duration * 1000) + 1;
            video.currentTime = rand / 1000;
            // $("#pfp-img-preview").attr("src", $("#prevImgCanvas").get(0).toDataURL("img/png"));
        }
    }
    
    function save(event) {
        // 1048576
        // if( video > 5242880) {
        //     return;
        // }
        event.preventDefault();
        var dataURL = canvas.toDataURL();
        document.getElementById("imgBase64").value = dataURL;
        var form = $('form')[0];
        var formData = new FormData(form);
        $.ajax({
            url : './controllers/request-handler.php',
            type: 'POST', 
            data : formData,
            cache : false,
            async : false,
            contentType: false,
            processData: false,
            success: function(response, textStatus, jqXHR) {
                console.log(response);
                // window.location.href = './controllers/request-handler.php';
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }


    var remove_btn = document.getElementById('remove_btn');
    var upload_btn = document.getElementById('upload_btn');
    var vid_remove_btn = document.getElementById('vid_remove_btn');
    var vid_upload_btn = document.getElementById('vid_upload_btn');

    var def_photo = document.getElementById('default-photo');
    var def_photo_src = document.getElementById('default-photo').src;

    var vid_def_photo = document.getElementById('vid-default-photo');
    var vid_def_photo_src = document.getElementById('vid-default-photo').src;

    var preview_img = document.getElementById('pfp-img-preview');
    var preview_img_src = document.getElementById('pfp-img-preview').src;

    var vid_preview_img = document.getElementById('video-thumbnail-preview');
    var vid_preview_img_src = document.getElementById('video-thumbnail-preview').src;

    if(vid_def_photo_src.endsWith('video.png')) {
        vid_remove_btn.style.display = 'none';
        vid_upload_btn.style.display = 'flex';
    } else {
        vid_remove_btn.style.display = 'flex';
        vid_upload_btn.style.display = 'none';
    }
    if(def_photo_src.endsWith('placeholder.png')) {
        remove_btn.style.display = 'none';
        upload_btn.style.display = 'flex';
    } else {
        remove_btn.style.display = 'flex';
        upload_btn.style.display = 'none';
    }
    function fireButton(event) {
        event.preventDefault();
        document.getElementById('image').click();
    }
    function fireButton2(event) {
        event.preventDefault();
        document.getElementById('video_file').click();
    }
    function readPfpURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#pfp-img-preview').attr('src', e.target.result);
                def_photo.style.display = 'none';
                preview_img.style.display = 'flex';
                remove_btn.style.display = 'flex';
                upload_btn.style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function readVidURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#video-thumbnail-preview').attr('src', e.target.result);
                vid_def_photo.style.display = 'none';
                vid_preview_img.style.display = 'flex';
                vid_remove_btn.style.display = 'flex';
                vid_upload_btn.style.display = 'none';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#image").change(function(){
        readPfpURL(this);
    });
    $("#video_file").change(function(){
        var vidFileType = get_vid_type('video_file');
        if(vidFileType == 'mp4') {
            readVidURL(this);
            setFileInfo();
        } else {
            document.getElementById('video_file').value= null;
        }
    });
    function removeImg(event) {
        event.preventDefault();
        $('#pfp-img-preview').attr('src', preview_img_src);
        $('#default-photo').attr('src', './img/placeholder.png');

        remove_btn.style.display = 'none';
        upload_btn.style.display = 'flex';
        def_photo.style.display = 'flex';
        preview_img.style.display = 'none';

        document.getElementById('image').value = null;
    }
    function removeImg2(event) {
        event.preventDefault();
        $('#pfp-img-preview').attr('src', preview_img_src);
        $('#default-photo').attr('src', './img/placeholder.png');

        vid_remove_btn.style.display = 'none';
        vid_upload_btn.style.display = 'flex';
        vid_def_photo.style.display = 'flex';
        vid_preview_img.style.display = 'none';

        document.getElementById('video_file').value = null;
    }
</script>






<?php include './partials/footer.php'; ?>
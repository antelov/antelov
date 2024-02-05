<?php include './partials/header.php'; ?>
<?php include './partials/navigation.php'; ?>

<?php 
    if(!isset($_SESSION['user'])) {
        include './template-parts/hero-section.php';
        include './template-parts/info-cards.php';
        include './template-parts/bg-section.php';
        include './template-parts/logos.php'; 
    } else {   
        $uid = $user->get_uid();
        $user_status = $user->get_user_status();
        $account_status = $user->get_account_status() ;
        $account_type = $user->get_account_type();

        if($user_status == 'admin') {
            echo "<div id='content-wrapper'>";
            include './template-parts/sidebar.php';
            $request = new Request();
            $bid = new Bid();
            echo "<div class='main'>";
                // echo $bid->show_bids_by_business_id($uid);
                echo "<div id='requests'>";
                if(isset($_GET['booking'])) {
                    // var_dump($_GET['booking']);
                    echo $request->show_requests('started', null, true);
                } else {
                    echo $request->show_requests('started');
                }
                echo "</div>";
                
            echo "</div>";
            echo "</div>";
        } else {

        

        if($account_type == 'business') {

            // echo "<div class='page-wrapper' id='page-wrapper-request'>";
            echo "<div id='content-wrapper'>";
                include './template-parts/sidebar.php';
                $request = new Request();
                $bid = new Bid();
                echo "<div class='main'>";
                    // echo $bid->show_bids_by_business_id($uid);
                    echo "<div id='requests'>";
                    if(isset($_GET['booking'])) {
                        // var_dump($_GET['booking']);
                        echo $request->show_requests('started', null, true);
                    } else {
                        echo $request->show_requests('started');
                    }
                    echo "</div>";
                    
                echo "</div>";
            echo "</div>";
            // echo "</div>";

        } else if($account_type == 'personal') {
?>
    <style>
        .page-wrapper {
            width: 1350px;
        }
        .profile-section-wrapper {
            display: grid;
            grid-template-columns: 350px 900px;
            column-gap: 30px;
            /* grid-auto-rows: fit-content; */
            /* align-items: center; */
        }
        .business-content {
            display: grid;
            grid-template-columns: 100%;
            row-gap: 50px;
            /* grid-auto-rows: fit-content; */
            /* align-items: center; */
        }
        .user-profile {
            display: grid;
            grid-template-columns: 100%;
            grid-auto-rows: fit-content;
            /* align-items: center; */
            row-gap: 20px;  
            width: 350px;
            max-height: 400px;
            box-shadow: 0 2px 16px 0 rgb(0 0 0 / 8%);
            

            margin-right: auto;
            padding: 20px 30px;
        }
        .user-profile-header {
            position: relative;
        }
        .user-profile-header form {
            position: absolute;
            right: 0;
        }
        .user-profile-body {
            display: grid;
            /* grid-template-columns: 100%; */
            grid-template-columns: 100%;
            /* justify-items: center; */
            /* justify-content: center; */
            /* justify-content: space-between; */
            align-items: center;
            row-gap: 20px; 
            column-gap: 100px; 
            width: 100%;
            padding: 20px 20px 30px 20px;
            margin: 0 auto;
        }
        .user-profile-img {
            width: 150px;
            height: 150px;
            border-radius: 8px;
            object-fit: cover;
            overflow: hidden;
        }
        .user-profile-img img {
            width: 100%;
            height: 100%;
        }
        .user-profile-details {
            width: 100%;
            display: grid;
            grid-template-columns: 100%;
            row-gap: 10px;
        }
        .profile-info {
            width: 100%;
            display: grid;
            grid-template-columns: 33% 65%;
            column-gap: 2%;
            justify-content: flex-start;
        }
        .profile-info span:nth-child(1) {
            font-weight: bold;
            color: gray;
        }
        .profile-info span:nth-child(2) {
            font-weight: bold;
            color: black;
        }
        form.prof-edit-form {
            width: auto;
        }
        form.prof-edit-form button {
            color: #2A748F;
            font-size: 15px;
        }
        @media screen and (max-width: 1560px) {
            .page-wrapper {
                width: 900px;
            }
            .profile-section-wrapper {
                display: grid;
                grid-template-columns: 100%;
                row-gap: 50px;
            
                justify-content: left;
            }
        }
        @media screen and (max-width: 800px) {
            .page-wrapper {
                width: 90%;
                margin: 120px auto;
            }
            .user-profile {
                margin: 0 auto;
                padding: 20px 30px;
            }
        }
        @media screen and (max-width: 414px) {
            .user-profile {
                margin: 0 auto;
                padding: 20px 30px;
            }
        }
    </style>



<div class='page-wrapper'>

           
    <div class='profile-section-wrapper'>
        <?php          
            echo $user->show_user_profile($uid);      
        ?>
<?php 
        $request = new Request();              
        echo "<div id='requests'>";
            echo $request->show_requests_all('started', $uid);
            echo $request->show_requests_all('active', $uid);
        echo "</div>";
            
    } 
?>
    </div>
    

</div>


<?php
        }
    }
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
<?php include './partials/footer.php'; ?>
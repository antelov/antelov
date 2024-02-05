<?php include './partials/header.php'; ?>
<?php include './partials/navigation.php'; ?>

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
            width: 100%;
            display: grid;
            grid-template-columns: 100%;
            row-gap: 50px;
           
            justify-content: left;
        }
    }
    @media screen and (max-width: 800px) {
        .page-wrapper {
            width: 600px;
        }
        .profile-section-wrapper {
            width: 600px;         
        }
        .user-profile {
            margin: 0 auto;
            padding: 20px 30px;
        }
    }
    @media screen and (max-width: 414px) {
        .page-wrapper {
            width: 350px;
        }
        .profile-section-wrapper {
            width: 350px;         
        }
        .user-profile {
            margin: 0 auto;
            padding: 20px 30px;
        }
    }
</style>



<div class='page-wrapper'>

           
    <div class='profile-section-wrapper'>
        <?php 
            if(isset($_SESSION['user'])) {           
                echo $user->show_user_profile($_GET['id']);
            }
        ?>
<?php 
    if(isset($_SESSION['user'])) {
      
        $uid = $user->get_uid();
        $user_status = $user->get_user_status();
        $account_status = $user->get_account_status() ;
        $account_type = $user->get_account_type();

        $profile_account_type = $user->profile_account_type($_GET['id']);

        $request = new Request();
        $bid = new Bid();

        if($profile_account_type == 'business') {
            echo "<div class='business-content'>";

            if($account_type == 'business') {       
                echo $bid->show_bids_by_business_id($uid);                
            }

            $review = new Review();
            echo $review->showReviews($_GET['id']);  

            echo "</div>";
        }                
        
        if($account_type == 'personal') {
            if ($uid == $_GET['id']) {
                echo "<div id='requests'>";
                    echo $request->show_requests_all('started', $uid);
                    echo $request->show_requests_all('active', $uid);
                echo "</div>";
            }
        }
    } 
?>
    </div>
    

</div>



<div id='popUpWrapper'></div>




<?php include './partials/footer.php'; ?>
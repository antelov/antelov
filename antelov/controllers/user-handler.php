<?php
    include '../partials/functions.php';
    include '../Classes/Db.php';
    include '../Classes/User.php';

    $user = new User();

    
    if(isset($_POST['check_duplicate'])) {
        $user->check_duplicate_user($_POST['email']);
    }
    if(isset($_POST['update_user_profile'])) {
        $user->startSession();
        $userdata = json_decode($_SESSION['user'], true);
        $user->update_user($_POST['user_id'], $userdata['user_status'], $userdata['account_status'], $userdata['account_type']);
    }
    // if(isset($_POST['deactivation_user_id'])) {
    //     $user = new User();
    //     $user->deactivate_account($_POST['deactivation_user_id']);
    // }
    if(isset($_POST['delete_user_id'])) {
        $user->startSession();
        $user->delete_account($_POST['delete_user_id']);
    } 
    if(isset($_POST['validate_pass'])) {
        $user->check_pwd($_POST['old_pwd'], $_POST['pwd_user_id']);
    }
    if(isset($_POST['new_pwd'], $_POST['pwd_user_id'])) {
        $user->change_password($_POST['new_pwd'], $_POST['pwd_user_id']);
    }
    if(isset($_POST['pay_method'], $_POST['package'], $_POST['user_id'])) {
        $user->update_user_payment();
    }
?>
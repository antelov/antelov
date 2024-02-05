<?php
    include '../../partials/functions.php';
    include '../../Classes/Db.php';
    include '../../Classes/User.php';
    
    if(isset($_POST['status']) && isset($_POST['id'])) {
        $user = new User();
        $user->update_account_status($_POST['status'], $_POST['id']);
    }
    // if(isset($_POST['validate_pass'])) {
    //     $user = new User();
    //     $user->check_pwd($_POST['old_pwd'], $_POST['pwd_user_id']);
    // }
    // if(isset($_POST['new_pwd'])) {
    //     $user = new User();
    //     $user->change_password($_POST['new_pwd'], $_POST['pwd_user_id']);
    // }
?>
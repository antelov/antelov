<?php
    include '../partials/functions.php';
    include '../Classes/Db.php';
    include '../Classes/User.php';
    
    if(isset($_POST['create_account'])) {
        $user = new User();
        $user->create();
    }
?>
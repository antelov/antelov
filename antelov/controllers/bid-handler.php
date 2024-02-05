<?php
    include '../partials/functions.php';
    include '../Classes/Db.php';
    include '../Classes/Request.php';
    include '../Classes/Bid.php';
    
    if(isset($_POST['apply'])) {
        // var_dump($_POST);
        $bid = new Bid();
        $bid->startSession();
        $bid->apply();
    }
    if(isset($_POST['accept'])) {
        // var_dump($_POST);
        $bid = new Bid();
        $bid->startSession();
        $bid->accept($_POST['bidid']);
    }
?>
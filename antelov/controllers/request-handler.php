<?php
    include '../partials/functions.php';
    include '../Classes/Db.php';
    include '../Classes/Request.php';
    $request = new Request();
    if(isset($_POST['create_request'])) {
        $request->create();
    }
    if(isset($_POST['completed'])) {
        $request->completed($_POST['request_id']);
    }
    if(isset($_POST['cancelled'])) {
        $request->cancelled($_POST['request_id']);
    }
?>
<?php
// Localhost
$uriArray = array("", "site", "");
$scriptArray = array("", "site", "index.php");


// Logged in user
$userdata = array(
    'logged' => 1,
    'email' => $email,
    'user_status' => $user_status
);
$_SESSION['user'] = json_encode($userdata);

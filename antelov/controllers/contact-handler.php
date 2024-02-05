<?php
    include '../partials/functions.php';
    include '../Classes/Db.php';
    include '../Classes/Contact.php';

    if(isset($_POST['email'])) {
        $contact = new Contact();
        $contact->create();
    }
?>
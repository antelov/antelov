<?php
    include '../partials/functions.php';
    include '../Classes/Db.php';
    include '../Classes/Chat.php';

    if(isset($_POST['from_id']) && isset($_POST['to_id'])) {
        $chat = new Chat();
        $chat->create();
    }
    if(isset($_POST['id_1']) && isset($_POST['id_2'])) {
        $chat = new Chat();
        $chat->form($_POST['id_1'], $_POST['id_2']);
    }
?>
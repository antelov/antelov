<?php
    include '../Classes/Db.php';
    include '../Classes/Review.php';

    if(isset($_POST['send'])) {
        $review = new Review();
        $review->create();
    }
?>
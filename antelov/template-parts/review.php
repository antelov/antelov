
<?php
    include '../Classes/Db.php';  
    include '../Classes/Review.php';  
    $review = new Review();
    echo $review->review_popup($_POST['business_id']);      
?>


<?php include './partials/header.php'; ?>
<?php include './partials/navigation.php'; ?>


<div class='page-wrapper'>
    <?php include './template-parts/page/faq.php'; ?>
</div>





<script>
    $(".faq:nth-child(1) .question").addClass("active");
    $(".faq:nth-child(1) .question").siblings(".answer").slideDown(200);
    $(document).ready(function() {
        $(".question").on("click", function(e) {
            e.preventDefault();
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this).siblings(".answer").slideUp(200);
                // $(".set > a i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
            } else {
                // $(".set > a i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
                // $(this).find("i").removeClass("fa fa-angle-down").addClass("fa fa-angle-up");
                $(".question").removeClass("active");
                $(this).addClass("active");
                $(".answer").slideUp(200);
                $(this).siblings(".answer").slideDown(200);
            }
        });
    });
</script>

<?php include './partials/footer.php'; ?>
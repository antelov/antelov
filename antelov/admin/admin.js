$(document).ready(function() {
    $('.actions').on("click", function(e) {
        e.stopPropagation();
    });
    $('.pay-proof').on("click", function(e) {
        e.stopPropagation();
    });
    $(".profile-head").on("click", function(e) {
        e.preventDefault();
        if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).siblings(".profile-body").slideUp(200);
            $(this).find("i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
            $(this).css("background-color", "#fff");
        } else {
            // $(".profile-head > i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
            $(this).find("i").removeClass("fa fa-angle-down").addClass("fa fa-angle-up");
            $(".profile-head").removeClass("active");
            $(this).addClass("active");
            $(".profile-body").slideUp(200);
            $(this).siblings(".profile-body").slideDown(200);
            $(this).css("background-color", "rgb(249,249,249");
        }
    });
});

console.log('admin');

function change_status(pagename, status, id) {
    var loader = document.getElementById('loader');
    loader.classList.add('loader-animation');
    setTimeout(function(){ 
        $.ajax({
            url : '../admin/controllers/user-handler', // Url of backend (can be python, php, etc..)
            type: 'POST', // data type (can be get, post, put, delete)
            data : "status="+status+"&id="+id,
            async: false,
            success: function(response, textStatus, jqXHR) {
                // console.log(response);
                // loader.classList.remove('loader-animation');
                window.location.href = pagename;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }, 3000);
}
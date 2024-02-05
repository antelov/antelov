/* 
    Review
    revPopUp()
    ratingVal(id)
    validateReview(event)
*/
function revPopUp() {
    var business_id = document.getElementById('business_id').value;
    $.ajax({
        url : "./template-parts/review.php", // Url of backend (can be python, php, etc..)
        type: "POST", // data type (can be get, post, put, delete)
        // headers: {  'Access-Control-Allow-Origin': 'http://localhost/samba_jiu_jitsu/' },
        data : "business_id="+business_id+"&review=true", // data in json format
        async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
        success: function(response, textStatus, jqXHR) {
            console.log(response);
            // $('#comgate-container').html(response);
            $('#popUpWrapper').html(response);
            if(!bgOverlay.classList.contains('dark')) {
                if(bgOverlay.classList.contains('light')) {
                    bgOverlay.classList.remove('light');
                }
                bgOverlay.classList.add('dark');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        }
    });
}



bgOverlay.addEventListener('click', function() {
    var writeAReview = document.getElementById('write-a-review');
    if(typeof(writeAReview) != 'undefined' && writeAReview != null){
        writeAReview.parentNode.removeChild(writeAReview);
    }
    if(!bgOverlay.classList.contains('light')) {
        if(bgOverlay.classList.contains('dark')) {
            bgOverlay.classList.remove('dark');
        }
        bgOverlay.classList.add('light');
    }
});

function ratingVal(id) {
    var ratingStars = document.querySelectorAll('.rating-stars span');
    for (let i = 0; i < ratingStars.length; i++) {
        if(ratingStars[i].classList.contains('rated')) {
            ratingStars[i].classList.remove('rated');
        }
    }
    var idArr = id.split("-");
    var v = parseInt(idArr[1]);
    var ratingInput = document.getElementById('rating_input');
    
    ratingInput.value = v;
    console.log(v);
    for (let i = 0; i < v; i++) {
        if(!ratingStars[i].classList.contains('rated')) {
            ratingStars[i].classList.add('rated');
        } else {
            ratingStars[i].classList.remove('rated');
        }
    } 
}
function validateReview(event) {
    // Name
    var nameValue = document.getElementById('name').value;
    var nameError = document.getElementById('nameError');
    // Surname
    var surnameValue = document.getElementById('surname').value;
    var surnameError = document.getElementById('surnameError');
    // Surname
    var ratingValue = parseInt(document.getElementById('rating_input').value);
    var ratingError = document.getElementById('ratingError');
    if(nameValue && surnameValue && ratingValue > 0) {
        return;
    }else {
        if(nameValue) {
            nameError.innerHTML = '';
        } else {
            event.preventDefault();
            nameError.innerHTML = '<div>Name cannot be empty</div>';
        }
        if(surnameValue) {
            surnameError.innerHTML = '';
        } else {
            event.preventDefault();
            surnameError.innerHTML = '<div>Surname canont be empty</div>';
        }
        if(ratingValue > 0) {
            ratingError.innerHTML = '';
        } else {
            event.preventDefault();
            ratingError.innerHTML = '<div>Rate the product</div>';
        }
    }
}
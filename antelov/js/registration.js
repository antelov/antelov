var relationshipInput = document.getElementById('relationship');
var fullnameInput = document.getElementById('fullname');
var emailInput = document.getElementById('email');
var whatsappInput = document.getElementById('whatsapp');
var ageInput = document.getElementById('age');
var genderInput = document.getElementById('gender');
var descriptionInput = document.getElementById('description');
var emailError = document.getElementById('email-error');
var tosInput = document.getElementById('tos_agreement');

var maritalStatusInput = document.getElementById('marital_status');
var casteInput = document.getElementById('caste');
var educationInput = document.getElementById('education');
var occupationInput = document.getElementById('occupation');
var cityInput = document.getElementById('city');

var genderRadioGroup =  document.getElementById('gender-radio-group');
tosWrapper = document.getElementById('agreement-check-wrapper');

function fireButton(event) {
    event.preventDefault();
    document.getElementById('image').click()
}



// Preview Profile Photo
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#img-preview').attr('src', e.target.result);
            $('.choose-photo').css({"display":"none"});
            $('#selected-img').css({"display":"block"});
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image").change(function(){
    $allowed = ['png', 'jpg', 'jpeg', 'webp', 'jfif'];

    $imageSrc = document.getElementById('image').value;
    $imageSrcArr = $imageSrc.split('\\');
    $imgName = $imageSrcArr.at(-1);
    $imgNameArr = $imgName.split('.');
    $imgType = $imgNameArr.at(-1);

    if($imageSrc && $allowed.includes($imgType)) {
        readURL(this);
        document.getElementById('img-error').innerHTML = '';
        return;
    } else if (!$imageSrc) {
        document.getElementById('img-error').innerHTML = '';
        return;
    } else if (!$allowed.includes($imgType)) {
        document.getElementById('img-error').innerHTML = '<div class=error>Incorrent File Type</div>';
    }
});




if(typeof(fullnameInput) != 'undefined' && fullnameInput != null) {
    fullnameInput.addEventListener('change', function() {
        if(fullnameInput.value && fullnameInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
            fullnameInput.style.border = '1px solid rgb(255,130,9)';
            fullnameInput.style.backgroundColor = 'rgb(249,249,249)';
        } else {
            fullnameInput.style.border = '1px solid red';
            fullnameInput.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}

if(typeof(emailInput) != 'undefined' && emailInput != null) {
    emailInput.addEventListener('change', function() {
        if(emailInput.value && emailInput.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            emailInput.style.border = '1px solid rgb(255,130,9)';
            emailInput.style.backgroundColor = 'rgb(249,249,249)';
        } else {
            emailInput.style.border = '1px solid red';
            emailInput.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
if(typeof(whatsappInput) != 'undefined' && whatsappInput != null) {
    whatsappInput.addEventListener('change', function() {
        if(whatsappInput.value && whatsappInput.value.match(/^[0-9]*$/) && whatsappInput.value.length >= 10) {
            whatsappInput.style.backgroundColor = 'rgb(249,249,249)';
            whatsappInput.style.border = '1px solid rgb(255,130,9)';
        } else {
            whatsappInput.style.border = '1px solid red';
            whatsappInput.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
if(typeof(ageInput) != 'undefined' && ageInput != null) {
    ageInput.addEventListener('change', function() {
        if(ageInput.value && (ageInput.value >= 18 && ageInput.value <= 80)) {
            ageInput.style.backgroundColor = 'rgb(249,249,249)';
            ageInput.style.border = '1px solid rgb(255,130,9)';
        } else {
            ageInput.style.border = '1px solid red';
            ageInput.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
if(typeof(descriptionInput) != 'undefined' && descriptionInput != null) {
    descriptionInput.addEventListener('change', function() {
        // document.getElementById('descCount').innerHTML = descriptionInput.value.length + '/200';
        if(descriptionInput.value && descriptionInput.value.length <= 200) {
            descriptionInput.style.backgroundColor = 'rgb(249,249,249)';
            descriptionInput.style.border = '1px solid rgb(255,130,9)';
        } else {
            descriptionInput.style.border = '1px solid red';
            descriptionInput.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
if(typeof(casteInput) != 'undefined' && casteInput != null) {
    casteInput.addEventListener('change', function() {
        if(casteInput.value && casteInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
            casteInput.style.border = '1px solid rgb(255,130,9)';
            casteInput.style.backgroundColor = 'rgb(249,249,249)';
        } else {
            casteInput.style.border = '1px solid red';
            casteInput.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
if(typeof(occupationInput) != 'undefined' && occupationInput != null) {
    occupationInput.addEventListener('change', function() {
        if(occupationInput.value && occupationInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
            occupationInput.style.border = '1px solid rgb(255,130,9)';
            occupationInput.style.backgroundColor = 'rgb(249,249,249)';
        } else {
            occupationInput.style.border = '1px solid red';
            occupationInput.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
if(typeof(tosInput) != 'undefined' && tosInput != null) {
    tosInput.addEventListener('change', function() {
        if(tosInput.checked) {
            tosWrapper.style.padding = '0';
            tosWrapper.style.border = 'none';
            tosWrapper.style.backgroundColor = 'rgb(255,255,255)';
        } else {
            tosWrapper.style.padding = '2px 10px';
            tosWrapper.style.border = '1px solid red';
            tosWrapper.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}






function hideCards() {
    var cardNodelist = document.querySelectorAll('.form-card');   
    for (let i = 0; i < cardNodelist.length; i++) {
        cardNodelist[i].style.position = 'absolute';
        cardNodelist[i].style.zIndex = -10;
        cardNodelist[i].style.opacity = 0;
    }
}



document.getElementById('form-card-1').style.position = 'static';
document.getElementById('form-card-1').style.opacity = 1;

function toggleCards(id) {
    var idArr = id.split('-');
    cardNo = idArr[1];
    direction = idArr[2];
    console.log(cardNo, direction);

    
    var card1 = document.getElementById('form-card-1');
    var card2 = document.getElementById('form-card-2');
    var card3 = document.getElementById('form-card-3');
    var card4 = document.getElementById('form-card-4');


    if(cardNo == 1 && direction == 'next') {
        // Validate Inputs
        if(
            relationshipInput.value &&
            emailInput.value && emailInput.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && 
            emailError.innerHTML == '' &&
            whatsappInput.value && whatsappInput.value.match(/^[0-9]*$/) && whatsappInput.value.length >= 10 &&
            fullnameInput.value && fullnameInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/) &&
            tosInput.checked
        ) {
            hideCards();
            console.log(emailError.innerHTML);
            card2.style.position = 'static';
            card2.style.opacity = 1;
            return;
        } else {
            if(relationshipInput.value) {
                document.getElementById('relationshipTrigger').style.border = '1px solid rgb(255,130,9)';
                document.getElementById('relationshipTrigger').style.backgroundColor = 'rgb(249,249,249)';
            } else {
                document.getElementById('relationshipTrigger').style.border = '1px solid red';
                document.getElementById('relationshipTrigger').style.backgroundColor = 'rgb(254,220,224)';
            }
            if(fullnameInput.value && fullnameInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                fullnameInput.style.border = '1px solid rgb(255,130,9)';
                fullnameInput.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                fullnameInput.style.border = '1px solid red';
                fullnameInput.style.backgroundColor = 'rgb(254,220,224)';
            }     
            if(emailInput.value && emailInput.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                emailInput.style.border = '1px solid rgb(255,130,9)';
                emailInput.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                emailInput.style.border = '1px solid red';
                emailInput.style.backgroundColor = 'rgb(254,220,224)';
            }
            if(whatsappInput.value && whatsappInput.value.match(/^[0-9]*$/) && whatsappInput.value.length >= 10) {
                whatsappInput.style.border = '1px solid rgb(255,130,9)';
                whatsappInput.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                whatsappInput.style.border = '1px solid red';
                whatsappInput.style.backgroundColor = 'rgb(254,220,224)';
            }
            if(tosInput.checked) {
                tosWrapper.style.padding = '0';
                tosWrapper.style.border = 'none';
                tosWrapper.style.backgroundColor = 'rgb(255,255,255)';
            } else {
                tosWrapper.style.padding = '2px 10px';
                tosWrapper.style.border = '1px solid red';
                tosWrapper.style.backgroundColor = 'rgb(254,220,224)';
            }
            return;
        }
    }
    if(cardNo == 2 && direction == 'next') {
        // Validate Inputs
        if(
            genderInput.value &&
            ageInput.value && (ageInput.value >= 18 && ageInput.value <= 80) &&
            descriptionInput.value && descriptionInput.value.length <= 200
        ) {
            hideCards();
            card3.style.position = 'static';
            card3.style.opacity = 1;
            return;
        } else {
            if(genderInput.value) {
                genderRadioGroup.style.padding = '0';
                genderRadioGroup.style.borderRadius = '0';
                genderRadioGroup.style.border = 'none';
                genderRadioGroup.style.backgroundColor = 'rgb(255,255,255)';
            } else {
                genderRadioGroup.style.padding = '2px 10px';
                genderRadioGroup.style.borderRadius = '8px';
                genderRadioGroup.style.border = '1px solid red';
                genderRadioGroup.style.backgroundColor = 'rgb(254,220,224)';
            }
            if(ageInput.value && (ageInput.value >= 18 && ageInput.value <= 80)) {
                ageInput.style.border = '1px solid rgb(255,130,9)';
                ageInput.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                ageInput.style.border = '1px solid red';
                ageInput.style.backgroundColor = 'rgb(254,220,224)';
            }
            if(descriptionInput.value && descriptionInput.value.length <= 200) {
                descriptionInput.style.backgroundColor = 'rgb(249,249,249)';
                descriptionInput.style.border = '1px solid rgb(255,130,9)';
            } else {
                descriptionInput.style.border = '1px solid red';
                descriptionInput.style.backgroundColor = 'rgb(254,220,224)';
            }
                
            return;
        }
    }
    if(cardNo == 3 && direction == 'next') {
        // console.log(maritalStatusInput.value, casteInput.value, educationInput.value, occupationInput.value, cityInput.value);
        // Validate Inputs
        if(
            maritalStatusInput.value && 
            casteInput.value && casteInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/) && 
            educationInput.value && 
            occupationInput.value && occupationInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/) && 
            cityInput.value
        ) {
            hideCards();
            card4.style.position = 'static';
            card4.style.opacity = 1;
            return;
        } else {
            if(casteInput.value && casteInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                casteInput.style.border = '1px solid rgb(255,130,9)';
                casteInput.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                casteInput.style.border = '1px solid red';
                casteInput.style.backgroundColor = 'rgb(254,220,224)';
            }
            if(occupationInput.value && occupationInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                occupationInput.style.border = '1px solid rgb(255,130,9)';
                occupationInput.style.backgroundColor = 'rgb(255,255,255)';
            } else {
                occupationInput.style.border = '1px solid red';
                occupationInput.style.backgroundColor = 'rgb(254,220,224)';
            }
            if(cityInput.value) {
                document.getElementById('cityTrigger').style.border = '1px solid rgb(255,130,9)';
                document.getElementById('cityTrigger').style.backgroundColor = 'rgb(249,249,249)';
            } else {
                document.getElementById('cityTrigger').style.border = '1px solid red';
                document.getElementById('cityTrigger').style.backgroundColor = 'rgb(254,220,224)';
            }
            if(educationInput.value) {
                document.getElementById('educationTrigger').style.border = '1px solid rgb(255,130,9)';
                document.getElementById('educationTrigger').style.backgroundColor = 'rgb(249,249,249)';
            } else {
                document.getElementById('educationTrigger').style.border = '1px solid red';
                document.getElementById('educationTrigger').style.backgroundColor = 'rgb(254,220,224)';
            }
            if(maritalStatusInput.value) {
                document.getElementById('maritalStatusTrigger').style.border = '1px solid rgb(255,130,9)';
                document.getElementById('maritalStatusTrigger').style.backgroundColor = 'rgb(249,249,249)';
            } else {
                document.getElementById('maritalStatusTrigger').style.border = '1px solid red';
                document.getElementById('maritalStatusTrigger').style.backgroundColor = 'rgb(254,220,224)';
            }
            return;
        }
    }
    if(cardNo == 2 && direction == 'back') {
        hideCards();
        card1.style.position = 'static';
        card1.style.opacity = 1;
    }
    if(cardNo == 3 && direction == 'back') {
        hideCards();
        card2.style.position = 'static';
        card2.style.opacity = 1;
    }
    if(cardNo == 4 && direction == 'back') {
        hideCards();
        card3.style.position = 'static';
        card3.style.opacity = 1;
    }
    
    if(cardNo == 4 && direction == 'next') {
        var loader = document.getElementById('loader');
        loader.classList.add('loader-animation');
        setTimeout(function(){ 
            var form = $('form')[0];
            var formData = new FormData(form);
            $.ajax({
                url : './controllers/registration-handler.php',
                type: 'POST', 
                data : formData,
                cache : false,
                contentType: false,
                processData: false,
                success: function(response, textStatus, jqXHR) {
                    // console.log('success');
                    window.location.href = './confirmation';
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }, 2000);
    }
}

function radioVal(radioVal) {
    var genderInput = document.getElementById('gender');
    var femaleRadio = document.getElementById('gender-female');
    var maleRadio = document.getElementById('gender-male');

    genderRadioGroup.style.padding = '0';
    genderRadioGroup.style.borderRadius = '0';
    genderRadioGroup.style.border = 'none';
    genderRadioGroup.style.backgroundColor = 'rgb(255,255,255)';

    if(radioVal == 'male') {
        femaleRadio.checked = false;
        maleRadio.checked = true;
        genderInput.value = 'male';
        return;
    }
    if(radioVal == 'female') {
        maleRadio.checked = false;
        femaleRadio.checked = true;
        genderInput.value = 'female';
        return;
    }
}




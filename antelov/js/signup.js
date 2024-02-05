/*
    Signup
*/
var accountTypeInp = document.getElementById('account_type');
var fnameInp = document.getElementById('fname');
var lnameInp = document.getElementById('lname');
var ageInp = document.getElementById('age');
var emailInp = document.getElementById('email');
var emailError = document.getElementById('emailError');
var phoneInp = document.getElementById('phone');
var addressInp = document.getElementById('address');
var pwdInp = document.getElementById('password')
var repeatPwdInp = document.getElementById('repeat_password');
var tosInp = document.getElementById('tos_agreement');

var business_name = document.getElementById('business_name'); 
var business_email = document.getElementById('business_email'); 
var business_phone = document.getElementById('business_phone'); 
var business_password = document.getElementById('business_password');
var repeat_business_password = document.getElementById('repeat_business_password');
var business_address = document.getElementById('business_address');




function hideCards() {
    var cardNodelist = document.querySelectorAll('.form-card');   
    for (let i = 0; i < cardNodelist.length; i++) {
        cardNodelist[i].style.position = 'absolute';
        cardNodelist[i].style.zIndex = -10;
        cardNodelist[i].style.opacity = 0;
    }
}
hideCards();
document.getElementById('form-card-1').style.position = 'static';
document.getElementById('form-card-1').style.opacity = 1;

var remove_btn = document.getElementById('remove_btn');
var upload_btn = document.getElementById('upload_btn');

var def_photo = document.getElementById('default-photo');
var def_photo_src = document.getElementById('default-photo').src;

var preview_img = document.getElementById('pfp-img-preview');
var preview_img_src = document.getElementById('pfp-img-preview').src;

if(def_photo_src.endsWith('avi.png')) {
    remove_btn.style.display = 'none';
    upload_btn.style.display = 'flex';
} else {
    remove_btn.style.display = 'flex';
    upload_btn.style.display = 'none';
}
function fireButton(event) {
    event.preventDefault();
    document.getElementById('image').click();
}
function readPfpURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#pfp-img-preview').attr('src', e.target.result);
            def_photo.style.display = 'none';
            preview_img.style.display = 'flex';
            remove_btn.style.display = 'flex';
            upload_btn.style.display = 'none';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#image").change(function(){
    readPfpURL(this);
});
function removeImg(event) {
    event.preventDefault();
    $('#pfp-img-preview').attr('src', preview_img_src);
    $('#default-photo').attr('src', './img/avi.png');

    remove_btn.style.display = 'none';
    upload_btn.style.display = 'flex';
    def_photo.style.display = 'flex';
    preview_img.style.display = 'none';

    document.getElementById('image').value = null;
}
function radioVal(radioVal) {
    var accountInput = document.getElementById('account_type');
    var businessRadio = document.getElementById('business');
    var personalRadio = document.getElementById('personal');



    if(radioVal == 'business') {
        personalRadio.checked = false;
        businessRadio.checked = true;
        accountInput.value = 'business';

        fnameInp.value = '';
        lnameInp.value = '';
        ageInp.value = '';
        emailInp.value = '';
        phoneInp.value = '';
        addressInp.value = '';
        pwdInp.value = '';
        repeatPwdInp.value = '';
        tosInp.checked = false;

        hideCards();
        document.getElementById('form-card-2').style.position = 'static';
        document.getElementById('form-card-2').style.opacity = 1;
        return;
    }
    if(radioVal == 'personal') {
        businessRadio.checked = false;
        personalRadio.checked = true;
        accountInput.value = 'personal';

        business_name.value = ''; 
        business_email.value = '';
        business_phone.value = '';
        business_password.value = '';
        repeat_business_password.value = '';
        business_address.value = '';
        tosInp.checked = false;

        hideCards();
        document.getElementById('form-card-1').style.position = 'static';
        document.getElementById('form-card-1').style.opacity = 1;
        return;
    }
}
function validateSignUp(event) {
    event.preventDefault();
    if(accountTypeInp.value == 'personal') {
        if(
            accountTypeInp.value && 
            emailInp.value && emailInp.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && 
            emailError.innerHTML == '' &&
            (!ageInp.value || (ageInp.value >= 5 && ageInp.value <= 200)) &&
            phoneInp.value && phoneInp.value.match(/^[0-9]*$/) && phoneInp.value.length >= 10 &&
            fnameInp.value && fnameInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/) &&
            lnameInp.value && lnameInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/) &&
            pwdInp.value && repeatPwdInp.value && 
            pwdInp.value == repeatPwdInp.value &&
            addressInp &&
            tosInp.checked
        ) {
            var loader = document.getElementById('loader');
            loader.classList.add('loader-animation');
            setTimeout(function(){ 
                var form = $('form.signup-form')[0];
                var formData = new FormData(form);
                $.ajax({
                    url : './controllers/registration-handler.php',
                    type: 'POST', 
                    data : formData,
                    async: false,
                    cache : false,
                    contentType: false,
                    processData: false,
                    success: function(response, textStatus, jqXHR) {
                        // console.log(response);
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
        } else {
            event.preventDefault();
            if(typeof(emailInp) != 'undefined' && emailInp != null) {
                if(emailInp.value && emailInp.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                    emailInp.style.border = '1px solid rgb(255,130,9)';
                    emailInp.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    emailInp.style.border = '1px solid red';
                    emailInp.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(ageInp) != 'undefined' && ageInp != null) {
                if(ageInp.value) {
                    if(ageInp.value >= 5 && ageInp.value <= 200) {
                        ageInp.style.backgroundColor = 'rgb(249,249,249)';
                        ageInp.style.border = '1px solid rgb(255,130,9)';
                    } else {
                        ageInp.style.border = '1px solid red';
                        ageInp.style.backgroundColor = 'rgb(254,220,224)';
                    }
                }
            }
            if(typeof(phoneInp) != 'undefined' && phoneInp != null) {
                if(phoneInp.value && phoneInp.value.match(/^[0-9]*$/) && phoneInp.value.length >= 10) {
                    phoneInp.style.backgroundColor = 'rgb(249,249,249)';
                    phoneInp.style.border = '1px solid rgb(255,130,9)';
                } else {
                    phoneInp.style.border = '1px solid red';
                    phoneInp.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(fnameInp) != 'undefined' && fnameInp != null) {
                if(fnameInp.value && fnameInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    fnameInp.style.border = '1px solid rgb(255,130,9)';
                    fnameInp.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    fnameInp.style.border = '1px solid red';
                    fnameInp.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(lnameInp) != 'undefined' && lnameInp != null) {
                if(lnameInp.value && lnameInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    lnameInp.style.border = '1px solid rgb(255,130,9)';
                    lnameInp.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    lnameInp.style.border = '1px solid red';
                    lnameInp.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(pwdInp) != 'undefined' && pwdInp != null) {
                if(pwdInp.value && pwdInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    pwdInp.style.border = '1px solid rgb(255,130,9)';
                    pwdInp.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    pwdInp.style.border = '1px solid red';
                    pwdInp.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(repeatPwdInp) != 'undefined' && repeatPwdInp != null) {
                if(repeatPwdInp.value && repeatPwdInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    repeatPwdInp.style.border = '1px solid rgb(255,130,9)';
                    repeatPwdInp.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    repeatPwdInp.style.border = '1px solid red';
                    repeatPwdInp.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(addressInp) != 'undefined' && addressInp != null) {
                if(addressInp.value && addressInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    addressInp.style.border = '1px solid rgb(255,130,9)';
                    addressInp.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    addressInp.style.border = '1px solid red';
                    addressInp.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
        }
    } else if(accountTypeInp.value && accountTypeInp.value == 'business') {
        if(
            accountTypeInp.value && 
            business_email.value && business_email.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && 
            // emailError.innerHTML == '' &&
            business_phone.value && business_phone.value.match(/^[0-9]*$/) && business_phone.value.length >= 10 &&
            business_name.value && business_name.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/) &&
            business_password.value && repeat_business_password.value && 
            business_password.value == repeat_business_password.value &&
            addressInp &&
            tosInp.checked
        ) {
            var loader = document.getElementById('loader');
            loader.classList.add('loader-animation');
            setTimeout(function(){ 
                var form = $('form')[0];
                var formData = new FormData(form);
                $.ajax({
                    url : './controllers/registration-handler.php',
                    type: 'POST', 
                    data : formData,
                    // async: false,
                    cache : false,
                    contentType: false,
                    processData: false,
                    success: function(response, textStatus, jqXHR) {
                        window.location.href = './confirmation';
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);
                        console.log(textStatus);
                        console.log(errorThrown);
                    }
                });
            }, 2000);
        } else {
            event.preventDefault();
            if(typeof(business_email) != 'undefined' && business_email != null) {
                if(business_email.value && business_email.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                    business_email.style.border = '1px solid rgb(255,130,9)';
                    business_email.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    business_email.style.border = '1px solid red';
                    business_email.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(business_phone) != 'undefined' && business_phone != null) {
                if(business_phone.value && business_phone.value.match(/^[0-9]*$/) && business_phone.value.length >= 10) {
                    business_phone.style.backgroundColor = 'rgb(249,249,249)';
                    business_phone.style.border = '1px solid rgb(255,130,9)';
                } else {
                    business_phone.style.border = '1px solid red';
                    business_phone.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(business_name) != 'undefined' && business_name != null) {
                if(business_name.value && business_name.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    business_name.style.border = '1px solid rgb(255,130,9)';
                    business_name.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    business_name.style.border = '1px solid red';
                    business_name.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(business_password) != 'undefined' && business_password != null) {
                if(business_password.value && business_password.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    business_password.style.border = '1px solid rgb(255,130,9)';
                    business_password.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    business_password.style.border = '1px solid red';
                    business_password.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(repeat_business_password) != 'undefined' && repeat_business_password != null) {
                if(repeat_business_password.value && repeat_business_password.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    repeat_business_password.style.border = '1px solid rgb(255,130,9)';
                    repeat_business_password.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    repeat_business_password.style.border = '1px solid red';
                    repeat_business_password.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
            if(typeof(business_address) != 'undefined' && business_address != null) {
                if(business_address.value && business_address.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                    business_address.style.border = '1px solid rgb(255,130,9)';
                    business_address.style.backgroundColor = 'rgb(249,249,249)';
                } else {
                    business_address.style.border = '1px solid red';
                    business_address.style.backgroundColor = 'rgb(254,220,224)';
                }
            }
        }
    }
    // else {
    //     // accountTypeInp.style.border = '1px solid red';
    //     // accountTypeInp.style.backgroundColor = 'rgb(254,220,224)';
    // }

    
}
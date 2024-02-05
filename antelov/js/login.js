/*
    Login
*/
var emailInp = document.getElementById('email');
var emailError = document.getElementById('emailError');
var pwdInp = document.getElementById('password');

if(typeof(emailInp) != 'undefined' && emailInp != null) {
    emailInp.addEventListener('change', function() {
        if(emailInp.value && emailInp.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
            emailInp.style.border = '1px solid rgb(255,130,9)';
            emailInp.style.backgroundColor = 'rgb(249,249,249)';
        } else {
            emailInp.style.border = '1px solid red';
            emailInp.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
if(typeof(pwdInp) != 'undefined' && pwdInp != null) {
    pwdInp.addEventListener('change', function() {
        if(pwdInp.value && pwdInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
            pwdInp.style.border = '1px solid rgb(255,130,9)';
            pwdInp.style.backgroundColor = 'rgb(249,249,249)';
        } else {
            pwdInp.style.border = '1px solid red';
            pwdInp.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}
function validateLogin(event) {
    event.preventDefault();
    if(
        emailInp.value && 
        emailInp.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && 
        pwdInp.value
    ) {
        var loader = document.getElementById('loader');
        loader.classList.add('loader-animation');
        setTimeout(function(){ 
            var form = $('form.login-form')[0];
            var formData = new FormData(form);
            $.ajax({
                url : './controllers/login-handler',
                type: 'POST', 
                data : formData,
                async: false,
                cache : false,
                contentType: false,
                processData: false,
                success: function(response, textStatus, jqXHR) {
                    var statusArr = response.split('=');
                    var s = statusArr[1];
                    loader.classList.remove('loader-animation');
                    console.log(response);
                    if(s == '1') {
                        window.location.href = './admin/personal';                  
                    } else if(s == '2') {
                        window.location.href = './';
                    }  else if(s == '0') {
                        document.getElementById('msg-response').innerHTML = "<div class=error>Invalid email or password</div>";
                    } else if(s == '00') {
                        document.getElementById('msg-response').innerHTML = "<div class=error>Invalid email or password</div>";
                    } else if(s == '000') {
                        document.getElementById('msg-response').innerHTML = "<div class=error>Account is not verified</div>";
                    } else if(s == '0000') {
                        document.getElementById('msg-response').innerHTML = "<div class=error>Unknown error</div>";
                    }
                    // console.log(response);
                    // console.log('success');
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
        if(typeof(pwdInp) != 'undefined' && pwdInp != null) {
            if(pwdInp.value && pwdInp.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                pwdInp.style.border = '1px solid rgb(255,130,9)';
                pwdInp.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                pwdInp.style.border = '1px solid red';
                pwdInp.style.backgroundColor = 'rgb(254,220,224)';
            }
        }
    }
}
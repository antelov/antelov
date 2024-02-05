<div class='page-wrapper' id='page-wrapper-contact'>
    <div id='contact-form-wrapper'>
        <div id='contact'>
            <div class='form-header'>
                <div class='form-heading'>
                    <h3>Contact Us</h3>
                </div>
                <div class='form-subheading'>
                    <p>Sed do eiusmod tempor incididunt ut labore et dolore</p>
                </div>
            </div>
        
            <form onsubmit='return validateContact(event)' autocomplete='off' action='' id='contactForm' class='contact' method='POST'>
                <div class='name-inputs'>
                    <div class='input-group'>
                        <input type='text' class='fname' name='fname' id='fname' placeholder='FIRST NAME'>
                        <div class='error' id='fnameError'></div>
                    </div>
                    <div class='input-group'>
                        <input type='text' class='lname' name='lname' id='lname' placeholder='LAST NAME'>
                        <div class='error' id='lnameError'></div>
                    </div>
                </div>
                <div class='input-group'>
                    <input type='text' class='email' name='email' id='email' placeholder='EMAIL'>
                    <div class='error' id='emailError'></div>
                </div>
                <!-- <div class='input-group'>
                    <input type='number' class='phone' name='phone' id='phone' placeholder='PHONE'>
                    <div class='error' id='phoneError'></div>
                </div> -->
                <div class='input-group'>
                    <textarea name='msg' id='msg' cols='30' rows='12' placeholder='MESSAGE'></textarea>
                    <div class='error' id='msgError'></div>
                </div>
                <div class='input-group'>
                    <input type='submit' class='send' name='send' value='Send Message'>
                </div>
                <div id='msg-response'>

                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function validateContact(event) {
        // Name
        var fnameValue = document.getElementById('fname').value;
        var fnameError = document.getElementById('fnameError');
        // Surname
        var lnameValue = document.getElementById('lname').value;
        var lnameError = document.getElementById('lnameError');
        // Email
        var emailValue = document.getElementById('email').value;
        var emailError = document.getElementById('emailError');
        // // Phone
        // var phoneValue = document.getElementById('phone').value;
        // var phoneError = document.getElementById('phoneError');
        // Message
        var msgValue = document.getElementById('msg').value;
        var msgError = document.getElementById('msgError');

        if(emailValue && emailValue.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/) && fnameValue && lnameValue) {
            event.preventDefault();
            $.ajax({
                url : "./controllers/contact-handler", // Url of backend (can be python, php, etc..)
                type: "POST", // data type (can be get, post, put, delete)
                // headers: {  'Access-Control-Allow-Origin': 'http://localhost/samba_jiu_jitsu/' },
                data : $('#contactForm').serialize(), // data in json format
                async : false, // enable or disable async (optional, but suggested as false if you need to populate data afterwards)
                success: function(response, textStatus, jqXHR) {
                    console.log(response);
                    // $('#comgate-container').html(response);
                    $('#msg-response').html(response);
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        } else {
            if(emailValue && emailValue.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                emailError.innerHTML = '';
            } else {
                if(!emailValue) {
                    event.preventDefault();
                    emailError.innerHTML = '<div>*Required</div>';
                } else {
                    event.preventDefault();
                    emailError.innerHTML = '<div>Please enter a valid email</div>';
                }
            }
            // if(phoneValue) {
            //     phoneError.innerHTML = '';
            // } else {
            //     event.preventDefault();
            //     phoneError.innerHTML = '<div>*Required</div>';
            // }

            if(fnameValue) {
                fnameError.innerHTML = '';
            } else {
                event.preventDefault();
                fnameError.innerHTML = '<div>*Required</div>';
            }
            if(lnameValue) {
                lnameError.innerHTML = '';
            } else {
                event.preventDefault();
                lnameError.innerHTML = '<div>*Required</div>';
            }
        }
    }
</script>

<div class='page-wrapper' id='page-wrapper-signup'>
    <div class='page' id='signup-page'>
        <!-- <div class='page-title'>
            <h1>Sign Up</h1>
        </div> -->
        <div class='page-content'>
            <div class='content-inner-div'>
                
                <div id='signUp'>
                    <div class='form-header'>
                        <div class='form-heading'>
                            <h3>Join Antelov</h3>
                        </div>
                        <div class='form-subheading'>
                            <p>Sed do eiusmod tempor incididunt ut labore et dolore</p>
                        </div>
                    </div>
                    
                    <form onsubmit='return validateSignUp(event)' autocomplete='off' action='' runat='server' class='signup-form' method='POST'>                 
                        <input type="hidden" name='create_account' id='create_account' value='true'>
                        <div class='input-row'>
                            <div class='radio-group'>
                                <input type="hidden" name='account_type' id='account_type'>
                                <p>
                                    <input onchange='radioVal(this.value)' type='radio' value='personal' id='personal'> Personal
                                </p>
                                <p>
                                    <input onchange='radioVal(this.value)' type='radio' value='business' id='business'> Business
                                </p>
                            </div>
                        </div> 
                        <div id='pfp-group'>
                            <div class='pfp-placeholder'>
                                <img id='default-photo' src='./img/avi.png' alt=''>
                                <img id='pfp-img-preview' src='#' alt='your image' />
                            </div>                 
                            <div id='upload-btns'>
                                <button id='upload_btn' onclick='return fireButton(event);'><i class="fas fa-upload"></i></button>       
                                <input class='input' id='image' type='file' name='image' value='' style='display: none;'>
                                <button id='remove_btn' onclick='return removeImg(event);'>X</button>
                            </div> 
                        </div>
                        <div class='form-cards'>
                            <div class='form-card' id='form-card-1'>
                                <div class='input-group-row'>
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
                                <div class='input-group'>
                                    <input type='number' class='phone' name='phone' id='phone' placeholder='PHONE'>
                                    <div class='error' id='phoneError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='number' step='1' min="18" max='80' class='age' name='age' id='age' placeholder='AGE'>
                                    <div class='error' id='ageError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='password' class='password' name='password' id='password' placeholder='PASSWORD'>
                                    <div class='error' id='pwdError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='password' class='repeat_password' name='repeat_password' id='repeat_password' placeholder='REPEAT PASSWORD'>
                                    <div class='error' id='repeatPwdError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='text' class='address' name='address' id='address' placeholder='Address'>
                                    <div class='error' id='addressError'></div>
                                </div>
                            </div>
                            <div class='form-card' id='form-card-2'>
                                <div class='input-group'>
                                    <input type='text' class='business_name' name='business_name' id='business_name' placeholder='BUSINESS NAME'>
                                    <div class='error' id='businessNameError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='text' class='business_email' name='business_email' id='business_email' placeholder='EMAIL'>
                                    <div class='error' id='businessemailError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='number' class='business_phone' name='business_phone' id='business_phone' placeholder='PHONE'>
                                    <div class='error' id='businessphoneError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='password' class='business_password' name='business_password' id='business_password' placeholder='PASSWORD'>
                                    <div class='error' id='businessPwdError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='password' class='repeat_business_password' name='repeat_business_password' id='repeat_business_password' placeholder='REPEAT PASSWORD'>
                                    <div class='error' id='businessRepeatPwdError'></div>
                                </div>
                                <div class='input-group'>
                                    <input type='text' class='business_address' name='business_address' id='business_address' placeholder='Address'>
                                    <div class='error' id='businessAddressError'></div>
                                </div>
                            </div>
                        </div>
                        <!-- TOS Agreement -->
                        <div id="tos">
                            <div class='tos-inner'>
                                <input class='input' id='tos_agreement' type='checkbox' name='tos_agreement'>
                                <div class='tos-link'>
                                    I agree to the
                                    <a href='./terms-of-service' target='_blank'>Terms & Conditions</a>
                                </div>
                            </div>
                            <div class="error" id="agreementError"></div>
                        </div>
                        <div class='input-group'>
                            <input type='submit' class='send' name='send' value='CREATE MY ACCOUNT'>
                        </div>
                        <div class='signin-link'>
                            <a href="./login">Already have an account? Sign in</a>
                        </div>
                        <div id='msg-response'>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


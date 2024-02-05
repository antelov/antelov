<style>
    #signup-page {
        padding: 100px 0 100px 0;
        display: flex;
        flex-flow: column nowrap;
        row-gap: 50px;
        background-color: #fff;
    }
    #signup-page .page-content {
        width: 700px;
        margin: 0 auto;
    }
    #signup-page .content-inner-div {
        display: flex;
        flex-flow: column nowrap;
        justify-content: center;
        align-items: center;
        row-gap: 20px;
    }
    /* Form */
    #signUp {
        width: 100%;
        display: flex;
        flex-flow: column nowrap;
        row-gap: 10px;
    }
    #signUp form {
        width: 100%;
        margin: 0 auto;
    }
    #signUp input[type="text"],
    #signUp input[type="number"],
    #signUp input[type="date"],
    #signUp input[type="password"] {
        background-color: rgb(250,250,250);
        border: 1px solid #b2b2b2;
        border-radius: 8px;
        height: 50px !important;
    }
    #signUp input[type="submit"] {
        background-color: var(--btn-bg);
        font-size: 18px;
        letter-spacing: 3px;
        height: 50px;
    }
    @media screen and (max-width: 800px) {
        #signup-page .page-content {
            width: 600px;
        }
    }
    @media screen and (max-width: 414px) {
        #signup-page .page-content {
            width: 350px;
        }
    }

</style>
<div class='page-wrapper' id='page-wrapper-login'>
    <div class='page' id='login-page'>
        <!-- <div class='page-title'>
            <h1>Sign Up</h1>
        </div> -->
        <div class='page-content'>
            <div class='content-inner-div'>
                
                <div id='signUp'>
                    <div class='form-header'>
                        <div class='form-heading'>
                            <h3>Login</h3>
                        </div>
                    </div>
                    <form onsubmit='return validateLogin(event)' autocomplete='off' id='signUpForm' class='login-form' method='POST'>                 
                        
                        <div class='input-group'>
                            <input type='text' class='email' name='email' id='email' placeholder='EMAIL'>
                            <div class='error' id='emailError'></div>
                        </div>
                        <div class='input-group'>
                            <input type='password' class='password' name='password' id='password' placeholder='PASSWORD'>
                            <div class='error' id='pwdError'></div>
                        </div>
                        <div class='input-group'>
                            <input type='submit' class='send' name='send' value='Sign In'>
                        </div>
                        <div id='msg-response'>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


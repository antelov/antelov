
<div id='loader'></div>
<div id='popup-wrapper'></div>
<div id='popBg' onclick='hidePopupBg()'></div>



<footer class='footer-main'>
    <div class='footer-inner-div'>
        <div class='footer-row-wrapper'>
            <div class='footer-row' id='footer-row-1'>
                <div class='footer-col' id='footer-col-1'>
                    <div class="logo">                
                        <div class='logo-text'>
                            <a href="./">
                                <!-- Antelov -->
                                <!-- Logo Here -->
                                <img src="./img/6.png" alt="">
                                <!-- <img src="./img/logo.png" alt=""> -->
                            </a>
                        </div>
                    </div>
                    <div class='socials'>
                        <div title='facebook' class='social' id='social-1'>
                            <a href="https://www.facebook.com/"></a>
                        </div>
                        <!-- <div class='social' id='social-2'>
                            <a href="https:/twitter.com"></a>
                        </div> -->
                        <div title='instagram' class='social' id='social-3'>
                            <a href="https://www.instagram.com/"></a>
                        </div>
                        <div title='pinterest' class='social' id='social-4'>
                            <a href="https://www.pinterest.com//"></a>
                        </div>
                        <div title='reddit' class='social' id='social-5'>
                            <a href="https://www.reddit.com/user/"></a>
                        </div>
                    </div>
                </div>
                <div class='footer-col' id='footer-col-2'>
                    <!-- <div class='col-title'>
                        Get Started
                    </div> -->
                    <div class='col-items'>
                        <a href='./disclaimer'>Disclaimer</a>
                        <a href='./terms-of-service'>Terms of Service</a>
                        <a href='./cprivacy-policy'>Privacy Policy</a>
                        <a href='./faq'>FAQ</a>
                    </div>
                </div>
                <div class='footer-col' id='footer-col-3'>
                    <!-- <div class='col-title'>
                        About
                    </div> -->
                    <div class='col-items'>
                        <a href='./'>Home</a>
                        <a href='./contact'>Contact</a>
                        <a href='./signin'>Sign in</a>
                        <a href='./register'>Register</a>
                        <!-- <a href='./privacy-policy'>Privacy Policy</a> -->
                    </div>
                </div>
                <div class='footer-col' id='footer-col-4'>
                    <!-- <div class='col-title'>
                        Lorem Ipsum
                    </div> -->
                    <div class='col-items'>
                        <a href="./">Lorem</a>
                        <a href="./">Ipsum</a>
                        <a href="./">Dolor</a>
                        <a href="./">Sit</a>
                        <a href="./">Amet</a>
                    </div>
                </div>
            </div>
        </div>
        <div class='footer-row-wrapper'>
            <div class='footer-row' id='footer-row-2'>
                <div class='footer-col' id='footer-col-1'>
                    © All rights reserved
                </div>                    
                <div class='footer-col' id='footer-col-2'>
                    contact@contact.com
                </div>
            </div>
        </div>
    </div>
</footer>


<script>
    // Add padding if admin menu open
    var body = document.querySelector('body');
    if ($('.admin_bar').length > 0) {
        var w = window.innerWidth;
        if(w > 414) {
            body.style.paddingTop = "41px";
        } else {
            body.style.paddingTop = "38px";
        }
    }
</script>


</body>
</html>
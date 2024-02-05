<div id="bgOverlay">

</div>

<div class="nav-outer nav-outer-lrg">
    <div class="nav-logo">                
        <div class="logo">                
            <div class='logo-text'>
                <a href="./">
                    <!-- Logo Here -->
                    <!-- Antelov -->
                    <img src="./img/6.png?v=2" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="nav-inner">
            <div class="navigation_wrapper">
                <nav class="navigation">
                    <ul class="navigation_list">
                        <li class="list-item"><a href="./">Home</a></li>
                        <li class="list-item"><a href="./msg">Messages</a></li>
                        <li class="list-item"><a href="./contact">Contact</a></li>
                        <li class="list-item"><a href="./faq">FAQ</a></li>
                        <?php
                            // if(!isset($_SESSION['user'])) {
                        
                            //     echo "<li class='list-item'><a href='./about'>About</a></li>
                            //     <li class='list-item'><a href='./services'>Services</a></li>
                            //     <li class='list-item'><a href='./pricing'>Pricing</a></li>";
                        
                            // }
                        ?>
                    </ul>
                </nav>
            </div>
            <!-- <div class='pfp-icon'>
                <i class="far fa-user"></i>
            </div> -->
            <!-- <div class='signup-btn'>
                <a id='nav-login' href='./login'>Login</a> /
                <a id='nav-register' href='./registration'>Register</a>
            </div> -->
            <?php
            echo $user->show_user_profile_nav(); 
            ?>
        </div>
    </div>
</div>

<div class="nav-outer nav-outer-lrg nav-outer-mobile">
    <div class="nav-logo">                
        <div class="logo">                
            <div class='logo-text'>
                <a href="./">
                    <!-- Logo Here -->
                    <!-- Antelov -->
                    <img src="./img/6.png?v=2" alt="">
                </a>
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="nav-inner">
            <div class="navigation_wrapper">
                <nav class="navigation">
                    <ul id="mobList">
                    
                        <?php
                            echo $user->show_user_profile_mob(); 
                        ?>
                        <li class="list-item"><a href="./">Home</a></li>
                        <li class="list-item"><a href="./msg">Messages</a></li>
                        <li class="list-item"><a href="./contact">Contact</a></li>
                        <li class="list-item"><a href="./faq">FAQ</a></li>
                        <?php
                            // if(!isset($_SESSION['user'])) {
                        
                            //     echo "<li class='list-item'><a href='./about'>About</a></li>
                            //     <li class='list-item'><a href='./services'>Services</a></li>
                            //     <li class='list-item'><a href='./pricing'>Pricing</a></li>";
                        
                            // }
                        ?>
                    </ul>
                </nav>
                <div id="navBtn">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <?php
            echo $user->show_user_profile_nav_mob(); 
            ?>
        </div>
    </div>
</div>





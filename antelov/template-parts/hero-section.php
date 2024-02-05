<?php
// Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis iste natus
// SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM UNDE OMNIS ISTE NATUS
    $bgImg = './img/78529648_2487791787957317_3032267986380521472_n.jpg';
    // $bgImg = './img/160610179_3675106722559145_8527517058903946047_n.jpg';
    // $bgImg = './img/106449861_2974696765933481_7072624785574697091_n2.jpg';
    // $bgImg = './img/stack-boxes-scaled.jpg';
    // $bgImg = './img/GettyImages-658680974_ab59zm.jpg';
    // $bgImg = './img/hero-bg.jpg';
    // $bgImg = './img/hero-bg.png';

    // lorem ipsum dolor
    $bg_str = "<div class='hero_banner--background-image'>
        <img src='$bgImg' alt=''>
    </div>";
    
    $title_str = "<h1 class='hero_banner--title'>
    LOREM IPSUM DOLOR
    </h1>"; 
    $subtitle_str = "<p class='hero_banner--subtitle'>
        
    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium unde omnis iste natus
    
    </p>"; 
    $cta_href = '';
    $btn_text_str = "<a class='cta' href='./registration'>
        Get Started
    </a>"; 
    
?>

<div class='hero-wrapper'>
    <div class='hero_banner'>
        <?= $bg_str; ?>
        <div class='hero_banner--background-shadow'></div>
        <div class='hero_banner--main'>
            <div class='hero_banner--content'>         
                <?= $title_str; ?>
                <?= $subtitle_str; ?>
                <?= $btn_text_str; ?>       
            </div>
        </div>
    </div>
</div>
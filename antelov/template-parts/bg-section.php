<?php
    // $bgImg = './img/'.$row['hero_bg'];
    $bgImg = './img/./img/GettyImages-658680974_ab59zm.jpg';
    $bg_str = "<div class='bg-section_banner--background-image' style='background-image: url(\"$bgImg\")'></div>";
    $title_1 = "<h1 class='bg-section_banner--title'>
        Duis aute irure
    </h1>"; 
    $subtitle_1 = "<p class='bg-section_banner--subtitle'>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
    </p>";
    $title_2 = "<h1 class='bg-section_banner--title'>
        Duis aute irure
    </h1>"; 
    $subtitle_2 = "<p class='bg-section_banner--subtitle'>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
    </p>";

    $testimonials = "<div class='slider-outer-wrapper'>
        <div class='slider-wrapper'>
            <div class='slide hide-slide' id='slide-1'>
                $title_1
                $subtitle_1
            </div>
            <div class='slide hide-slide' id='slide-2'>
                $title_2
                $subtitle_2
            </div>
        </div>
        <div class='slider-dots'>
            <span class='dot' id='dot-1' onclick='showSlide(this.id);'></span>
            <span class='dot' id='dot-2' onclick='showSlide(this.id);'></span>
        </div>
    </div>";

    echo "<div class='bg-section-wrapper'>
        <div class='bg-section_banner'>
            $bg_str
            <div class='bg-section_banner--background-shadow'></div>
            <div class='bg-section_banner--main'>       
                $testimonials  
            </div>
        </div>
    </div>";
?>
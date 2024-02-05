
<?php
    $slider_text = "<div class='subtitle'>Sit amet</div>
    <h1>Lorem ipsum dolor</h1>
    <div class='subtitle'> 
        Ut enim ad minim veniam, quis nostrud exercitation
    </div>
    <div class='slider-text-content'>
        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam
    </div>";

?>

<div class="slider-outer-wrapper">
    <div class="slider-wrapper">

        <div class="slide hide-slide" id="slide-1">
            <!-- <img srcset="./img/hero-bg-800w.png 800w,
                    ./img/hero-bg.png 2223w"
                    sizes="100vw"
                    src="./img/hero-bg.png"
                    alt="Slider Image"> -->
            <img src='./img/hero-bg.png' alt='Slider Image'>
            <div class='text'>
                <div>
                    <?= $slider_text; ?>
                </div>
            </div>
        </div>

        <div class="slide hide-slide" id="slide-2">
            <img src='./img/hero-bg.png' alt='Slider Image'>
            <div class='text'>
                <div>
                    <?= $slider_text; ?>
                </div>
            </div>
        </div>

        <div class="slide hide-slide" id="slide-3">
            <img src='./img/hero-bg.png' alt='Slider Image'>
            <div class='text'>
                <div>
                    <?= $slider_text; ?>
                </div>
            </div>
        </div>
        
        <div class="slide hide-slide" id="slide-4">
            <img src='./img/hero-bg.png' alt='Slider Image'>
            <div class='text'>
                <div>
                    <?= $slider_text; ?>
                </div>
            </div>
        </div>
        
        <div class="slide hide-slide" id="slide-5">
            <img src='./img/hero-bg.png' alt='Slider Image'>
            <div class='text'>
                <div>
                    <?= $slider_text; ?>
                </div>
            </div>
        </div>



        
    </div>
    <div class="slider-dots">
        <span class="dot" id="dot-1" onclick="showSlide(this.id);"></span>
        <span class="dot" id="dot-2" onclick="showSlide(this.id);"></span>
        <span class="dot" id="dot-3" onclick="showSlide(this.id);"></span>
        <span class="dot" id="dot-4" onclick="showSlide(this.id);"></span>
        <span class="dot" id="dot-5" onclick="showSlide(this.id);"></span>    
    </div>
</div>
console.log('main');
/* 
    Menu
*/

// Page name
var url = window.location.href;
var urlArr = url.split('/');
console.log(urlArr); // ["http:", "", "localhost", "blackhat", "contact"]
var protocol = urlArr[0];
var host = urlArr[2];
var last = urlArr[urlArr.length - 1];
// Check host
if(protocol === 'http:' && host === 'localhost') {
    if(urlArr.length === 5 && (last === '' || last.startsWith("?"))) {
        // Check if page is home page
        var page = '';
    } else if(urlArr.length === 5 && (last != '' || !last.startsWith("?"))) {
        var page = last;
    }
} else if(protocol === 'https:') {
    if(urlArr.length === 4 && (last === '' || last.startsWith("?"))) {
        // Check if page is home page
        var page = '';
    } else if(urlArr.length === 4 && (last != '' || !last.startsWith("?"))) {
        var page = last;
    }
}
console.log(page);
// Change Nav item color
var navNodelist = document.querySelectorAll('.navigation_list > li > a');
for (let i = 0; i < navNodelist.length; i++) {
    var href = navNodelist[i].getAttribute("href").replace('./','');
    if(href === page) {
        navNodelist[i].style.color = '#009cf7';
    }
}


// MAIN SLIDER
function Timer(fn, t) {
    var timerObj = setInterval(fn, t);

    this.stop = function() {
        if (timerObj) {
            clearInterval(timerObj);
            timerObj = null;
        }
        return this;
    }

    // start timer using current settings (if it's not already running)
    this.start = function() {
        if (!timerObj) {
            this.stop();
            timerObj = setInterval(fn, t);
        }
        return this;
    }

    // start with new or original interval, stop current interval
    this.reset = function(newT = t) {
        t = newT;
        return this.stop().start();
    }
}
// GET ALL SLIDE AND DOTS
var slideAll = document.querySelectorAll('.slide');
// var dotAll = document.querySelectorAll('.dot');
// CHANGE FIRST SLIDE
// var dotOne = dotAll[0];
// dotOne.style.backgroundColor = 'rgb(59, 59, 59)';
// SHOW FIRST SLIDE
var slideOne = slideAll[0];
if(typeof(slideOne) != 'undefined' && slideOne != null){
    slideOne.classList.remove('hide-slide');
    slideOne.classList.add('show-slide');
}

// NEXT SLIDE
var autoswitch = true;
var switch_speed = 5000;
var timer = new Timer(function() {   
    var slideActive = document.querySelectorAll('.show-slide')[0];
    var slideActiveId = slideActive.id;
    console.log(slideActiveId);
    // var dotActive = document.getElementById('dot-'+slideActiveId.split("-")[1]);
    // console.log(dotActive);
    if(slideActive.nextElementSibling) {
        slideActive.nextElementSibling.classList.remove('hide-slide');
        slideActive.nextElementSibling.classList.add('show-slide');
        // dotActive.nextElementSibling.style.backgroundColor = 'rgb(59, 59, 59)';
    } else {
        slideAll[0].classList.remove('hide-slide');
        slideAll[0].classList.add('show-slide');
        // dotAll[0].style.backgroundColor = 'rgb(59, 59, 59)';
    }
    slideActive.classList.remove('show-slide');
    slideActive.classList.add('hide-slide');
    // dotActive.style.backgroundColor = '#d8d7d3';
}, switch_speed);
timer.reset(switch_speed);
timer.stop();
timer.start();
// RUN FUNCTION ON CLICK
function showSlide(id) {
    var toArr = id.split("-");
    var n = toArr[1];
    // var dot = document.getElementById(id);
    var slide = document.getElementById('slide-'+n);
    // CHANGE ALL DOTS
    // dotAll.forEach(el => {
    //     el.style.backgroundColor = '#d8d7d3';
    // });
    // CHANGE CLICKED DOT
    // dot.style.backgroundColor = 'rgb(59, 59, 59)';
    // HIDE ALL SLIDES
    slideAll.forEach(el => {
        if(el.classList.contains("show-slide")) {
            el.classList.remove('show-slide');
            el.classList.add('hide-slide');
        }
    });
    // SHOW CLICKED SLIDE
    if(slide.classList.contains("hide-slide")) {
        slide.classList.remove('hide-slide');
        slide.classList.add('show-slide');
    }
    timer.reset(switch_speed);
    // stop the timer
    timer.stop();
    // start the timer
    timer.start();
}













// PRODUCT SLIDER
var pimgNodelist = document.querySelectorAll('.pslide img');
var pslideAll = document.querySelectorAll('.pslide');
var pdotAll = document.querySelectorAll('.dot');
var firstDot = document.getElementById('dot-1');
if(typeof(firstDot) != 'undefined' && firstDot != null){
    firstDot.style.border = '2px solid #000';
}
// RUN FUNCTION ON CLICK
function pshowSlide(id) {
    var toArr = id.split("-");
    var n = toArr[1];
    var pdot = document.getElementById(id);
    var pslide = document.getElementById('pslide-'+n);
    // CHANGE ALL DOTS
    pdotAll.forEach(el => {
        el.style.border = '2px solid rgb(216, 215, 211)';
    });
    // CHANGE CLICKED DOT
    pdot.style.border = '2px solid #000';
    // HIDE ALL SLIDES
    pslideAll.forEach(el => {
        if(el.classList.contains("pshow-slide")) {
            el.classList.remove('pshow-slide');
            el.classList.add('phide-slide');
        }
    });
    // SHOW CLICKED SLIDE
    if(pslide.classList.contains("phide-slide")) {
        pslide.classList.remove('phide-slide');
        pslide.classList.add('pshow-slide');
    }
}

function leftArrowClicked() {
    var presentSlideId = document.getElementsByClassName('pshow-slide')[0].id;
    var idArr = presentSlideId.split("-");
    var id = idArr[1];
    console.log(id);
    return prevSlide(id);
}
// Show next on right arrow click
function rightArrowClicked() {
    var presentSlideId = document.getElementsByClassName('pshow-slide')[0].id;
    var idArr = presentSlideId.split("-");
    var id = idArr[1];
    console.log(id);
    return nextSlide(id);
}
function prevSlide(id) {
    var n = parseInt(id);
    if(n != 1) {
        // If slide is not first slide
        var prev = n - 1;
    } else {
        // If slide is first slide
        var prev = pimgNodelist.length;
    }
    console.log(n, prev);
    var clickedSlide = document.getElementById('pslide-'+n);
    var prevSlide = document.getElementById('pslide-'+prev);
    var prevDot = document.getElementById('dot-'+n);
    var newDot = document.getElementById('dot-'+prev);
    prevDot.style.border = '2px solid rgb(216, 215, 211)';
    newDot.style.border = '2px solid #000';
    if(clickedSlide.classList.contains('pshow-slide')) {
        clickedSlide.classList.remove('pshow-slide');
        clickedSlide.classList.add('phide-slide');
    }
    if(!prevSlide.classList.contains('pshow-slide')) {
        prevSlide.classList.add('pshow-slide');
        if(prevSlide.classList.contains('phide-slide')) {
            prevSlide.classList.remove('phide-slide');
        }
    }
}
// Show Next Slide
function nextSlide(id) {
    var n = parseInt(id);;
    if(n != pimgNodelist.length) {
        // If slide is not first slide
        var next = n+1;
    } else {
        // If slide is first slide
        var next = 1;
    }
    console.log(n, next);
    var clickedSlide = document.getElementById('pslide-'+n);
    var nextSlide = document.getElementById('pslide-'+next);
    var curDot = document.getElementById('dot-'+n);
    var nextDot = document.getElementById('dot-'+next);
    curDot.style.border = '2px solid rgb(216, 215, 211)';
    nextDot.style.border = '2px solid #000';
    if(clickedSlide.classList.contains('pshow-slide')) {
        clickedSlide.classList.remove('pshow-slide');
        clickedSlide.classList.add('phide-slide');
    }
    if(!nextSlide.classList.contains('pshow-slide')) {
        nextSlide.classList.add('pshow-slide');
        if(nextSlide.classList.contains('phide-slide')) {
            nextSlide.classList.remove('phide-slide');
        }
    }
}


// Menu
var navNodelist = document.querySelectorAll('.navigation_list li');
console.log(navNodelist); // NodeList(4) [li.list-item, li.list-item, li.list-item, li.list-item]
for (let i = 0; i < navNodelist.length; i++) {
    navNodelist[i].addEventListener('mouseover', function() {
        for (let n = 0; n < navNodelist.length; n++) {
            var itemChildren = navNodelist[n].children;
            var childCount = navNodelist[n].children.length;
            if(childCount === 2) {
                if(itemChildren[1].classList.contains('mega-menu')) {
                    itemChildren[1].classList.add('mega-menu-hide');
                    if(itemChildren[1].classList.contains('mega-menu-show')) {
                        itemChildren[1].classList.remove('mega-menu-show');
                    }
                }
            }
        }
        var itemChildren = navNodelist[i].children;
        var childCount = navNodelist[i].children.length;
        if(childCount === 2) {
            if(itemChildren[1].classList.contains('mega-menu')) {
                itemChildren[1].classList.add('mega-menu-show');
                if(itemChildren[1].classList.contains('mega-menu-hide')) {
                    itemChildren[1].classList.remove('mega-menu-hide');
                }
            }
        }
    });
    navNodelist[i].addEventListener('mouseout', function() {;
        var itemChildren = navNodelist[i].children;
        var childCount = navNodelist[i].children.length;
        if(childCount === 2) {
            itemChildren[1].addEventListener('mouseout', function() {
                if(itemChildren[1].classList.contains('mega-menu')) {
                    itemChildren[1].classList.add('mega-menu-hide');
                    if(itemChildren[1].classList.contains('mega-menu-show')) {
                        itemChildren[1].classList.remove('mega-menu-show');
                    }
                }
            });
        }
    });
}



var navBtn = document.getElementById('navBtn');
var mobList  = document.getElementById('mobList');
var bgOverlay  = document.getElementById('bgOverlay');


var navSpansAll = document.querySelectorAll('#navBtn > span');
console.log(navSpansAll);

navBtn.addEventListener('click', function() {
    if(mobList.classList.contains('show_list')) {
        mobList.classList.remove('show_list');
        mobList.classList.add('hide_list');
        bgOverlay.classList.remove('dark');
        bgOverlay.classList.add('light');

        navBtn.style.height = "19px";
        navSpansAll.forEach(element => {
            element.style.backgroundColor = "#fff";

            // Admin menu start
            var adminSpansAll = document.querySelectorAll('.admin_menu_top #navBtn > span');
            adminSpansAll.forEach(element => {
                element.style.backgroundColor = "#fff";
                console.log(element);
            });
            // Admin menu end

            if(element = navSpansAll[0]) {
                navSpansAll[0].classList.remove('rotate-left');
                navSpansAll[0].classList.add('rotate-left-rev');
            }
            if(element = navSpansAll[1]) {
                navSpansAll[1].classList.remove('hide');
                navSpansAll[1].classList.add('show');
            }
            if(element = navSpansAll[2]) {
                navSpansAll[2].classList.remove('rotate-right');
                navSpansAll[2].classList.add('rotate-right-rev');
            }
        });

        return;
    }
    if(!mobList.classList.contains('show_list')) {
        mobList.classList.remove('hide_list');
        mobList.classList.add('show_list');
        bgOverlay.classList.remove('light');
        bgOverlay.classList.add('dark');

        navBtn.style.height = "0px";
        navSpansAll.forEach(element => {
            element.style.backgroundColor = "#4f4f4f";
            if(element = navSpansAll[0]) {
                navSpansAll[0].classList.remove('rotate-left-rev');
                navSpansAll[0].classList.add('rotate-left');
            }
            if(element = navSpansAll[1]) {
                navSpansAll[1].classList.remove('show');
                navSpansAll[1].classList.add('hide');
            }
            if(element = navSpansAll[2]) {
                navSpansAll[2].classList.remove('rotate-right-rev');
                navSpansAll[2].classList.add('rotate-right');
            }
        });
        return;
    }
});
bgOverlay.addEventListener('click', function() {
    if(mobList.classList.contains('show_list')) {
        mobList.classList.remove('show_list');
        mobList.classList.add('hide_list');
        bgOverlay.classList.remove('dark');
        bgOverlay.classList.add('light');

        navBtn.style.height = "19px";
        navSpansAll.forEach(element => {
            element.style.backgroundColor = "#fff";

            // Admin menu start
            var adminSpansAll = document.querySelectorAll('.admin_menu_top #navBtn > span');
            adminSpansAll.forEach(element => {
                element.style.backgroundColor = "#fff";
                console.log(element);
            });
            // Admin menu end

            if(element = navSpansAll[0]) {
                navSpansAll[0].classList.remove('rotate-left');
                navSpansAll[0].classList.add('rotate-left-rev');
            }
            if(element = navSpansAll[1]) {
                navSpansAll[1].classList.remove('hide');
                navSpansAll[1].classList.add('show');
            }
            if(element = navSpansAll[2]) {
                navSpansAll[2].classList.remove('rotate-right');
                navSpansAll[2].classList.add('rotate-right-rev');
            }
        });
        return;
    }
});





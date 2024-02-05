/*
    Functions:
    menu();
    sidebar_toggle()
    pagename()
    page_parameters();
    capitalize(str)
    toggle_dropdown()
    str_reconstruct(str)
    arrow_toggle()
    Timer(fn, t)
    slider()
    showSlide(id)
    Ajax form
    Ajax serialize
    FAQ
    hideCards()
    showCards()
    pop(node)
    check_input(inp)
    Input Validation
    profileTrigger()
    toggleClass()
*/

// Page name
var url = window.location.href;
var urlArr = url.split('/');
// console.log(urlArr); // ["http:", "", "localhost", "blackhat", "contact"]
var protocol = urlArr[0]; // http: or https:
var host = urlArr[2]; // localhost or something else
var before_last = urlArr[urlArr.length - 2];
var last = urlArr[urlArr.length - 1];


// Navigation
var navNodelist = document.querySelectorAll('.navigation_list li');
var navBtn = document.getElementById('navBtn');
var mobList  = document.getElementById('mobList');
var bgOverlay = document.getElementById('bgOverlay');
var navSpansAll = document.querySelectorAll('#navBtn > span');


/* 
Remove sidebar filter
*/
function sidebar_toggle() {
    var w = window.innerWidth;
    console.log(w);
    if(w > 1300) {
        var navMobile = document.querySelector('.nav-outer-mobile');
        if(typeof(navMobile) != 'undefined' && navMobile != null){
            navMobile.parentNode.removeChild(navMobile);
        }
    }
    if(w < 1300) {
        var sidebarFilter = document.querySelector('.sidebar #filter');
        if(typeof(sidebarFilter) != 'undefined' && sidebarFilter != null){
            sidebarFilter.parentNode.removeChild(sidebarFilter);
        }
        var navLrg = document.querySelector('.nav-outer-lrg');
        if(typeof(navLrg) != 'undefined' && navLrg != null){
            navLrg.parentNode.removeChild(navLrg);
        }
    }
}
sidebar_toggle();


function pagename() {
    // Check host and page name
    if(protocol === 'http:' && host === 'localhost') {
        if(urlArr.length === 5 && (last === '' || last.startsWith("?"))) {
            // Check if page is home page
            var page = '';
        } else if(urlArr.length === 5 && (last != '' || !last.startsWith("?"))) {
            var page = last;
        } else if(urlArr.length === 6  && (last != '' || !last.startsWith("?"))) {
            var page = last;
        }
    } else if(protocol === 'https:') {
        if(urlArr.length === 4 && (last === '' || last.startsWith("?"))) {
            // Check if page is home page
            var page = '';
        } else if(urlArr.length === 4 && (last != '' || !last.startsWith("?"))) {
            var page = last;
        } else if(urlArr.length === 5  && (last != '' || !last.startsWith("?"))) {
            var page = last;
        }
    }
    return page;
}
var page = pagename();

function page_parameters() {
    // Index/Blog page parameters
    if(page.startsWith('index')) {
        var uri = last.split('?');
        uri_last = uri[uri.length - 1];
        var paramsArr = uri_last.split('&');
        // console.log(paramsArr);
    }
}
page_parameters();



if(typeof(bgOverlay) != 'undefined' && bgOverlay != null) {
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
}

function capitalize(str) {
    const lower = str.toLowerCase();
    return str.charAt(0).toUpperCase() + lower.slice(1);
}

function toggle_dropdown() {
    function filterDropdown(id) {
        // Show dropdown based on what filter div is clicked
        if(id === 'cliked_1') {
            var dropdown = document.getElementById("cliked_1_dropdown");
        } else if(id === 'cliked_2') {
            var dropdown = document.getElementById("cliked_2_dropdown");
        } else if(id === 'cliked_3') {
            var dropdown = document.getElementById("cliked_3_dropdown");
        } else if(id === 'cliked_4') {
            var dropdown = document.getElementById("cliked_4_dropdown");
        }
        if(dropdown.classList.contains('showDropdown')) {
            if(!dropdown.classList.contains('hideDropdown')) {
                dropdown.classList.add('hideDropdown');
            }
            dropdown.classList.remove('showDropdown');
            return;
        } else if (dropdown.classList.contains('hideDropdown')) {
            dropdown.classList.remove('hideDropdown');
            if(!dropdown.classList.contains('showDropdown')) {
                dropdown.classList.add('showDropdown');
            }
            return;
        }
    }
}

// Reconstruct String with spaces
function str_reconstruct(str) {
    var toArr = str.split('_');
    newArr = [];
    toArr.forEach(element => {
        newArr.push(newElem);
    });
    // console.log(newArr);
    var newStr = newArr.join(' ');
    return newStr;
}
function arrow_toggle() {
    if (!profileDropdown.classList.contains('down')) {
        profileDropdown.classList.add('down');
        if (profileDropdown.classList.contains('up')) {
            profileDropdown.classList.remove('up');
        }
        $('#profile-trigger').find("i").removeClass("fa-angle-down").addClass("fa-angle-up");
        return;
    } else {
        profileDropdown.classList.remove('down');
        if (!profileDropdown.classList.contains('up')) {
            profileDropdown.classList.add('up');
        }
        $('#profile-trigger').find("i").removeClass("fa-angle-up").addClass("fa-angle-down");
        return;
    }
}
// Menu
function menu() {
  
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



    if(typeof(navBtn) != 'undefined' && navBtn != null) {
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
                    element.style.backgroundColor = "#fff";
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
    }
}
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
menu();

// GET ALL SLIDE AND DOTS
var slideAll = document.querySelectorAll('.slide');
var dotAll = document.querySelectorAll('.dot');
var dotOne = dotAll[0];
var slideOne = slideAll[0];

function slider() {
    // Display slideshow if page is index
    if(page == '') {
        // CHANGE FIRST SLIDE   
        if(typeof(dotOne) != 'undefined' && dotOne != null){
            dotOne.style.backgroundColor = 'rgb(241,195,149)';
        }
        // SHOW FIRST SLIDE
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
            var dotActive = document.getElementById('dot-'+slideActiveId.split("-")[1]);
            console.log(dotActive);
            if(slideActive.nextElementSibling) {
                slideActive.nextElementSibling.classList.remove('hide-slide');
                slideActive.nextElementSibling.classList.add('show-slide');
                dotActive.nextElementSibling.style.backgroundColor = 'rgb(241,195,149)';
            } else {
                slideAll[0].classList.remove('hide-slide');
                slideAll[0].classList.add('show-slide');
                dotAll[0].style.backgroundColor = 'rgb(241,195,149)';
            }
            slideActive.classList.remove('show-slide');
            slideActive.classList.add('hide-slide');
            dotActive.style.backgroundColor = '#fff';
        }, switch_speed);
        timer.reset(switch_speed);
        timer.stop();
        timer.start();
    }
}
// RUN FUNCTION ON CLICK
function showSlide(id) {
    var toArr = id.split("-");
    var n = toArr[1];
    var dot = document.getElementById(id);
    var slide = document.getElementById('slide-'+n);
    // CHANGE ALL DOTS
    dotAll.forEach(el => {
        el.style.backgroundColor = '#fff';
    });
    // CHANGE CLICKED DOT
    dot.style.backgroundColor = 'rgb(241,195,149)';
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
slider();
// Ajax serialize
function change_status(pagename, status, id) {
    var loader = document.getElementById('loader');
    loader.classList.add('loader-animation');
    setTimeout(function(){ 
        $.ajax({
            url : '../admin/controllers/user-handler', // Url of backend (can be python, php, etc..)
            type: 'POST', // data type (can be get, post, put, delete)
            data : "status="+status+"&id="+id,
            async: false,
            success: function(response, textStatus, jqXHR) {
                console.log(response);
                // loader.classList.remove('loader-animation');
                window.location.href = pagename;
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }, 3000);
}
// Ajax form
function submitBanners(event) {
    event.preventDefault();
    var loader = document.getElementById('loader');
    loader.classList.add('loader-animation');
    setTimeout(function(){ 
        var form = $('form')[0];
        var formData = new FormData(form);
        console.log(form);
        $.ajax({
            url : './controllers/banner-handler.php',
            type: 'POST', 
            data : formData,
            cache : false,
            contentType: false,
            processData: false,
            success: function(response, textStatus, jqXHR) {
                window.location.href = './appearance';
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    }, 3000);
}


// FAQ

function faq() {
    $(document).ready(function() {
        /* 
            Stop event propagation of child elements if needed
        */
        // $('.actions').on("click", function(e) {
        //     e.stopPropagation();
        // });
        // $('.pay-proof').on("click", function(e) {
        //     e.stopPropagation();
        // });
        $(".profile-head").on("click", function(e) {
            e.preventDefault();
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this).siblings(".profile-body").slideUp(200);
                $(this).find("i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
                $(this).css("background-color", "#fff");
            } else {
                // $(".profile-head > i").removeClass("fa fa-angle-up").addClass("fa fa-angle-down");
                $(this).find("i").removeClass("fa fa-angle-down").addClass("fa fa-angle-up");
                $(".profile-head").removeClass("active");
                $(this).addClass("active");
                $(".profile-body").slideUp(200);
                $(this).siblings(".profile-body").slideDown(200);
                $(this).css("background-color", "rgb(249,249,249");
            }
        });
    });    
}
function hideCards() {
    var cardNodelist = document.querySelectorAll('.form-card');   
    for (let i = 0; i < cardNodelist.length; i++) {
        cardNodelist[i].style.position = 'absolute';
        cardNodelist[i].style.zIndex = -10;
        cardNodelist[i].style.opacity = 0;
    }
}

function showCards() {
    document.getElementById('form-card-1').style.position = 'static';
    document.getElementById('form-card-1').style.opacity = 1;
}

// DELETE POPUP ALERT
function pop(node) {
    return confirm("Are you sure you want to delete this? Click OK to continue or CANCEL to quit.");
}


// ADMIN MENU NAVIGATION DROPDOWN
function admin_menu_dropdown() {
    var liElem = document.querySelectorAll('.item-group a');
    if(typeof(liElem) != 'undefined' && liElem != null){
        liElem.forEach(el => {
            el.addEventListener('click', function() {
                var sibling = el.nextElementSibling;
                if(sibling.classList.contains("child-list")) {
                    $(sibling).slideToggle();
                }
            });
        });
    }
}


// Input Validation, change event
function validate_fullname(fullnameInput) {
    if(typeof(fullnameInput) != 'undefined' && fullnameInput != null) {
        fullnameInput.addEventListener('change', function() {
            if(fullnameInput.value && fullnameInput.value.match(/^(?![\s.]+$)[a-zA-Z\s.]*$/)) {
                fullnameInput.style.border = '1px solid rgb(255,130,9)';
                fullnameInput.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                fullnameInput.style.border = '1px solid red';
                fullnameInput.style.backgroundColor = 'rgb(254,220,224)';
            }
        });
    }
}
function validate_phone_input(phoneInput) {
    if(typeof(phoneInput) != 'undefined' && phoneInput != null) {
        phoneInput.addEventListener('change', function() {
            if(phoneInput.value && phoneInput.value.match(/^[0-9]*$/) && phoneInput.value.length >= 10) {
                phoneInput.style.backgroundColor = 'rgb(249,249,249)';
                phoneInput.style.border = '1px solid rgb(255,130,9)';
            } else {
                phoneInput.style.border = '1px solid red';
                phoneInput.style.backgroundColor = 'rgb(254,220,224)';
            }
        });
    }
}
function validate_age_input(ageInput) {
    if(typeof(ageInput) != 'undefined' && ageInput != null) {
        ageInput.addEventListener('change', function() {
            if(ageInput.value && (ageInput.value >= 18 && ageInput.value <= 80)) {
                ageInput.style.backgroundColor = 'rgb(249,249,249)';
                ageInput.style.border = '1px solid rgb(255,130,9)';
            } else {
                ageInput.style.border = '1px solid red';
                ageInput.style.backgroundColor = 'rgb(254,220,224)';
            }
        });
    }
}
function validate_tos(tosInput) {
    if(typeof(tosInput) != 'undefined' && tosInput != null) {
        tosInput.addEventListener('change', function() {
            if(tosInput.checked) {
                tosWrapper.style.padding = '0';
                tosWrapper.style.border = 'none';
                tosWrapper.style.backgroundColor = 'rgb(255,255,255)';
            } else {
                tosWrapper.style.padding = '2px 10px';
                tosWrapper.style.border = '1px solid red';
                tosWrapper.style.backgroundColor = 'rgb(254,220,224)';
            }
        });
    }
}
function validate_email(emailInput) {
    if(typeof(emailInput) != 'undefined' && emailInput != null) {
        emailInput.addEventListener('change', function() {
            if(emailInput.value && emailInput.value.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/)) {
                emailInput.style.border = '1px solid rgb(255,130,9)';
                emailInput.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                emailInput.style.border = '1px solid red';
                emailInput.style.backgroundColor = 'rgb(254,220,224)';
            }
        });
    }
}
function validate_description(descriptionInput) {
    if(typeof(descriptionInput) != 'undefined' && descriptionInput != null) {
        descriptionInput.addEventListener('change', function() {
            // document.getElementById('descCount').innerHTML = descriptionInput.value.length + '/200';
            if(descriptionInput.value && descriptionInput.value.length <= 200) {
                descriptionInput.style.backgroundColor = 'rgb(249,249,249)';
                descriptionInput.style.border = '1px solid rgb(255,130,9)';
            } else {
                descriptionInput.style.border = '1px solid red';
                descriptionInput.style.backgroundColor = 'rgb(254,220,224)';
            }
        });
    }
}

function check_input(inp) {
    inp.addEventListener('click', function(event) {
        if(!inp.classList.contains('some-class')) {
            inp.classList.add('some-class');
            return;
        } else {
            inp.classList.remove('some-class');
            return;
        }
    });
}



// profileTrigger
function profileTrigger() {
    var profileDropdown = document.getElementById('profile-dropdown');
    var profileAngle = document.getElementById('profile-angle');

    if (!profileDropdown.classList.contains('down')) {
        profileDropdown.classList.add('down');
        if (profileDropdown.classList.contains('up')) {
            profileDropdown.classList.remove('up');
        }
        $('#profile-trigger').find("i").removeClass("fa-angle-down").addClass("fa-angle-up");
        return;
    } else {
        profileDropdown.classList.remove('down');
        if (!profileDropdown.classList.contains('up')) {
            profileDropdown.classList.add('up');
        }
        $('#profile-trigger').find("i").removeClass("fa-angle-up").addClass("fa-angle-down");
        return;
    }
}




/* Example code
document.getElementById("element_id").textContent = id;
document.getElementById("element_id").value = id;
*/
if(page.startsWith('index')) {
    var uri = last.split('?');
    uri_last = uri[uri.length - 1].replaceAll("%20", "+");
    uri_last = uri_last.replaceAll("%2F", "/");
    var paramsArr = uri_last.split('&');
    console.log(paramsArr);

    var filterBooking = document.getElementById('filterBooking');
    // var filterAge = document.getElementById('filterAge');
    var filterAdditionalServices = document.getElementById('filterAdditionalServices');
    var filterVehicleType = document.getElementById('filterVehicleType');

    for (let i = 0; i < paramsArr.length; i++) {
        var activeArr = paramsArr[i].split('=');
        console.log(activeArr[1]);
        if(activeArr[0] != 'page') {
            if(i == 0 && activeArr[1] != 'Any') {
                var strArr = activeArr[1].split('+');
                newStrArr = [];
                strArr.forEach(element => {
                    // var newElem = capitalize(element);
                    newStrArr.push(element);
                });
                var filterStr = newStrArr.join(' ');
    
                document.getElementById('booking').value = filterStr;
                document.getElementById('selectedBooking').textContent = filterStr;
                filterBooking.style.color = 'rgb(255,130,9)';
                filterBooking.style.border = '1px solid rgb(255,130,9)';
                filterBooking.style.backgroundColor = 'rgb(255,255,255)';
            }
            // if(i == 1 && activeArr[1] != 'Any') {
            //     var strArr = activeArr[1].split('+');
            //     newStrArr = [];
            //     strArr.forEach(element => {
            //         // var newElem = capitalize(element);
            //         newStrArr.push(element);
            //     });
            //     var filterStr = newStrArr.join(' ');
    
            //     if(activeArr[1] != '40') {
            //         document.getElementById('age').value = filterStr;
            //         document.getElementById('selectedAge').textContent = filterStr;
            //     } else {
            //         document.getElementById('age').value = filterStr;
            //         document.getElementById('selectedAge').textContent = '40+';
            //     }
            //     filterAge.style.color = 'rgb(255,130,9)';
            //     filterAge.style.border = '1px solid rgb(255,130,9)';
            //     filterAge.style.backgroundColor = 'rgb(255,255,255)';
            // }
            if(i == 1 && activeArr[1] != 'Any') {
                var strArr = activeArr[1].split('+');
                newStrArr = [];
                strArr.forEach(element => {
                    // var newElem = capitalize(element);
                    newStrArr.push(element);
                });
                var filterStr = newStrArr.join(' ');
    
                document.getElementById('additional_services').value = filterStr;
                document.getElementById('selectedAdditionalServices').textContent = filterStr;
                filterAdditionalServices.style.color = 'rgb(255,130,9)';
                filterAdditionalServices.style.border = '1px solid rgb(255,130,9)';
                filterAdditionalServices.style.backgroundColor = 'rgb(255,255,255)';
            }
            if(i == 2 && activeArr[1] != 'Any') {
                var strArr = activeArr[1].split('+');
                newStrArr = [];
                strArr.forEach(element => {
                    // var newElem = capitalize(element);
                    newStrArr.push(element);
                });
                var filterStr = newStrArr.join(' ');
    
                document.getElementById('vehicle_type').value = filterStr;
                document.getElementById('selectedVehicleType').textContent = filterStr;
                filterVehicleType.style.color = 'rgb(255,130,9)';
                filterVehicleType.style.border = '1px solid rgb(255,130,9)';
                filterVehicleType.style.backgroundColor = 'rgb(255,255,255)';
            }
        }
    }
    page = '';
}



if(before_last == 'admin') {
    console.log(page);
    if(page == 'personal') {
        var itemGroup= document.getElementById('item-group-new');
        var user_count = document.getElementById('user_count').value;
        document.getElementById('show-user-count').innerHTML = '<div>'+user_count+'</div>' +'<div>User(s) in Database</div>';
    } else if (page == 'business') {
        var itemGroup= document.getElementById('item-group-approved');
        var user_count = document.getElementById('user_count').value;
        document.getElementById('show-user-count').innerHTML = '<div>'+user_count+'</div>' +'<div>User(s) in Database</div>';
    } else if (page == 'deleted') {
        var itemGroup= document.getElementById('item-group-deleted');
        var user_count = document.getElementById('user_count').value;
        document.getElementById('show-user-count').innerHTML = '<div>'+user_count+'</div>' +'<div>Deleted User(s)</div>';
    } 
    itemGroup.style.color = 'rgb(255,125,0)';
    itemGroup.style.border = '1px solid rgb(255,125,0)';
    itemGroup.style.backgroundColor = 'rgb(255,244,235)';
}


function toggleClass(elemId, a, b) {
    var elemId = document.getElementById(elemId);
    if (!elemId.classList.contains(a)) {
        elemId.classList.add(a);
        if (elemId.classList.contains(b)) {
            elemId.classList.remove(b);
        }
        return;
    } else {
        elemId.classList.remove(a);
        if (!elemId.classList.contains(b)) {
            elemId.classList.add(b);
        }
        return;
    }
}
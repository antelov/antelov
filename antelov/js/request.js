function cancelled(id) {
    var toArr = id.split("-");
    var b = toArr[0];
    var i = toArr[1];

    // var loader = document.getElementById('loader');
    // loader.classList.add('loader-animation');
    // setTimeout(function(){ 
        $.ajax({
            // url : './controllers/request-handler',
            url : './template-parts/popup-2', 
            type: 'POST', // data type (can be get, post, put, delete)
            data : "cancelled=true+&"+"booking="+b+"&id="+i,
            async: false,
            success: function(response, textStatus, jqXHR) {
                // console.log(response);
                document.getElementById('popup-wrapper').innerHTML = response;
                popup('cancelledPopup');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    // }, 2000);
}
function completed(id) {
    var toArr = id.split("-");
    var b = toArr[0];
    var i = toArr[1];

    // var loader = document.getElementById('loader');
    // loader.classList.add('loader-animation');
    // setTimeout(function(){ 
        $.ajax({
            url : './template-parts/popup-3', 
            // url : './controllers/request-handler',
            type: 'POST',
            data : "completed=true+&"+"booking="+b+"&id="+i,
            async: false,
            success: function(response, textStatus, jqXHR) {
                // console.log(response);
                document.getElementById('popup-wrapper').innerHTML = response;
                popup('completedPopup');
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    // }, 2000);
}




var pay;
var itemNameInp = document.getElementById('item_name');
var budgetInp = document.getElementById('budget');
var fixed = document.getElementById('fixed');
var bid = document.getElementById('bid');
var bid_type_row = document.getElementById('bid-type-row');

var payment_method_row = document.getElementById('payment_method_row');

var colInp = document.getElementById('collection_address');
var dropInp = document.getElementById('dropoff_address');

var my_lat = document.getElementById('my_lat');
var my_lng = document.getElementById('my_lng');
var my_lat_2 = document.getElementById('my_lat_2');
var my_lng_2 = document.getElementById('my_lng_2');

var locError = document.getElementById('locError');

if(typeof(colInp) != 'undefined' && colInp != null) { 
    colInp.addEventListener('change', function() {
        if(colInp && colInp.value.match(/^[0-9]*$/) && colInp.value.length == 6) {
            colInp.style.backgroundColor = 'rgb(249,249,249)';
            colInp.style.border = '1px solid rgb(255,130,9)';
        } else {
            colInp.style.border = '1px solid red';
            colInp.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}

if(typeof(dropInp) != 'undefined' && dropInp != null) { 
    dropInp.addEventListener('change', function() {
        if(dropInp && dropInp.value.match(/^[0-9]*$/) && dropInp.value.length == 6) {
            dropInp.style.backgroundColor = 'rgb(249,249,249)';
            dropInp.style.border = '1px solid rgb(255,130,9)';
        } else {
            dropInp.style.border = '1px solid red';
            dropInp.style.backgroundColor = 'rgb(254,220,224)';
        }
    });
}

function validate_payment_method() {
    var payNodelist = document.querySelectorAll('.payment_method');   
    for (let i = 0; i < payNodelist.length; i++) {
        if(payNodelist[i].checked) {
            pay = true;
        }
    }
}
function validateRequest(event) {
    validate_payment_method();
    event.preventDefault();
    if(
        pay &&
        itemNameInp.value &&
        budgetInp.value && budgetInp.value.match(/^[0-9]*$/) &&
        (fixed.checked || bid.checked) &&
        colInp.value && colInp.value.match(/^[0-9]*$/) && colInp.value.length == 6 &&
        dropInp.value && dropInp.value.match(/^[0-9]*$/) && dropInp.value.length == 6 &&
        my_lat && my_lng && my_lat_2 && my_lng_2 && locError.innerHTML == ''
    ) {
        var loader = document.getElementById('loader');
        loader.classList.add('loader-animation');
        setTimeout(function(){ 
            var form = $('form.requestform')[0];
            var formData = new FormData(form);
            $.ajax({
                url : './controllers/request-handler',
                type: 'POST', 
                data : formData,
                async: false,
                cache : false,
                contentType: false,
                processData: false,
                success: function(response, textStatus, jqXHR) {
                    // console.log(response);
                    // console.log('success');
                    window.location.href = './';
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }, 2000);
    } else {
        event.preventDefault();
        if(typeof(itemNameInp) != 'undefined' && itemNameInp != null) {
            if(itemNameInp.value) {
                itemNameInp.style.border = '1px solid rgb(255,130,9)';
                itemNameInp.style.backgroundColor = 'rgb(249,249,249)';
            } else {
                itemNameInp.style.border = '1px solid red';
                itemNameInp.style.backgroundColor = 'rgb(254,220,224)';
            }
        }
        if(typeof(budgetInp) != 'undefined' && budgetInp != null) {
            if(budgetInp.value && budgetInp.value.match(/^[0-9]*$/)) {
                budgetInp.style.backgroundColor = 'rgb(249,249,249)';
                budgetInp.style.border = '1px solid rgb(255,130,9)';
            } else {
                budgetInp.style.border = '1px solid red';
                budgetInp.style.backgroundColor = 'rgb(254,220,224)';
            }
        }
        if(pay == true) {                           
            payment_method_row.style.backgroundColor = 'rgb(249,249,249)';
            payment_method_row.style.border = '1px solid rgb(255,130,9)';
            payment_method_row.style.padding = '10px';
        } else {
            payment_method_row.style.border = '1px solid red';
            payment_method_row.style.backgroundColor = 'rgb(254,220,224)';
            payment_method_row.style.padding = '10px';
        }
        if(fixed.checked || bid.checked) {                        
            bid_type_row.style.backgroundColor = 'rgb(249,249,249)';
            bid_type_row.style.border = '1px solid rgb(255,130,9)';
            bid_type_row.style.padding = '10px';
        } else {
            bid_type_row.style.border = '1px solid red';
            bid_type_row.style.backgroundColor = 'rgb(254,220,224)';
            bid_type_row.style.padding = '10px';
        }
        if(typeof(colInp) != 'undefined' && colInp != null) { 
            if(colInp && colInp.value.match(/^[0-9]*$/) && colInp.value.length == 6) {
                colInp.style.backgroundColor = 'rgb(249,249,249)';
                colInp.style.border = '1px solid rgb(255,130,9)';
            } else {
                colInp.style.border = '1px solid red';
                colInp.style.backgroundColor = 'rgb(254,220,224)';
            }
        }
        
        if(typeof(dropInp) != 'undefined' && dropInp != null) { 
            if(dropInp && dropInp.value.match(/^[0-9]*$/) && dropInp.value.length == 6) {
                dropInp.style.backgroundColor = 'rgb(249,249,249)';
                dropInp.style.border = '1px solid rgb(255,130,9)';
            } else {
                dropInp.style.border = '1px solid red';
                dropInp.style.backgroundColor = 'rgb(254,220,224)';
            }
        }
        if(my_lat.value && my_lng.value && my_lat_2.value && my_lng_2.value) { 
            locError.innerHTML = '';
        } else {
            locError.innerHTML = "<div style='color: red;' class='error-text'>Location not found</div>";
        }
    } 
}
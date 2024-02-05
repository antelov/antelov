
// Show proposal details
function proposalDetails(id) {
    var detailsBtn = document.querySelector('.show-details-'+id);
    detailsBtn.style.display = 'none';
    var infos = document.getElementById('col-2 proposal-info-'+id);
    infos.style.display = 'flex';
    var contact = document.getElementById('proposal-contact-'+id);
    contact.style.display = 'flex';
}

function filterDropdown(id) {
    // Show dropdown based on what filter div is clicked
    if(id === 'filterBooking') {
        var dropdown = document.getElementById("filterBookingDropdown");
    } else if(id === 'filterAge') {
        var dropdown = document.getElementById("filterAgeDropdown");
    } else if(id === 'filterAdditionalServices') {
        var dropdown = document.getElementById("filterAdditionalServicesDropdown");
    } else if(id === 'filterVehicleType') {
        var dropdown = document.getElementById("filterVehicleTypeDropdown");
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
function filterBooking(id) {
    // var idArr = id.split('_');
    // newIdArr = [];
    // idArr.forEach(element => {
    //     var newElem = capitalize(element);
    //     newIdArr.push(newElem);
    // });
    // console.log(newIdArr);
    // var selectedId = newIdArr.join(' ');
    document.getElementById("selectedBooking").textContent = id;
    document.getElementById("booking").value = id;
    filterDropdown('filterBooking');
    document.getElementById("selectedBooking").style.color = 'rgb(255,125,0)';
    document.getElementById("filterBooking").style.border = '1px solid rgb(255,125,0)';
}
function filterAge(id) {
    // var idArr = id.split('_');
    // newIdArr = [];
    // idArr.forEach(element => {
    //     var newElem = capitalize(element);
    //     newIdArr.push(newElem);
    // });
    // console.log(newIdArr);
    // var selectedId = newIdArr.join(' ');
    document.getElementById("selectedAge").textContent = id;
    if(id == '40+') {
        document.getElementById("age").value = '40';
    } else {
        document.getElementById("age").value = id;
    }
    
    filterDropdown('filterAge');
    document.getElementById("selectedAge").style.color = 'rgb(255,125,0)';
    document.getElementById("filterAge").style.border = '1px solid rgb(255,125,0)';
}
function filterAdditionalServices(id) {
    // var idArr = id.split('_');
    // newIdArr = [];
    // idArr.forEach(element => {
    //     var newElem = capitalize(element);
    //     newIdArr.push(newElem);
    // });
    // console.log(newIdArr);
    // var selectedId = newIdArr.join(' ');
    document.getElementById("selectedAdditionalServices").textContent = id;
    document.getElementById("additional_services").value = id;
    filterDropdown('filterAdditionalServices');
    document.getElementById("selectedAdditionalServices").style.color = 'rgb(255,125,0)';
    document.getElementById("filterAdditionalServices").style.border = '1px solid rgb(255,125,0)';
}
function filterVehicleType(id) {
    // var idArr = id.split('_');
    // newIdArr = [];
    // idArr.forEach(element => {
    //     var newElem = capitalize(element);
    //     newIdArr.push(newElem);
    // });
    // console.log(newIdArr);
    // var selectedId = newIdArr.join(' ');
    document.getElementById("selectedVehicleType").textContent = id;
    document.getElementById("vehicle_type").value = id;
    filterDropdown('filterVehicleType');
    document.getElementById("selectedVehicleType").style.color = 'rgb(255,125,0)';
    document.getElementById("filterVehicleType").style.border = '1px solid rgb(255,125,0)';
}

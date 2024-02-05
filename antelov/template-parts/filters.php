



<form id='filter' method='GET' action='./index.php'>
    <!-- <div class='filter-head'>
        Filters
    </div> -->
    <div class='filter-body'>
        <div class='filter-content'>
            <!-- Booking -->
            <div class='filter-group'>
                <div>Booking</div>
                <div class='selection'>
                    <div id='filterBooking' class='dropdown-trigger' onclick='filterDropdown(this.id);'>
                        <div id='selectedBooking'>Any</div> 
                        <i style='color: gray;margin-top:3px;' class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class='dropdown hideDropdown' id='filterBookingDropdown'>
                        <input type='hidden' id='booking' name='booking' value='Any'>
                        <span class='option' id='Bid' onclick='filterBooking(this.id);'>Bid</span>
                        <span class='option' id='Fixed' onclick='filterBooking(this.id);'>Fixed</span>
                        <span class='option' id='Any' onclick='filterBooking(this.id);'>Any</span>
                    </div>
                </div>
            </div>
            <!-- Age -->
            <!-- <div class='filter-group'>
                <div>Age</div>
                <div class='selection'>
                    <div id='filterAge' class='dropdown-trigger' onclick='filterDropdown(this.id);'>
                        <div id='selectedAge'>Any</div>
                        <i style='color: gray;margin-top:3px;' class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class='dropdown hideDropdown' id='filterAgeDropdown'>
                        <input type='hidden' id='age' name='age' value='Any'>
                        <span class='option' id='18-25' onclick='filterAge(this.id);'>18-25</span>
                        <span class='option' id='26-30' onclick='filterAge(this.id);'>26-30</span>
                        <span class='option' id='31-35' onclick='filterAge(this.id);'>31-35</span>
                        <span class='option' id='36-40' onclick='filterAge(this.id);'>36-40</span>
                        <span class='option' id='40+' onclick='filterAge(this.id);'>40+</span>
                        <span class='option' id='Any' onclick='filterAge(this.id);'>Any</span>
                    </div>
                </div>
            </div> -->
            <!-- Additional Services -->
            <div class='filter-group'>
                <div>Additional Services</div>
                <div class='selection'>
                    <div id='filterAdditionalServices' class='dropdown-trigger' onclick='filterDropdown(this.id);'>
                        <div id='selectedAdditionalServices'>Any</div>
                        <i style='color: gray;margin-top:3px;' class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class='dropdown hideDropdown' id='filterAdditionalServicesDropdown'>
                        <input type='hidden' id='additional_services' name='additional_services' value='Any'>
                        <span class='option' id='Fragility' onclick='filterAdditionalServices(this.id);'>Fragility</span>
                        <span class='option' id='Staircase/lift' onclick='filterAdditionalServices(this.id);'>Staircase/lift</span>
                        <span class='option' id='Manpower' onclick='filterAdditionalServices(this.id);'>Manpower</span>
                        <span class='option' id='Stair Carry' onclick='filterAdditionalServices(this.id);'>Stair Carry</span>
                        <span class='option' id='Long Distance Push' onclick='filterAdditionalServices(this.id);'>Long Distance Push</span>
                        <span class='option' id='Assembly/disassembly' onclick='filterAdditionalServices(this.id);'>Assembly/disassembly</span>
                        <span class='option' id='Storage' onclick='filterAdditionalServices(this.id);'>Storage</span>
                        <span class='option' id='Any' onclick='filterAdditionalServices(this.id);'>Any</span>
                    </div>
                </div>
            </div>
            <!-- Vehicle Type -->
            <div class='filter-group'>
                <div>Vehicle Type</div>
                <div class='selection'>
                    <div id='filterVehicleType' class='dropdown-trigger' onclick='filterDropdown(this.id);'>
                        <div id='selectedVehicleType'>Any</div>
                        <i style='color: gray;margin-top:3px;' class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                    <div class='dropdown hideDropdown' id='filterVehicleTypeDropdown'>
                        <input type='hidden' id='vehicle_type' name='vehicle_type' value='Any'>
                        <span class='option' id='Van' onclick='filterVehicleType(this.id);'>Van</span>
                        <span class='option' id='10ft Lorry' onclick='filterVehicleType(this.id);'>10ft Lorry</span>
                        <span class='option' id='14ft Lorry' onclick='filterVehicleType(this.id);'>14ft Lorry</span>
                        <span class='option' id='Any' onclick='filterVehicleType(this.id);'>Any</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Filter Footer -->
        <div class='filter-footer'>
            <div class='filter-footer-content'>
                <button type='submit' id='filterBtn'>
                    Apply Filters
                </button>
                <a class='clear-filter'href='./'>
                    Clear
                </a>
            </div>
        </div>
    </div>

</form>





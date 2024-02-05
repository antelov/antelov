<?php
if($_POST['booking'] == 'fixed') {
    $amountInp = "<div class='input-group'>
        <label style='margin-bottom: 3px;' for='amount'>Amount</label>
        <input type='text' name='amount' id='amount'>
    </div>";
} else {
    $amountInp = "<div class='input-group'>
        <label style='margin-bottom: 3px;' for='amount'>Amount</label>
        <input type='text' name='amount' id='amount'>
    </div>";
}
// apply=true+&"+"booking="+b+"&id="+i
echo "<form action='./controllers/bid-handler' method='post'>
    <div id='applyPopup' class='popup hide_popup'>
        <div id='popupInnerDiv'>
            <div class='popup-text'>
                <h5 class='popup-heading'>Submit offer</h5>
            </div>
            <div class='popup-inputs'>
                <input type='hidden' name='booking' value='{$_POST['booking']}'>
                <input type='hidden' name='request_id' value='{$_POST['id']}'>
                $amountInp
            </div>
            <div class='additional-group'>
                <div class='additional-input-title'>
                    Additional Services
                </div>
                <div id='additional-services-inputs'>
                    <div class='input-group'>
                        <input type='radio' class='fragility' name='fragility' id='fragility'> Fragility
                    </div>
                    <div class='input-group'>
                        <input type='radio' class='staircase' name='staircase' id='staircase'> Staircase/lift
                    </div>
                    <div class='input-group'>
                        <input type='radio' class='manpower' name='manpower' id='manpower'>Manpower
                    </div>
                    <div class='input-group'>
                        <input type='radio' class='stair_carry' name='stair_carry' id='stair_carry'>Stair Carry
                    </div>
                    <div class='input-group'>
                        <input type='radio' class='long_distance_push' name='long_distance_push' id='long_distance_push'>Long Distance Push
                    </div>
                    <div class='input-group'>
                        <input type='radio' class='assembly' name='assembly' id='assembly'>Assembly/disassembly
                    </div>
                    <div class='input-group'>
                        <input type='radio' class='storage' name='storage' id='storage'>Storage
                    </div>
                </div>
                <div class='input-group'>
                    <textarea name='additional_info' id='additional_info' cols='20' rows='3'></textarea>
                </div>
            </div>
            <div class='popup-btns-wrapper'>
                
                <input type='submit' class='submit' id='apply' name='apply' value='Submit'>
            </div>
        </div>
    </div>
</form>";


?>

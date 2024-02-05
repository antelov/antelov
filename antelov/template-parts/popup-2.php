<?php
// apply=true+&"+"booking="+b+"&id="+i
echo "<form action='./controllers/request-handler' method='post'>
    <div id='cancelledPopup' class='popup hide_popup'>
        <div id='popupInnerDiv'>
            <div class='popup-text'>
                <h5 class='popup-heading'>Cancel this request</h5>
            </div>
            <div class='popup-inputs'>
                <input type='hidden' name='booking' value='{$_POST['booking']}'>
                <input type='hidden' name='request_id' value='{$_POST['id']}'>
            </div>
            <div class='popup-btns-wrapper'>
                
                <input type='submit' class='submit' id='apply' name='cancelled' value='Cancel'>
            </div>
        </div>
    </div>
</form>";


?>

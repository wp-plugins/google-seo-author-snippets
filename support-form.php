<?php
function support_form() {
global $wpdb;
?>
<div class = 'wrap'>
 <h3> Support Form </h3>
 <div style = 'width:60%';>
 
 <div id = 'warn' style = 'display:none'> </div>
 <div id = 'showMsg' style = "color:red;margin-left:30px;font-size:20px;" /> </div>
   
       <table >
<tr>
<td><b> First name</b> <span class="mandatory">*</span></td><td><input type="text" id="firstname" placeholder="First name" name="firstname" style = "width:100%;" /></td>
</tr>
<tr>
<td> <b>Last name </b> <span class="mandatory">*</span></td><td><input type="text" id="lastname" placeholder="Last name" name="lastname" style = "width:100%;" />
<input type="hidden" id="smackmailid" name="smackmailid" value="helpdesk@smackcoders.com" />
</td>
</tr>
<tr>
<td><b> Related To </b> </td>
<td colspan=3>
<select name="subject" id = "msg" style = "width:100%;">
<option>Support</option>
</select>
</td>
</tr>
<tr>
<td> <b> Message </b> <span class="mandatory">*</span></td>
<td colspan=3>
<textarea class="form-control" rows="3" name="message" id="message"></textarea>
</td>
</tr>
</table>
<div style = 'margin-top:25px;' ><input class="button button-primary" type="submit" name="send_mail" onclick = "sendemail2smackers();" /></div>


    
 
 </div> 

</div>



<?php

}


?>

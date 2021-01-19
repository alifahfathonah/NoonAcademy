<?php require_once("application/controllers/".basename( __FILE__ )); ?>
<h2> Student Account Registration</h2>
<div class="data_entry_view">
  <form method="post" name="form1" id="form1" action="<?php echo $editFormAction; ?>" accept-charset="utf-8">
   <fieldset><legend>Student Account Registration</legend>
    <table width="100%" align="center">
      <tr valign="baseline">
        <td><strong><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL;?></strong></td>
        <td><strong><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL;?></strong></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="Username" id="Username"  value="" size="32" tabindex="1"  autofocus required="required"><br />
 		<div id="is_username_avaliable">
       	 
        </div>
        
        </td>
        <td><input type="text" name="AddressLine1" value="" size="32" tabindex="8" required="required"></td>
      </tr>
      <tr valign="baseline">
        <td><strong><?php echo USER_CPANEL_PROFILE_PASSWORD_LABEL;?></strong></td>
        <td><strong><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE2_LABEL;?></strong></td>
      </tr>
      <tr valign="baseline">
        <td><input type="password" name="Password" value="" size="32" tabindex="2" required="required"></td>
        <td><input type="text" name="AddressLine2" value="" size="32" tabindex="9"></td>
      </tr>
      <tr valign="baseline">
        <td><strong><?php echo USER_CPANEL_PROFILE_FIRST_NAME_LABEL;?></strong></td>
        <td><strong><?php echo USER_CPANEL_PROFILE_CITY_LABEL; ?></strong></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="FirstName" value="" size="32" tabindex="3" required="required"></td>
        <td><input type="text" name="City" value="" size="32" tabindex="10" required="required"></td>
      </tr>
      <tr valign="baseline">
        <td><strong><?php echo USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL;?></strong></td>
        <td><strong><?php echo USER_CPANEL_PROFILE_COUNTRY_NAME_LABEL;?></strong></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="MiddleNames" value="" size="32" tabindex="4"></td>
        <td><select name="CountryID" tabindex="11">
          <?php 
do {  
?>
          <option value="<?php echo $row_Rs_GetCountryName['CountryID']?>" <?php if (!(strcmp($row_Rs_GetCountryName['CountryID'], "191"))) {echo "SELECTED";} ?>><?php echo $row_Rs_GetCountryName['CountryName']?></option>
          <?php
} while ($row_Rs_GetCountryName = mysql_fetch_assoc($Rs_GetCountryName));
?>
        </select></td>
      </tr>
      <tr valign="baseline">
        <td><strong><?php echo USER_CPANEL_PROFILE_LAST_NAME_LABEL;?></strong></td>
        <td><strong><?php echo USER_CPANEL_PROFILE_PHONE_LABEL;?></strong></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="LastNames" value="" size="32" tabindex="5" required="required"></td>
        <td><input type="text" name="Phone" value="" size="32" tabindex="12" required="required"></td>
      </tr>
      <tr valign="baseline">
        <td><strong><?php echo USER_CPANEL_PROFILE_EMAIL_LABEL;?></strong></td>
        <td><strong><?php echo USER_CPANEL_PROFILE_WEB_SITE_LABEL;?></strong></td>
      </tr>
      <tr valign="baseline">
        <td><input type="email" name="Email" value="" size="32" tabindex="6" required="required"></td>
        <td><input type="text" name="WebSite" value="" size="32" tabindex="13"></td>
      </tr>
      <tr valign="baseline">
        <td><strong><?php echo USER_CPANEL_PROFILE_CONTACT_NO_LABEL;?></strong></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="ContactNo" value="" size="32" tabindex="7"></td>
        <td><input name="btnSubmitCreateStudentAccount" type="submit" id="btnSubmitCreateStudentAccount" value="<?php echo USER_CPANEL_PROFILE_SUBMIT_BUTTON; ?>" tabindex="14"></td>
      </tr>
      <tr valign="baseline">
        <td colspan="2">By creating you account you accept our  <a href="?page_id=contents/student_terms_and_conditions">Terms &amp; Conditions</a></td>
        </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1">
    </fieldset>
  </form>
</div>
<p>&nbsp;</p>

 
<?php
@mysql_free_result($Rs_GetCountryName);

@mysql_free_result($Rs_IsAllreadyRegistred);
?>
<script type="text/javascript">
var prevent_form_submit=true;
$('#Username').keyup(function() {
		// Send Post Ajax Request
		$.post('ajax_pages/is_username_avaliable.php',{ Username: $('#Username').val()}, function(data) {
		
		if(data=="TRUE"){
		  $('#is_username_avaliable').html("Username not avaliable");	
		  prevent_form_submit=true;
		}else if(data=="FALSE"){
		  $('#is_username_avaliable').html("avaliable");
		  prevent_form_submit=false;	
		}
		});
});

      $(document).ready(function(){
           $('#form1').submit(function(e) { 
               // e.preventDefault();
                if(prevent_form_submit==true){
				alert('Please Chose a different Username');
				  	$('#Username').focus();
				  	return false;
				}else{
					return true;
				}
           });
      });

</script>
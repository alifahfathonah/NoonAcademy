<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo ADMIN_PANEL_ACCOUNT_REGISTRATION_HEADING;?></h2>
<div class="data_entry_view">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" accept-charset="utf-8">
  <fieldset>
  <legend><?php echo ADMIN_PANEL_ACCOUNT_REGISTRATION_TITLE; ?></legend>
    <table align="center">
      <tr valign="baseline">
        <td><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL;?></td>
        <td><?php echo USER_CPANEL_PROFILE_PASSWORD_LABEL;?></td>
        
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="Username" id="Username" value="" size="32" tabindex="1"  required="required" />
                <br />
 		<div id="is_username_avaliable">
       	 
        </div>
        </td>
        <td><input type="text" name="Password" value="" size="32" tabindex="2"  required="required" /></td>
      </tr>
      
      <tr valign="baseline">
        <td><?php echo USER_CPANEL_PROFILE_FIRST_NAME_LABEL;?></td>
        <td><?php echo USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL;?></td>
        <td><?php echo USER_CPANEL_PROFILE_LAST_NAME_LABEL;?></td>
        <td><?php echo USER_CPANEL_PROFILE_WEB_SITE_LABEL;?></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="FirstName" value="" size="32" tabindex="3" required="required" /></td>
        <td><input type="text" name="MiddleNames" value="" size="32" tabindex="4"/></td>
         <td><input type="text" name="LastNames" value="" size="32" tabindex="5" required="required" /></td>
        <td><input type="url" name="WebSite" value="" size="32" tabindex="13"/></td>
      </tr>
      
      <tr valign="baseline">
        <td><?php echo USER_CPANEL_PROFILE_PHONE_LABEL;?></td>
        <td><?php echo USER_CPANEL_PROFILE_EMAIL_LABEL;?></td>
         <td><?php echo USER_CPANEL_PROFILE_COMPANY_NAME_LABEL; ?></td>
         <td><?php echo USER_CPANEL_PROFILE_CONTACT_NO_LABEL; ?>:</td>
      </tr>
      <tr valign="baseline">
       
         <td><input type="text" name="Phone" value="" size="32" tabindex="11"  required="required" /></td>
        <td><input type="email" name="Email" value="" size="32" tabindex="12"  required="required" /></td>
        <td><input type="text" name="CompanyNameIfAny" value="" size="32" tabindex="14"/></td>
         <td><input type="text" name="ContactNo" value="" size="32" tabindex="15" /></td>
        
      </tr>
 
      <tr valign="baseline">
        <td><?php echo USER_CPANEL_PROFILE_COUNTRY_NAME_LABEL;?></td>
      <td><?php echo USER_CPANEL_PROFILE_CITY_LABEL; ?></td>
        <td><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL;?></td>
        <td><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE2_LABEL;?></td>
       
      </tr>
      <tr valign="baseline">
      <td nowrap="nowrap"><select name="CountryID" tabindex="9">
          <?php 
do {  
?>
    
          
            <option value="<?php echo $row_Rs_CountryNames['CountryID']?>" <?php if (!(strcmp( $row_Rs_CountryNames['CountryID'],  htmlentities("191", ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_Rs_CountryNames['CountryName']?></option>
          
          <?php
} while ($row_Rs_CountryNames = mysql_fetch_assoc($Rs_CountryNames));
?>
        </select></td>
      <td><input type="text" name="City" value="" size="32" tabindex="8" required="required" /></td>
        <td><input type="text" name="AddressLine1" value="" size="32" tabindex="6" required="required" /></td>
        
        <td><input type="text" name="AddressLine2" value="" size="32" tabindex="7"/></td>
        
      </tr>
      <tr valign="baseline">
        
        
      </tr>
      <tr valign="baseline">
        
      </tr>
      <tr valign="baseline">
         <td><?php echo USER_CPANEL_PROFILE_COMMENTS_LABEL; ?></td>
        <td><?php echo ADMIN_PANEL_USER_GROUP; ?></td>
        <td><?php echo ADMIN_PANEL_ACCOUNT_STATUS; ?></td>
          <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="Others" value="" size="32" tabindex="16"/></td>
        <td><select name="GroupID" tabindex="17">
          <?php 
do {  
?>
          <option value="<?php echo $row_Rs_Groups['GroupID']?>" ><?php echo $row_Rs_Groups['GroupName']?></option>
          <?php
} while ($row_Rs_Groups = mysql_fetch_assoc($Rs_Groups));
?>
        </select></td>
        <td><select name="AccountStatus" tabindex="10">
          <option value="1" <?php if (!(strcmp(1, 1))) {echo "SELECTED";} ?>>Activated</option>
          <option value="2" <?php if (!(strcmp(2, 1))) {echo "SELECTED";} ?>>Deactivated</option>
        </select></td>
         <td><input type="submit" value="<?php echo USER_CPANEL_PROFILE_SUBMIT_BUTTON; ?>" /></td>
      </tr>
      <tr valign="baseline">
      
      
      </tr>
      <tr valign="baseline">
        
        
      </tr>
      </table>
    <input type="hidden" name="MM_insert" value="form1" />
    </fieldset>
  </form>
</div>
<p>&nbsp;</p>
<?php
mysql_free_result($Rs_Groups);

mysql_free_result($Rs_CountryNames);
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
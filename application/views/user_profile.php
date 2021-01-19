<?php require_once("application/controllers/".basename( __FILE__ )); ?>
<h2><?php echo USER_CPANEL_PROFILE_HEADING; ?></h2>
<div class="data_entry_view">

<form method="post" name="form1" action="<?php echo $editFormAction; ?>" accept-charset="utf-8" enctype="multipart/form-data">

<div class="data_column_a">
<fieldset> 
<legend><?php echo USER_CPANEL_PROFILE_FULL_NAME_LABEL; ?></legend>
<label><?php echo USER_CPANEL_PROFILE_FIRST_NAME_LABEL;?></label>
<input type="text" name="FirstName" value="<?php echo htmlentities($row_Rs_GetUserProfile['FirstName'], ENT_COMPAT, 'UTF-8'); ?>" size="32" tabindex="1" required="required" /> 
<label><?php echo USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL;?></label>
<input type="text" name="MiddleNames" value="<?php echo htmlentities($row_Rs_GetUserProfile['MiddleNames'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="2" />
<label><?php echo USER_CPANEL_PROFILE_LAST_NAME_LABEL;?></label>
<input type="text" name="LastNames" value="<?php echo htmlentities($row_Rs_GetUserProfile['LastNames'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="3"  required="required" />

</fieldset>

<br />


<fieldset> 
<legend><?php echo USER_CPANEL_PROFILE_CONTACT_LABEL;?></legend>
<label><?php echo USER_CPANEL_PROFILE_EMAIL_LABEL;?></label>
<input type="email" name="Email" value="<?php echo htmlentities($row_Rs_GetUserProfile['Email'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="4"  required="required" />

<label><?php echo USER_CPANEL_PROFILE_CONTACT_NO_LABEL;?></label>
<input type="text" name="ContactNo" value="<?php echo htmlentities($row_Rs_GetUserProfile['ContactNo'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="5"  />

<label><?php echo USER_CPANEL_PROFILE_WEB_SITE_LABEL;?></label>
<input type="url" name="WebSite" value="<?php echo htmlentities($row_Rs_GetUserProfile['WebSite'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="6" pattern="https?://.+"/>

<label><?php echo USER_CPANEL_PROFILE_PHONE_LABEL;?></label>
<input type="text" name="Phone" value="<?php echo htmlentities($row_Rs_GetUserProfile['Phone'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="7"  />

<br />

</fieldset>


</div>

<div class="data_column_a">
<fieldset> 
<legend><?php echo USER_CPANEL_PROFILE_ADDRESS_LABEL; ?></legend>
<label><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL;?></label>
<input type="text" name="AddressLine1" value="<?php echo htmlentities($row_Rs_GetUserProfile['AddressLine1'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="8" required="required" />

<label><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE2_LABEL;?></label>
<input type="text" name="AddressLine2" value="<?php echo htmlentities($row_Rs_GetUserProfile['AddressLine2'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="8" required="required" />

<label><?php echo USER_CPANEL_PROFILE_CITY_LABEL; ?></label>
<input type="text" name="City" value="<?php echo htmlentities($row_Rs_GetUserProfile['City'], ENT_COMPAT, 'UTF-8'); ?>" size="32" tabindex="10"  required="required"  />


<label><?php echo USER_CPANEL_PROFILE_COUNTRY_NAME_LABEL;?></label>
<select name="CountryID" tabindex="11">
        <?php 
do {  
?>
        <option value="<?php echo $row_Rs_GetCountryName['CountryID']?>" <?php if (!(strcmp($row_Rs_GetCountryName['CountryID'],  htmlentities($row_Rs_GetUserProfile['CountryID'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_Rs_GetCountryName['CountryName']?></option>
        <?php
} while ($row_Rs_GetCountryName = mysql_fetch_assoc($Rs_GetCountryName));
?>
      </select>

</fieldset>

<br />

<fieldset> 
<legend><?php echo USER_CPANEL_PROFILE_OTHER_INFO_LABEL;?></legend>
<label><?php echo USER_CPANEL_PROFILE_COMPANY_NAME_LABEL;?> </label>
<input type="text" name="CompanyNameIfAny" value="<?php echo htmlentities($row_Rs_GetUserProfile['CompanyNameIfAny'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="12" />


<label><?php echo USER_CPANEL_PROFILE_COMMENTS_LABEL;?></label>
<input type="text" name="Others" value="<?php echo htmlentities($row_Rs_GetUserProfile['Others'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  tabindex="13" />



</fieldset>
<br />

<fieldset>
<legend><?php echo USER_CPANEL_PROFILE_UPDATE_NOW_LABEL; ?></legend>
<input name="btnSave" type="submit" id="btnSave" value="<?php echo SUBMIT_BUTTON_SAVE_CHANGES; ?>"  tabindex="15" />

<input type="hidden" name="MM_update" value="form1">
<input type="hidden" name="UserID" value="<?php echo $row_Rs_GetUserProfile['UserID']; ?>">
 
</fieldset>

</div>
</form>
</div>

<div class="data_column_a">
<?php require_once("content_tiles/user_profile.php"); ?>
</div>






<p>&nbsp;</p>

<?php
@mysql_free_result($Rs_GetUserProfile);
?>
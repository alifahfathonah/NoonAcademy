<?php require_once("application/controllers/".basename( __FILE__ )); ?>
<h2><?php echo USER_CPANEL_PROFILE_HEADING; ?></h2>
<div class="data_entry_view">
  <table align="center">
    <tr valign="baseline">
      <td nowrap align="right"><strong><?php echo USER_CPANEL_PROFILE_FIRST_NAME_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE1_LABEL;?></strong></td>
      <td>&nbsp;&nbsp;&nbsp;</td>
      <td>Picture:</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo htmlentities($row_Rs_GetUserProfile['FirstName'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td><?php echo htmlentities($row_Rs_GetUserProfile['AddressLine1'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td rowspan="13">&nbsp;</td>
      <td rowspan="13"><img src="<?php echo USER_PROFILE_UPLOAD_PATH.htmlentities($row_Rs_GetUserProfile['Picture']); ?>" width="200" height="198" /></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><strong><?php echo USER_CPANEL_PROFILE_MIDDLE_NAMES_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_ADDRESS_LINE2_LABEL;?></strong></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo htmlentities($row_Rs_GetUserProfile['MiddleNames'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td><?php echo htmlentities($row_Rs_GetUserProfile['AddressLine2'], ENT_COMPAT, 'UTF-8'); ?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><strong><?php echo USER_CPANEL_PROFILE_LAST_NAME_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_CITY_LABEL; ?></strong></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo htmlentities($row_Rs_GetUserProfile['LastNames'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td><?php echo htmlentities($row_Rs_GetUserProfile['City'], ENT_COMPAT, 'UTF-8'); ?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><strong><?php echo USER_CPANEL_PROFILE_EMAIL_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_COUNTRY_NAME_LABEL;?></strong></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo htmlentities($row_Rs_GetUserProfile['Email'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td><?php echo $row_Rs_GetCountryName['CountryName']?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><strong><?php echo USER_CPANEL_PROFILE_CONTACT_NO_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_COMPANY_NAME_LABEL;?></strong></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo htmlentities($row_Rs_GetUserProfile['ContactNo'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td><?php echo htmlentities($row_Rs_GetUserProfile['CompanyNameIfAny'], ENT_COMPAT, 'UTF-8'); ?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><strong><?php echo USER_CPANEL_PROFILE_WEB_SITE_LABEL;?></strong></td>
      <td><strong><?php echo USER_CPANEL_PROFILE_COMMENTS_LABEL;?></strong></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo htmlentities($row_Rs_GetUserProfile['WebSite'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td><?php echo htmlentities($row_Rs_GetUserProfile['Others'], ENT_COMPAT, 'UTF-8'); ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><strong><?php echo USER_CPANEL_PROFILE_PHONE_LABEL;?></strong></td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo htmlentities($row_Rs_GetUserProfile['Phone'], ENT_COMPAT, 'UTF-8'); ?></td>
      <td>&nbsp;</td>
    </tr>
  </table>



</div>


<?php
@mysql_free_result($Rs_GetUserProfile);
?>
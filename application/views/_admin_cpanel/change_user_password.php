<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo USER_CPANEL_PROFILE_ADMIN_USER_PASSWORD_HEADING; ?></h2>
<div class="data_column_a">
    <div class="data_entry_view">
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" accept-charset="utf-8">
    <fieldset>
    <legend><?php echo ADMIN_PANEL_CHANGE_USER_PASSWORD_TITLE;?></legend>
      <table width="198" height="141" align="center">
        <tr valign="baseline">
          <td><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL;?></td>
        </tr>
        <tr valign="baseline">
          <td>
            <input type="text" name="Username" value="" size="32" placeholder="Enter Username"  required="required"/></td>
        </tr>
        <tr valign="baseline">
          <td><?php echo USER_CPANEL_PROFILE_PASSWORD_CHANGE_NEW_PASS;?></td>
        </tr>
        <tr valign="baseline">
          <td><input type="password" name="Password" value="" size="32" placeholder="Enter New Password" required="required" /></td>
        </tr>
        <tr valign="baseline">
          <td><input type="submit" value="<?php echo SUBMIT_BUTTON_CHANGE_PASSWORD ;?>" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_update" value="form1" />
     </fieldset>
    </form>
    </div>
</div>

<div class="data_column_b">
<?php require_once("application/views/content_tiles/login_page.php"); ?>
</div>
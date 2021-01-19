<?php require_once("application/controllers/".basename( __FILE__ )); ?>
<h2><?php echo USER_CPANEL_PROFILE_PASSWORD_HEADING; ?></h2>
<div class="data_column_a">
    <div class="data_entry_view">
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" accept-charset="utf-8">
    <fieldset>
    <legend><?php echo SUBMIT_BUTTON_CHANGE_PASSWORD; ?></legend>
    <label><?php echo USER_CPANEL_PROFILE_PASSWORD_CHANGE_NEW_PASS; ?></label>
    <input type="password" name="Password" value="" size="32" placeholder="Enter New Password" required="required" />
    
    <label for="ConfirmPassword"><?php echo USER_CPANEL_PROFILE_PASSWORD_CHANGE_CONFIRM_PASS; ?></label>
     
            <input type="password" name="ConfirmPassword" id="ConfirmPassword"  placeholder="Confirm New Password" required="required" />
        
 
            <input type="submit" value="<?php echo SUBMIT_BUTTON_CHANGE_PASSWORD; ?>" />
        

    

      <input type="hidden" name="MM_update" value="form1" />
     </fieldset>
    </form>
    </div>
</div>
<div class="data_column_b">
<?php require_once("content_tiles/login_page.php"); ?>
</div>
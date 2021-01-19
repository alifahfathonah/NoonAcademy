<h2> <?php echo LOGIN_FORM_FAILED_LOGIN_HEADING; ?> </h2>
<div class="data_column_a">
    <div class="data_entry_view">
    <form name="frmLogin" id="frmLogin" action="?page_id=check_login" method="POST" accept-charset="utf-8">
    <fieldset>
    <legend><?php echo LOGIN_FORM_TITLE; ?></legend>
    <label><?php echo LOGIN_FORM_USERNAME_LABEL; ?></label>
    <input type="text" name="Username"  id="Username" required="required">
    <label><?php echo LOGIN_FORM_PASSWORD_LABEL; ?></label>
    <input type="password" name="Password" id="Passwrod" required="required">
    <label>  </label>
    <input type="submit" name="Submit" id="Login" value="<?php echo LOGIN_FORM_SUBMIT_BUTTON; ?>">
    </fieldset>
    </form>
    </div>
</div>
<div class="data_column_b">
<?php require_once("content_tiles/login_page.php"); ?>
</div>

<script type="text/javascript">
 $(document).ready(function(e) {
   ZORKIF_ShowErrorMessage("Login Failed, Wrong Username or Password");
 });
</script>
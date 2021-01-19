<div class="content_tiles">
  <div class="tile_content">
  <?php if(file_exists(USER_PROFILE_UPLOAD_PATH.htmlentities($row_Rs_GetUserProfile['Picture']))){ ?>
  <img src="<?php echo USER_PROFILE_UPLOAD_PATH.htmlentities($row_Rs_GetUserProfile['Picture']); ?>" />
  <?php 
  }else{
  ?>
   <img src="<?php echo USER_PROFILE_UPLOAD_PATH."none.png";?>" />
   <?php } ?>
  </div>
  <div class="title_heading"><?php echo htmlentities($row_Rs_GetUserProfile['FirstName']." ". $row_Rs_GetUserProfile['MiddleNames']." ".$row_Rs_GetUserProfile['LastNames'], ENT_COMPAT, 'UTF-8'); ?></div>	
  <div class="tile_short_note">Educating People</div>
  <div class="tile_menu_link">
<form action="?page_id=user_profile" method="post" name="form2" id="form2" enctype="multipart/form-data"> <?php echo USER_CPANEL_PROFILE_UPLOAD_PICTURES_LABEL;?>
<input type="file" name="Picture" value="<?php echo htmlentities($row_Rs_GetUserProfile['Picture'], ENT_COMPAT, 'UTF-8'); ?>" size="5"  tabindex="14" />
<input type="hidden" name="MM_update" value="form2">
<input type="hidden" name="UserID" value="<?php echo $row_Rs_GetUserProfile['UserID']; ?>">
 

</form>

  <a href="#" id="UploadPicture"><?php echo SUBMIT_BUTTON_UPLOAD;?></a></div>
</div>
 <script type="text/javascript">
/*$('#form2').submit(function() {
alert('Handler for .submit() called.');
return false;
}); */

$('#UploadPicture').click(function() {
$('#form2').submit();
});
</script>

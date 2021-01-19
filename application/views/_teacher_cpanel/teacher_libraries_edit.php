<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_LIBRARY_EDIT_HEADING; ?></h2>
<div class="data_column_a">
<div class="data_entry_view">
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
  <fieldset>
    	 <label><?php echo VIEW_LABEL_TITLE; ?></label>
         <input type="text" name="LibName" value="<?php echo htmlentities($row_RsGetSelectedLibrary['LibName'], ENT_COMPAT, 'UTF-8'); ?>"  required="required" />
         
         <label><?php echo VIEW_LABEL_DESCRIPTION;?></label>
		 <input type="text" name="LibDescription" value="<?php echo htmlentities($row_RsGetSelectedLibrary['LibDescription'], ENT_COMPAT, 'UTF-8'); ?>"  required="required" />
         
         <input name="BtnSave" type="submit" id="BtnSave" value="<?php echo SUBMIT_BUTTON_SAVE_CHANGES;?>">
        
         <input type="hidden" name="MM_update" value="form1">
         <input type="hidden" name="TeacherLibID" value="<?php echo $row_RsGetSelectedLibrary['TeacherLibID']; ?>">
    </fieldset>
  </form>
</div>
</div><!-- end of Page data_column_a -->



<div class="data_column_b">
<?php require_once("application/views/content_tiles/library.php"); ?>
</div>
<?php
mysql_free_result($RsGetSelectedLibrary);
?>

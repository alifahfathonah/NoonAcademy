<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_LIBRARY_UPLOAD_HEADING;?></h2>
<div class="data_entry_view">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" accept-charset="utf-8" enctype="multipart/form-data">
  <fieldset>
  <legend><?php echo TEACHER_LIBRARY_UPLOAD_TITLE;?></legend>
    <table width="100%" align="center">
      <tr valign="baseline">
        <td width="47%"><?php echo VIEW_LABEL_SELECT_LIBRARY; ?></td>
        <td width="53%"><?php echo VIEW_LABEL_SELECT_LIBRARY_FILE_UPLOAD_NOTE; ?></td>
      </tr>
      <tr valign="baseline">
        <td><label for="TeacherLibID"></label>
          <select name="TeacherLibID" id="TeacherLibID">
            <?php
do {  
?>
            <option value="<?php echo $row_RsGetTeacherLibraries['TeacherLibID']?>"
             <?php if(isset($_GET['UploadID'])){
				  if (!(strcmp($row_RsGetTeacherLibraries['TeacherLibID'],$_GET['UploadID']))) {echo "SELECTED";}
			 }//end of if isset?>
            ><?php echo $row_RsGetTeacherLibraries['Username'] ." - " .$row_RsGetTeacherLibraries['LibName']?></option>
            <?php
} while ($row_RsGetTeacherLibraries = mysql_fetch_assoc($RsGetTeacherLibraries));
  $rows = mysql_num_rows($RsGetTeacherLibraries);
  if($rows > 0) {
      mysql_data_seek($RsGetTeacherLibraries, 0);
	  $row_RsGetTeacherLibraries = mysql_fetch_assoc($RsGetTeacherLibraries);
  }
?>
          </select></td>
        <td><input type="file" name="DataFileName" placeholder="Select File" /></td>
      </tr>
      <tr valign="baseline">
        <td><?php echo VIEW_LABEL_DESCRIPTION; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td><textarea name="Description" id="Description" cols="70" rows="5"></textarea></td>
        <td> <input type="checkbox" name="IsDownloadable" value="" />
          <?php echo VIEW_LABEL_DOWNLOADABLE;?></td>
      </tr>
      <tr valign="baseline">
        <td><?php echo VIEW_LABEL_SHARE_WITH; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td><select name="ShareWithID">
          <?php 
do {  
?>
          <option value="<?php echo $row_RsShareWithTypes['ShareWithID']?>" ><?php echo $row_RsShareWithTypes['ShareWith']?></option>
          <?php
} while ($row_RsShareWithTypes = mysql_fetch_assoc($RsShareWithTypes));
?>
        </select></td>
        <td align="right"><input type="submit" value="<?php echo SUBMIT_BUTTON_UPLOAD; ?>" /></td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1" />
    </fieldset>
  </form>
</div>


<?php
mysql_free_result($RsShareWithTypes);
?>
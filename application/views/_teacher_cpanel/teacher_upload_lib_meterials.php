<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_LIBRARY_UPLOAD_HEADING;?></h2>
<?php if ($totalRows_RsGetLibraryName>0) { ?>
<div class="data_column_c">
<div class="detail_view">
    <table border="1" cellpadding="0" cellspacing="0" width="100%">
        <tr class="header_caption_row">
        <td><?php echo VIEW_LABEL_SELECT_LIBRARY; ?></td>
        <td><?php echo VIEW_LABEL_DESCRIPTION; ?></td>
        <td><?php echo VIEW_LABEL_CREATE_AT; ?></td>
        <td><?php echo VIEW_LABEL_UPDATE_AT; ?></td>
      </tr>
      <?php do { ?>
        <tr>
          <td><?php echo $row_RsGetLibraryName['LibName']; ?></td>
          <td><?php echo $row_RsGetLibraryName['LibDescription']; ?></td>
          <td><?php echo $row_RsGetLibraryName['CreateAt']; ?></td>
          <td><?php echo $row_RsGetLibraryName['UpdateAt']; ?></td>
        </tr>
        <?php } while ($row_RsGetLibraryName = mysql_fetch_assoc($RsGetLibraryName)); ?>
  </table>
  </div>
</div>
<?php } ?>
<p>&nbsp;</p>
<div class="data_entry_view">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" accept-charset="utf-8" enctype="multipart/form-data">
  <fieldset>
  <legend> <?php echo TEACHER_LIBRARY_UPLOAD_TITLE;?></legend>
    <table width="100%" align="center">
      <tr class="header_caption_row">
        <td width="45%"><?php echo VIEW_LABEL_SELECT_LIBRARY; ?></td>
        <td width="55%"><?php echo VIEW_LABEL_SELECT_LIBRARY_FILE_UPLOAD_NOTE; ?></td>
      </tr>
      <tr valign="baseline">
        <td>
        <?php if ($totalRows_RsGetLibraryName>0) {  
        
        echo "<input name=\"TeacherLibID\" type=\"hidden\" value=\"".$_GET['UploadID']."\" />";  echo "<input name=\"TeacherLibID2\" type=\"text\" value=\"".$row_RsGetTeacherLibraries['LibName']."\" readonly=\"readonly\" />";
		 
		}else{
		?>
        <label for="TeacherLibID"></label>
          <select name="TeacherLibID" id="TeacherLibID">
            <?php
do {  
?>
            <option value="<?php echo $row_RsGetTeacherLibraries['TeacherLibID']?>"
             <?php if(isset($_GET['UploadID'])){
				  if (!(strcmp($row_RsGetTeacherLibraries['TeacherLibID'],$_GET['UploadID']))) {echo "SELECTED";}
			 }//end of if isset?>
            ><?php echo $row_RsGetTeacherLibraries['LibName']?></option>
            <?php
} while ($row_RsGetTeacherLibraries = mysql_fetch_assoc($RsGetTeacherLibraries));
  $rows = mysql_num_rows($RsGetTeacherLibraries);
  if($rows > 0) {
      mysql_data_seek($RsGetTeacherLibraries, 0);
	  $row_RsGetTeacherLibraries = mysql_fetch_assoc($RsGetTeacherLibraries);
  }
?>
          </select>
          <?php }//end of else part ?>
          </td>
        <td><input type="file" name="DataFileName" placeholder="Select File" /></td>
      </tr>
      <tr valign="baseline">
        <td><?php echo VIEW_LABEL_DESCRIPTION; ?></td>
        <td>&nbsp;</td>
      </tr>
      <tr valign="baseline">
        <td><textarea name="Description" id="Description" cols="70" rows="5"></textarea></td>
        <td><input type="checkbox" name="IsDownloadable" value="" />
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
        <td><input type="submit" value="<?php echo SUBMIT_BUTTON_UPLOAD;?>" /></td>
      </tr>
      </table>
    <input type="hidden" name="MM_insert" value="form1" />
    </fieldset>
  </form>
</div>


<?php
mysql_free_result($RsShareWithTypes);
?>
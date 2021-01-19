<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_LIBRARY_NEW_HEADING; ?></h2>

<div class="data_column_a">
<div class="data_entry_view">
    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" accept-charset="utf-8">
      <fieldset>
        <legend><?php echo TEACHER_LIBRARY_NEW_TITLE;?></legend>
        <table align="center">
          <tr valign="baseline">
            <td><?php echo VIEW_LABEL_TITLE; ?></td>
          </tr>
          <tr valign="baseline">
            <td><input type="text" name="LibName" value="" size="32" required="required"  /></td>
          </tr>
          <?php
	if(isset($_SESSION['MM_Username']) && $_SESSION['MM_UserGroup']==1){	
	?>
          <tr valign="baseline">
            <td><?php echo TEACHER_LIBRARY_SELECT_TEACHER;?></td>
          </tr>
          <tr valign="baseline">
            <td><label for="TeacherID"></label>
              <select name="TeacherID" id="TeacherID">
                <?php
do {  
?>
                <option value="<?php echo $row_RsGetTeachersList['UserID']?>"><?php echo $row_RsGetTeachersList['Username']. " - ".$row_RsGetTeachersList['FirstName']." ".$row_RsGetTeachersList['LastNames']." "; ?> </option>
                <?php
} while ($row_RsGetTeachersList = mysql_fetch_assoc($RsGetTeachersList));
  $rows = mysql_num_rows($RsGetTeachersList);
  if($rows > 0) {
      mysql_data_seek($RsGetTeachersList, 0);
	  $row_RsGetTeachersList = mysql_fetch_assoc($RsGetTeachersList);
  }
?>
            </select></td>
          </tr>
          <?php
	}// end of Administrator's Group Check
	?>
          <tr valign="baseline">
            <td><?php echo VIEW_LABEL_DESCRIPTION;?></td>
          </tr>
          <tr valign="baseline">
            <td><textarea name="LibDescription" cols="60" rows="5" required="required" > </textarea></td>
          </tr>
          
          <tr valign="baseline">
            <td><input type="submit" value="<?php echo SUBMIT_BUTTON_CREATE_NEW; ?>" /></td>
          </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1" />
      </fieldset>
    </form>
    <p>&nbsp;</p>
    
  </div>
</div>


<div class="data_column_b">
<?php require_once("application/views/content_tiles/library.php"); ?>
</div>
<?php
mysql_free_result($RsGetTeachersList);
?>

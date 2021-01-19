<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2> Update Teacher's Library Information </h2>
<div class="data_column_a">
<div class="data_entry_view">

  <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
    <table align="center">
      <tr valign="baseline">
        <td><?php echo VIEW_LABEL_TITLE; ?></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="LibName" value="<?php echo htmlentities($row_RsGetSelectedLibrary['LibName'], ENT_COMPAT, 'UTF-8'); ?>" size="32" required="required" /></td>
      </tr>
      <tr valign="baseline">
        <td><?php echo VIEW_LABEL_DESCRIPTION;?></td>
      </tr>
      <tr valign="baseline">
        <td><input type="text" name="LibDescription" value="<?php echo htmlentities($row_RsGetSelectedLibrary['LibDescription'], ENT_COMPAT, 'UTF-8'); ?>" size="32"  required="required" /></td>
      </tr>
      <tr valign="baseline">
        <td><?php echo VIEW_LABEL_TEACHER;?></td>
      <tr valign="baseline">
        <td><select name="TeacherUserID">
          <?php 
do {  
?>
          <option value="<?php echo $row_RSGetTeacherUserID['UserID']?>" <?php if (!(strcmp($row_RSGetTeacherUserID['UserID'], htmlentities($row_RsGetSelectedLibrary['TeacherUserID'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_RSGetTeacherUserID['Username']?></option>
          <?php
} while ($row_RSGetTeacherUserID = mysql_fetch_assoc($RSGetTeacherUserID));
?>
        </select></td>
      <tr valign="baseline">
        <td><input name="BtnSave" type="submit" id="BtnSave" value="<?php echo SUBMIT_BUTTON_SAVE_CHANGES;?>"></td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="TeacherLibID" value="<?php echo $row_RsGetSelectedLibrary['TeacherLibID']; ?>">
  </form>
  <p>&nbsp;</p>
</div>
</div><!-- end of Page data_column_a -->



<!-- Start of second double column -->

<div class="data_column_b">
<!-- Add your content to second column here -->

</div>

<!-- end of second double column -->
<?php
mysql_free_result($RSGetTeacherUserID);

mysql_free_result($RsGetSelectedLibrary);
?>

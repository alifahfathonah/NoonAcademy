<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_COURSE_NEW_HEADING;?></h2>
<div class="data_entry_view">
<form method="post" name="form1" action="<?php echo $editFormAction; ?>" accept-charset="utf-8">
 <fieldset>
 <legend><?php echo TEACHER_COURSE_NEW_TITLE; ?></legend>
  <table width="100%" align="center">
    <tr valign="baseline">
      <td align="right" nowrap><?php echo VIEW_LABEL_SUBJECT_TITLE;?></td>
      <td><?php echo VIEW_LABEL_CHOOSE_TEACHER_LIBRARY;?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><select name="SubjectID">
        <?php 
do {  
?>
        <option value="<?php echo $row_RsSubjects['SubjectID']?>" ><?php echo $row_RsSubjects['SubjectTitle']?></option>
        <?php
} while ($row_RsSubjects = mysql_fetch_assoc($RsSubjects));
?>
      </select></td>
      <td><select name="TeacherLibID">
        <?php 
do {  
?>
        <option value="<?php echo $row_RsTeacherLibrary['TeacherLibID']?>" ><?php echo $row_RsTeacherLibrary['LibName']?></option>
        <?php
} while ($row_RsTeacherLibrary = mysql_fetch_assoc($RsTeacherLibrary));
?>
      </select></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo VIEW_LABEL_COURSE_NAME;?></td>
      <td><?php echo VIEW_LABEL_DESCRIPTION;?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="text" name="CourseName" value="" size="32" required="required"></td>
      <td><input type="text" name="Description" value="" size="32" required="required"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo VIEW_LABEL_START_DATE;?></td>
      <td><?php echo VIEW_LABEL_END_DATE;?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="text" name="StartDate"  id="StartDate" value="" size="32" required="required" placeholder="eg. <?php echo date("Y-m-d"); ?>"></td>
      <td><input type="text" name="EndDate" id="EndDate" value="" size="32" required="required"  placeholder="eg. <?php echo date("Y-m-d"); ?>"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo VIEW_LABEL_UPLOAD_CONTENT_FILE; ?></td>
      <td><?php echo VIEW_LABEL_COURSE_FEE; ?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="file" name="ContentDataFileName" value="" size="32"></td>
      <td><input type="number" name="CourseFee" value="" size="32" required="required"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><?php echo VIEW_LABEL_MAX_NO_OF_STUDENTS; ?></td>
      <td><?php echo VIEW_LABEL_TOTAL_NO_OF_CLASSES; ?></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="number" min="0" max="30" name="MaxNoOfStudent" value="0" size="32" required="required"></td>
      <td><input type="number" min="0" max="30" name="TotalNoOfClasses" value="0" size="32" required="required"></td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right"><input type="checkbox" name="IsEnrollable" value="" checked />
<?php echo VIEW_LABEL_ENROLLABLE; ?></td>
      <td>&nbsp;</td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input name="btnSave" type="submit" id="btnSave" value="<?php echo SUBMIT_BUTTON_SAVE; ?>"></td>
      </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1">
  </fieldset>
</form>
</div>
<p>&nbsp;</p>

<?php
@mysql_free_result($RsSubjects);

@mysql_free_result($RsTeacherLibrary);
?>
<script type="text/javascript">
    $(function() {
        $( "#StartDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#EndDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
    });
</script>
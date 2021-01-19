<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<div class="data_entry_view">
  <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1" accept-charset="utf-8">
    <fieldset>
      <legend><?php echo TEACHER_COURSE_NEW_TITLE; ?></legend>
      <table width="100%" align="center">
        <tr valign="baseline">
          <td align="right" nowrap="nowrap"><?php echo VIEW_LABEL_SUBJECT_TITLE;?></td>
          <td><?php echo VIEW_LABEL_CHOOSE_TEACHER_LIBRARY;?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><select name="SubjectID">
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
          <td nowrap="nowrap" align="right"><?php echo VIEW_LABEL_COURSE_NAME;?></td>
          <td><?php echo VIEW_LABEL_DESCRIPTION;?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="text" name="CourseName" value="" size="32" /></td>
          <td><input type="text" name="Description" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right"><?php echo VIEW_LABEL_START_DATE;?></td>
          <td><?php echo VIEW_LABEL_END_DATE;?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="text" name="StartDate" value="" size="32" /></td>
          <td><input type="text" name="EndDate" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right"><?php echo VIEW_LABEL_UPLOAD_CONTENT_FILE; ?></td>
          <td><?php echo VIEW_LABEL_COURSE_FEE; ?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="text" name="ContentDataFileName" value="" size="32" /></td>
          <td><input type="text" name="CourseFee" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right"><?php echo VIEW_LABEL_MAX_NO_OF_STUDENTS; ?></td>
          <td><?php echo VIEW_LABEL_TOTAL_NO_OF_CLASSES; ?></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="text" name="MaxNoOfStudent" value="" size="32" /></td>
          <td><input type="text" name="TotalNoOfClasses" value="" size="32" /></td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right"><input type="checkbox" name="IsEnrollable" value="" checked="checked" />
            <?php echo VIEW_LABEL_ENROLLABLE; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr valign="baseline">
          <td nowrap="nowrap" align="right">&nbsp;</td>
          <td><input name="btnSave" type="submit" id="btnSave" value="<?php echo SUBMIT_BUTTON_SAVE; ?>" /></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1" />
    </fieldset>
  </form>
</div>
<p>&nbsp;</p>

<?php
@mysql_free_result($RsSubjects);

@mysql_free_result($RsTeacherLibrary);
?>

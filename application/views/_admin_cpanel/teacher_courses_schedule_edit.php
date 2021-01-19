<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2> Update Course Schedule </h2>
<div class="data_entry_view">
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>" accept-charset="utf-8">
    <table width="100%" align="center">
      <tr valign="baseline">
        <td width="13%">CourseID:</td>
        <td colspan="6">&nbsp;</td>
      <tr valign="baseline">
        <td colspan="7"><select name="CourseID">
          <?php 
do {  
?>
          <option value="<?php echo $row_RsGetCourses['CourseID']?>" <?php if (!(strcmp($row_RsGetCourses['CourseID'], htmlentities($row_RsGetScheduleForEdit['CourseID'], ENT_COMPAT, 'UTF-8')))) {echo "SELECTED";} ?>><?php echo $row_RsGetCourses['CourseName']?></option>
          <?php
} while ($row_RsGetCourses = mysql_fetch_assoc($RsGetCourses));
?>
        </select></td>
      <tr class="header_caption_row">
        <td>Sunday</td>
        <td>Monday</td>
        <td>Tuesday</td>
        <td>Wednesday</td>
        <td>Thursday</td>
        <td>Friday</td>
        <td>Saturday</td>
      </tr>
      <tr valign="baseline">
        <td><input type="checkbox" name="WeekDay0" value=""  
		<?php if (!(strcmp(htmlentities($row_RsGetScheduleForEdit['WeekDay0'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?>></td>
        <td width="14%"><input type="checkbox" name="WeekDay1" value=""  <?php if (!(strcmp(htmlentities($row_RsGetScheduleForEdit['WeekDay1'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?>></td>
        <td width="14%"><input type="checkbox" name="WeekDay2" value=""  <?php if (!(strcmp(htmlentities($row_RsGetScheduleForEdit['WeekDay2'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?>></td>
        <td width="14%"><input type="checkbox" name="WeekDay3" value=""  <?php if (!(strcmp(htmlentities($row_RsGetScheduleForEdit['WeekDay3'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?>></td>
        <td width="14%"><input type="checkbox" name="WeekDay4" value=""  <?php if (!(strcmp(htmlentities($row_RsGetScheduleForEdit['WeekDay4'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?>></td>
        <td width="14%"><input type="checkbox" name="WeekDay5" value=""  <?php if (!(strcmp(htmlentities($row_RsGetScheduleForEdit['WeekDay5'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?>></td>
        <td width="17%"><input type="checkbox" name="WeekDay6" value=""  <?php if (!(strcmp(htmlentities($row_RsGetScheduleForEdit['WeekDay6'], ENT_COMPAT, 'UTF-8'),"1"))) {echo "checked=\"checked\"";} ?>></td>
      </tr>
      <tr valign="baseline">
        <td align="right"><input type="submit" value="Save Changes"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <input type="hidden" name="MM_update" value="form1">
    <input type="hidden" name="CourseClassScheduleID" value="<?php echo $row_RsGetScheduleForEdit['CourseClassScheduleID']; ?>">
  </form>
    <div>
    
    </div><!-- End of Navigation -->
</div><!-- End of etail_view -->
<?php
mysql_free_result($RsGetScheduleForEdit);

mysql_free_result($RsGetCourses);
?>


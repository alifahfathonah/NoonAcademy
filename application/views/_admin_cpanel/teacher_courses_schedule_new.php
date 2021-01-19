<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2> Add new schedule for course </h2>
<div class="data_entry_view">
  <form method="post" name="form1" action="<?php echo $editFormAction; ?>" accept-charset="utf-8">
   <fieldset>
   <legend> Schedule your Course</legend>
    <table width="100%" align="center">
      <tr valign="baseline">
        <td>Course Name:</td>
        <td colspan="6">&nbsp;</td>
      <tr valign="baseline">
        <td colspan="7"><select name="CourseID">
          <?php 
do {  
?>
          <option value="<?php echo $row_RsGetTeachersCourses['CourseID']?>" ><?php echo $row_RsGetTeachersCourses['CourseName']?></option>
          <?php
} while ($row_RsGetTeachersCourses = mysql_fetch_assoc($RsGetTeachersCourses));
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
        <td><input type="checkbox" name="WeekDay0" value="" ></td>
        <td><input type="checkbox" name="WeekDay1" value="" /></td>
        <td><input type="checkbox" name="WeekDay2" value="" /></td>
        <td><input type="checkbox" name="WeekDay3" value="" /></td>
        <td><input type="checkbox" name="WeekDay4" value="" /></td>
        <td><input type="checkbox" name="WeekDay5" value="" /></td>
        <td><input type="checkbox" name="WeekDay6" value="" /></td>
      </tr>
      <tr valign="baseline">
        <td><input type="submit" value="Add Schedule"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    <input type="hidden" name="MM_insert" value="form1">
   
  </form>

</div>
<?php
mysql_free_result($RsGetTeachersCourses);
?>

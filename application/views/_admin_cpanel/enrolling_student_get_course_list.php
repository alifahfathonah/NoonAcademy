<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2> <?php echo TEACHER_COURSE_GET_ENROLL_STUDENT_HEADING; ?> </h2>
<div class="detail_view">
<form action="index.php?page_id=_teacher_cpanel/enrolling_student_add_to_course" method="post" name="frmAddStudentToCourses" accept-charset="utf-8">
<fieldset>
 
<table width="100%" border="1" cellpadding="3" cellspacing="3">
    <tr class="header_caption_row">
    <td><?php echo VIEW_LABEL_CHOOSE;?></td>
    <td><?php echo VIEW_LABEL_COURSE_NAME;?></td>
    <td><?php echo VIEW_LABEL_SUBJECT_TITLE;?></td>
    <td><?php echo VIEW_LABEL_DESCRIPTION;?></td>
    <td><?php echo VIEW_LABEL_START_DATE;?></td>
    <td><?php echo VIEW_LABEL_END_DATE;?></td>
    <td><?php echo VIEW_LABEL_MAX_NO_OF_STUDENTS;?></td>
    <td><?php echo VIEW_LABEL_TOTAL_NO_OF_CLASSES;?></td>
    <td><?php echo VIEW_LABEL_COURSE_FEE;?></td>
    </tr>
  <?php do { ?>
    <tr>
      <td><input name="CourseID" type="radio" value="<?php echo $row_Rs_GetTeacherCoursesList['CourseID']; ?>" /></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['CourseName']; ?></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['SubjectTitle']; ?></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['Description']; ?></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['StartDate']; ?></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['EndDate']; ?></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['MaxNoOfStudent']; ?></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['TotalNoOfClasses']; ?></td>
      <td><?php echo $row_Rs_GetTeacherCoursesList['CourseFee']; ?></td>
      </tr>
    <?php } while ($row_Rs_GetTeacherCoursesList = mysql_fetch_assoc($Rs_GetTeacherCoursesList)); ?>
</table>

 
   <input name="BtnNext" type="submit" Value="<?php echo SUBMIT_BUTTON_NEXT; ?>"/>
</fieldset>
</form>

 </div>
 



<?php
mysql_free_result($Rs_GetTeacherCoursesList);
?>
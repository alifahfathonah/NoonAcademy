<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo TEACHER_ENROLLED_STUDENT_LIST_HEADING; ?> </h2>
 <div class="detail_view">

<table width="100%" border="1" cellpadding="0" cellspacing="0">
  <tr class="header_caption_row">
    <td><?php echo ACTION_BUTTONS_TITLE; ?></td>
    <td><?php echo VIEW_LABEL_COURSE_NAME; ?></td>
    <td><?php echo VIEW_LABEL_DESCRIPTION; ?></td>
    <td><?php echo VIEW_LABEL_START_DATE; ?></td>
    <td><?php echo VIEW_LABEL_END_DATE; ?></td>
    <td>&nbsp;</td>
    <td><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL; ?></td>
  </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
      <td>&nbsp;</td>
      <td><?php echo $row_RsGetStudentCourses['CourseName']; ?></td>
      <td><?php echo $row_RsGetStudentCourses['Description']; ?></td>
      <td><?php echo $row_RsGetStudentCourses['StartDate']; ?></td>
      <td><?php echo $row_RsGetStudentCourses['EndDate']; ?></td>
      <td><?php echo $row_RsGetStudentCourses['StudentUserID']; ?></td>
      <td><?php echo $row_RsGetStudentCourses['Username']; ?></td>
    </tr>
    <?php } while ($row_RsGetStudentCourses = mysql_fetch_assoc($RsGetStudentCourses)); ?>
</table>
</div>

<?php 
mysql_free_result($RsGetStudentCourses);
?>

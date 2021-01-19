<?php require_once("application/controllers/_student_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo STUDENT_COURSE_MY_COURSES_HEADING; ?></h2>
<h3><?php echo STUDENT_COURSE_MY_UNPAID_COURSES_HEADING; ?> </h3>
 <?php if($totalRows_RsGetMyCourses>0){ ?> <div class="detail_view">
<table width="100%" border="1" cellpadding="3" cellspacing="3">
  <tr  class="header_caption_row">
    <td colspan="3"><?php echo ACTION_BUTTONS_TITLE; ?></td>
    <td><?php echo VIEW_LABEL_SUBJECT_TITLE; ?></td>
    <td><?php echo VIEW_LABEL_SUBJECT_SUB_TITLE; ?></td>
    <td><?php echo VIEW_LABEL_COURSE_NAME; ?></td>
    <td><?php echo VIEW_LABEL_DESCRIPTION; ?></td>
    <td><?php echo VIEW_LABEL_START_DATE; ?></td>
    <td><?php echo VIEW_LABEL_END_DATE; ?></td>
    <td><?php echo VIEW_LABEL_COURSE_FEE; ?></td>
  </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
      <td><a href="?page_id=_student_cpanel/libraries_view&ViewID=<?php echo $row_RsGetMyCourses['CEID']; ?>"><img src="images/icons/view.gif" width="16" height="16" alt="View" title="View Course Library Meterial" /></a></td>
      <td><a href="?page_id=_student_cpanel/my_courses&DeleteID=<?php echo $row_RsGetMyCourses['CEID']; ?>"><img src="images/icons/delete.gif" width="16" height="16" alt="Delete"  Title="Delete Yourself from this course"></a></td>
      <td><a href="<?php echo USER_COURSES_UPLOAD_PATH .$row_RsGetMyCourses['ContentDataFileName']; ?>" target="_blank"><img src="images/icons/download.png" width="16" height="16" alt="Download"  Title="Download Course Details"></a></td>
      <td><?php echo $row_RsGetMyCourses['SubjectTitle']; ?></td>
      <td><?php echo $row_RsGetMyCourses['SubjectSubTitle']; ?></td>
      <td><?php echo $row_RsGetMyCourses['CourseName']; ?></td>
      <td><?php echo $row_RsGetMyCourses['Description']; ?></td>
      <td class="small"><?php echo $row_RsGetMyCourses['StartDate']; ?></td>
      <td class="small"><?php echo $row_RsGetMyCourses['EndDate']; ?></td>
      <td><?php echo $row_RsGetMyCourses['CourseFee']; ?></td>
    </tr>
    <?php } while ($row_RsGetMyCourses = mysql_fetch_assoc($RsGetMyCourses)); ?>
</table>
<p>&nbsp;</p>
 <?php if($totalPages_RsGetMyCourses>1) { ?>
<table border="0">
  <tr>
    <td><?php if ($pageNum_RsGetMyCourses > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_RsGetMyCourses=%d%s", $currentPage, 0, $queryString_RsGetMyCourses); ?>">First</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_RsGetMyCourses > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_RsGetMyCourses=%d%s", $currentPage, max(0, $pageNum_RsGetMyCourses - 1), $queryString_RsGetMyCourses); ?>">Previous</a>
        <?php } // Show if not first page ?></td>
    <td><?php if ($pageNum_RsGetMyCourses < $totalPages_RsGetMyCourses) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_RsGetMyCourses=%d%s", $currentPage, min($totalPages_RsGetMyCourses, $pageNum_RsGetMyCourses + 1), $queryString_RsGetMyCourses); ?>">Next</a>
        <?php } // Show if not last page ?></td>
    <td><?php if ($pageNum_RsGetMyCourses < $totalPages_RsGetMyCourses) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_RsGetMyCourses=%d%s", $currentPage, $totalPages_RsGetMyCourses, $queryString_RsGetMyCourses); ?>">Last</a>
        <?php } // Show if not last page ?></td>
  </tr>
</table>
<?php } // end of $totalPages_RsGetMyCourses?>
</div><?php }else{ 
echo "<p> &nbsp; </p> ";
fnShowMessageBox(MSG_STUDENT_NOT_ENTROLLED_TO_ANY_COURSE,MSG_TITLE_STUDENT_NOT_ENTROLLED_TO_ANY_COURSE);
	   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowErrorMessage(\" ".MSG_STUDENT_NOT_ENTROLLED_TO_ANY_COURSE."\");
			});
		</script>";
}// end of if ?>
<p>&nbsp;</p>





<h3><?php echo STUDENT_COURSE_MY_PAID_COURSES_HEADING; ?> </h3>
 <?php if($totalRows_RsGetMyCourses_paid>0){ ?> <div class="detail_view">
<table width="100%" border="1" cellpadding="3" cellspacing="3">
  <tr  class="header_caption_row">
    <td colspan="3"><?php echo ACTION_BUTTONS_TITLE; ?></td>
    <td><?php echo VIEW_LABEL_SUBJECT_TITLE; ?></td>
    <td><?php echo VIEW_LABEL_SUBJECT_SUB_TITLE; ?></td>
    <td><?php echo VIEW_LABEL_COURSE_NAME; ?></td>
    <td><?php echo VIEW_LABEL_DESCRIPTION; ?></td>
    <td><?php echo VIEW_LABEL_START_DATE; ?></td>
    <td><?php echo VIEW_LABEL_END_DATE; ?></td>
    <td><?php echo VIEW_LABEL_COURSE_FEE; ?></td>
  </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
      <td><a href="?page_id=_student_cpanel/libraries_view&ViewID=<?php echo $row_RsGetMyCourses_paid['CEID']; ?>"><img src="images/icons/view.gif" width="16" height="16" alt="View" title="View Course Library Meterial" /></a></td>
      <td><a href="?page_id=_student_cpanel/my_courses&DeleteID=<?php echo $row_RsGetMyCourses_paid['CEID']; ?>"><img src="images/icons/delete.gif" width="16" height="16" alt="Delete"  Title="Delete Yourself from this course"></a></td>
      <td><a href="<?php echo USER_COURSES_UPLOAD_PATH .$row_RsGetMyCourses['ContentDataFileName']; ?>" target="_blank"><img src="images/icons/download.png" width="16" height="16" alt="Download"  Title="Download Course Details"></a></td>
      <td><?php echo $row_RsGetMyCourses_paid['SubjectTitle']; ?></td>
      <td><?php echo $row_RsGetMyCourses_paid['SubjectSubTitle']; ?></td>
      <td><?php echo $row_RsGetMyCourses_paid['CourseName']; ?></td>
      <td><?php echo $row_RsGetMyCourses_paid['Description']; ?></td>
      <td class="small"><?php echo $row_RsGetMyCourses_paid['StartDate']; ?></td>
      <td class="small"><?php echo $row_RsGetMyCourses_paid['EndDate']; ?></td>
      <td><?php echo $row_RsGetMyCourses_paid['CourseFee']; ?></td>
    </tr>
    <?php } while ($row_RsGetMyCourses_paid = mysql_fetch_assoc($RsGetMyCourses_paid)); ?>
</table>
 
</div><?php }else{ 
echo "<p> &nbsp; </p> ";
fnShowMessageBox(MSG_STUDENT_NOT_ENTROLLED_TO_ANY_COURSE,MSG_TITLE_STUDENT_NOT_ENTROLLED_TO_ANY_COURSE);
	   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowErrorMessage(\" ".MSG_STUDENT_NOT_ENTROLLED_TO_ANY_COURSE."\");
			});
		</script>";
}// end of if ?>
<p>&nbsp;</p>

<?php
@mysql_free_result($RsGetMyCourses);
?>
<?php require_once("application/controllers/_admin_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo STUDENT_COURSE_MY_COURSES_HEADING; ?></h2>
<h3><?php echo STUDENT_COURSE_MY_UNPAID_COURSES_HEADING; ?> </h3>
 <?php if($totalRows_RsGetMyCourses>0){ ?> <div class="detail_view">
<table width="100%" border="1" cellpadding="3" cellspacing="3">
  <tr  class="header_caption_row">
    <td>#</td>  
    <td><?php echo ACTION_BUTTONS_TITLE; ?></td>
    <td><?php echo USER_CPANEL_PROFILE_USERNAME_LABEL; ?></td>
    <td><?php echo USER_CPANEL_PROFILE_FULLNAME_LABEL; ?></td>    
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
      <td><?php echo $i; ?></td>
      <td><a href="?page_id=_admin_cpanel/courses_payments&ViewID=<?php echo $row_RsGetMyCourses['CEID']; ?>"  onclick="return confirm('<?php echo ACTION_MSG_CONFIRM_PAYMENT; ?>');"><img src="images/icons/payment.png" width="16" height="16" alt="Payment" title="Pay Now" /></a></td>

      <td><?php echo $row_RsGetMyCourses['Username']; ?></td>
      <td><?php echo $row_RsGetMyCourses['FirstName']." ".$row_RsGetMyCourses['MiddleNames']." ".$row_RsGetMyCourses['LastNames']; ?></td>
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

<?php
@mysql_free_result($RsGetMyCourses);
?>
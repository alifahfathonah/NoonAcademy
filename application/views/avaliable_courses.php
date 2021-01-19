<?php require_once("application/controllers/".basename( __FILE__ )); ?>
<h2><?php echo STUDENT_COURSE_LIST_HEADING; ?></h2>
<?php if( $totalRows_RsCoursesList>0){?>
 <div class="detail_view">
  <table width="100%" border="1" cellpadding="3" cellspacing="3">
    <tr class="header_caption_row">
      <td colspan="2"><?php echo ACTION_BUTTONS_TITLE; ?></td>
      <td><?php echo VIEW_LABEL_SUBJECT_TITLE; ?></td>
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
       <td><a href="?page_id=_student_cpanel/course_student_applay.php&CourseID=<?php echo $row_RsCoursesList['CourseID']; ?>" onclick="return confirm('Are you sure you want to Apply for  this Course?');"><img src="images/icons/apply.png" width="16" height="16" Title="Applay Now"/></a></td>
       <td><a href="<?php echo USER_COURSES_UPLOAD_PATH.$row_RsCoursesList['ContentDataFileName'] ?>" target="_blank" onclick="return confirm('Are you sure you want to download this file?');"><img src="images/icons/download.png" alt="Apply" width="16" height="16" Title="Download Course Details"/></a></td>
        <td><?php echo $row_RsCoursesList['SubjectTitle']; ?></td>
        <td><?php echo $row_RsCoursesList['CourseName']; ?></td>
        <td><?php echo $row_RsCoursesList['Description']; ?></td>
        <td class="small"><?php echo $row_RsCoursesList['StartDate']; ?></td>
        <td class="small"><?php echo $row_RsCoursesList['EndDate']; ?></td>
        <td class="small"><?php echo $row_RsCoursesList['CourseFee']; ?></td>
      </tr>
      <?php } while ($row_RsCoursesList = mysql_fetch_assoc($RsCoursesList)); ?>
  </table>

<p>&nbsp;</p>
<?php if($totalPages_RsCoursesList>1){ ?>
<div>

  <table border="0">
    <tr>
      <td><?php if ($pageNum_RsCoursesList > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, 0, $queryString_RsCoursesList); ?>">First</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_RsCoursesList > 0) { // Show if not first page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, max(0, $pageNum_RsCoursesList - 1), $queryString_RsCoursesList); ?>">Previous</a>
          <?php } // Show if not first page ?></td>
      <td><?php if ($pageNum_RsCoursesList < $totalPages_RsCoursesList) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, min($totalPages_RsCoursesList, $pageNum_RsCoursesList + 1), $queryString_RsCoursesList); ?>">Next</a>
          <?php } // Show if not last page ?></td>
      <td><?php if ($pageNum_RsCoursesList < $totalPages_RsCoursesList) { // Show if not last page ?>
          <a href="<?php printf("%s?pageNum_RsCoursesList=%d%s", $currentPage, $totalPages_RsCoursesList, $queryString_RsCoursesList); ?>">Last</a>
          <?php } // Show if not last page ?></td>
    </tr>
  </table>

</div>

<?php }// end of Page Count check ?>
</div> 
 

  
  
  
<?php }else{
	 fnShowMessageBox(MSG_NO_RECORDS_FOUND,MSG_TITLE_NO_RECORDS_FOUND);  
}?>
<?php
@mysql_free_result($RsCoursesList);
@mysql_free_result($RsCoursesList_Expired);

?>


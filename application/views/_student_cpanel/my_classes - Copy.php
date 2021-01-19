<?php require_once("application/controllers/_student_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo STUDENT_COURSE_MY_MY_CLASSES_HEADING; ?></h2>
 
<?php if($totalRows_Rs_GetMyClasses>0){ ?>
 <div class="detail_view">
  <p>&nbsp;</p>
<table width="100%" border="1" cellpadding="3" cellspacing="3">
  <tr  class="header_caption_row">
      <td><?php echo VIEW_LABEL_COURSE_NAME; ?></td>
      <td><?php echo VIEW_LABEL_CLASS_ID; ?></td>
      <td><?php echo VIEW_LABEL_CLASS_SCREEN_NAME; ?></td>
      <td><?php echo VIEW_LABEL_JOIN_CLASS; ?></td>
      <td><?php echo VIEW_LABEL_CREATE_AT; ?></td>
      <td><?php echo VIEW_LABEL_UPDATE_AT; ?></td>
    </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
        <td><?php echo $row_Rs_GetMyClasses['CourseName']; ?></td>
        <td><?php echo $row_Rs_GetMyClasses['WizIQ_class_id']; ?></td>
        <td><?php echo $row_Rs_GetMyClasses['WizIQ_screen_name']; ?></td>
        <td><a href="<?php echo $row_Rs_GetMyClasses['WizIQ_attendee_url']; ?>" target="_blank">Join Class</a></td>
        <td><?php echo $row_Rs_GetMyClasses['CreateAt']; ?></td>
        <td><?php echo $row_Rs_GetMyClasses['UpdatedAt']; ?></td>
      </tr>
      <?php } while ($row_Rs_GetMyClasses = mysql_fetch_assoc($Rs_GetMyClasses)); ?>
  </table>
</div>
<?php }else {// end of if $totalPages_Rs_GetMyClasses
fnShowMessageBox(MSG_STUDENT_NOT_ENTROLLED_TO_ANY_CLASS,MSG_TITLE_STUDENT_NOT_ENTROLLED_TO_ANY_CLASS); 
   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowWarningMessage(\"". MSG_STUDENT_NOT_ENTROLLED_TO_ANY_CLASS."\");
			});
		</script>";

}// end of else for $totalPages_Rs_GetMyClasses
?>
<p>&nbsp;</p>
<?php
mysql_free_result($Rs_GetMyClasses);
?>
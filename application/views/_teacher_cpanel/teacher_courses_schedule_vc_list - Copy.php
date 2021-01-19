<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>
<h2><?php echo CLASS_SHEDULE_HEADING; ?></h2>
<?php if ($totalRows_RsGetMyScheduledClasses>0){ ?>
<div class="detail_view">
<table width="100%" border="1" cellpadding="3" cellspacing="3">
     <tr class="header_caption_row">
    <td colspan="2"><?php echo ACTION_BUTTONS_TITLE;?></td>
    <td><?php echo VIEW_LABEL_COURSE_NAME;?></td>
    <td><?php echo VIEW_LABEL_START_DATE; ?></td>
    <td><?php echo VIEW_LABEL_DURATION; ?></td>
    <td><?php echo VIEW_LABEL_VIEW; ?></td>
    <td><?php echo VIEW_LABEL_DOWNLOAD_RECORDING; ?></td>
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
      <td><a href="index.php?page_id=_teacher_cpanel/cancel_class&ClassID=<?php echo $row_RsGetMyScheduledClasses['ClassID']; ?>&WizIQ_class_id=<?php echo $row_RsGetMyScheduledClasses['WizIQ_class_id']; ?>">Cancel</a></td>
      <td><a href="?page_id=_teacher_cpanel/add_attendee_to_wiziq_class&WizIQ_class_id=<?php echo $row_RsGetMyScheduledClasses['WizIQ_class_id']; ?>&CourseID=<?php echo $row_RsGetMyScheduledClasses['CourseID']; ?>">Add Entrolled Student</a></td>
      <td><?php echo $row_RsGetMyScheduledClasses['WizIQ_class_id']; ?></td>
      <td><?php echo $row_RsGetMyScheduledClasses['WizIQ_start_time']; ?></td>
      <td><?php echo $row_RsGetMyScheduledClasses['WizIQ_duration']; ?></td>
      <td><a href="<?php echo $row_RsGetMyScheduledClasses['WizIQ_presenter_url']; ?>" target="_blank">Start Class</a></td>
      <td><a href="<?php echo $row_RsGetMyScheduledClasses['WizIQ_recording_url']; ?>" target="_blank">Download</a></td>
      <td class="small"><?php echo $row_RsGetMyScheduledClasses['CreateAt']; ?></td>
      <td class="small"><?php echo $row_RsGetMyScheduledClasses['UpdateAt']; ?></td>
    </tr>
    <?php } while ($row_RsGetMyScheduledClasses = mysql_fetch_assoc($RsGetMyScheduledClasses)); ?>
</table>
</div>
<?php }else{
	
fnShowMessageBox(MSG_TEACHER_NOT_HAVE_VIRTUAL_CLASS,MSG_TITLE_TEACHER_NOT_HAVE_VIRTUAL_CLASS);


   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowErrorMessage(\"". MSG_TEACHER_NOT_HAVE_VIRTUAL_CLASS."\");
			});
		</script>";

}
 ?>
<?php
mysql_free_result($RsGetMyScheduledClasses);
?>

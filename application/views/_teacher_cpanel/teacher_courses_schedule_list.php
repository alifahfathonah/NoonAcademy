<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>
<table>
<tr>
<td> <form id="form1" name="form1" method="post" action="?page_id=_teacher_cpanel/teacher_courses_schedule_new" accept-charset="utf-8">
       <input type="submit" name="btnAddNew" id="btnAddNew" value="AddNew" />
     </form></td>
</tr>
</table>
<?php if($totalRows_RsGetTeachersSecheduleList>0) {?>
<div class="detail_view">
<p>&nbsp;</p>
<table width="100%" border="1" cellpadding="3" cellspacing="3">
   <tr class="header_caption_row">
     <td colspan="3" align="center" valign="middle">Action</td>
     <td>Course Name</td>
     <td>Sunday</td>
     <td>Monday</td>
     <td>Tuesday</td>
     <td>Wednesday</td>
     <td>Thursday</td>
     <td>Friday</td>
     <td>Saturday</td>
     <td>StartDate</td>
   </tr>
    <?php
	$i=0;
	 do {
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
    <td><a href="?page_id=view_course_class_datesheet&CourseID=<?php echo $row_RsGetTeachersSecheduleList['CourseID']; ?>"><img src="images/icons/view_dates.png" width="16" height="16" /></a></td>
      <td><a href="?page_id=_teacher_cpanel/teacher_courses_schedule_edit&EditID=<?php echo $row_RsGetTeachersSecheduleList['CourseClassScheduleID']; ?>"><img src="images/icons/edit.gif" width="16" height="16" /></a></td>
      <td><a href="?page_id=_teacher_cpanel/delete_course_schedule&DeleteID=<?php echo $row_RsGetTeachersSecheduleList['CourseClassScheduleID']; ?>"><img src="images/icons/delete.gif" width="16" height="16" /></a></td>
      <td><?php echo $row_RsGetTeachersSecheduleList['CourseName']; ?></td>
      <td><?php if( $row_RsGetTeachersSecheduleList['WeekDay0']==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?>
      </td>
      <td><?php if( $row_RsGetTeachersSecheduleList['WeekDay1']==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if( $row_RsGetTeachersSecheduleList['WeekDay2']==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if( $row_RsGetTeachersSecheduleList['WeekDay3']==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if( $row_RsGetTeachersSecheduleList['WeekDay4']==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if( $row_RsGetTeachersSecheduleList['WeekDay5']==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if( $row_RsGetTeachersSecheduleList['WeekDay6']==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php echo $row_RsGetTeachersSecheduleList['StartDate']; ?></td>
      </tr>
    <?php } while ($row_RsGetTeachersSecheduleList = mysql_fetch_assoc($RsGetTeachersSecheduleList)); ?>
</table>
<p>&nbsp;</p>
<?php if($totalPages_RsGetTeachersSecheduleList>1){?> <div>
    <table border="0">
      <tr>
        <td><?php if ($pageNum_RsGetTeachersSecheduleList > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_RsGetTeachersSecheduleList=%d%s", $currentPage, 0, $queryString_RsGetTeachersSecheduleList); ?>">First</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_RsGetTeachersSecheduleList > 0) { // Show if not first page ?>
            <a href="<?php printf("%s?pageNum_RsGetTeachersSecheduleList=%d%s", $currentPage, max(0, $pageNum_RsGetTeachersSecheduleList - 1), $queryString_RsGetTeachersSecheduleList); ?>">Previous</a>
            <?php } // Show if not first page ?></td>
        <td><?php if ($pageNum_RsGetTeachersSecheduleList < $totalPages_RsGetTeachersSecheduleList) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_RsGetTeachersSecheduleList=%d%s", $currentPage, min($totalPages_RsGetTeachersSecheduleList, $pageNum_RsGetTeachersSecheduleList + 1), $queryString_RsGetTeachersSecheduleList); ?>">Next</a>
            <?php } // Show if not last page ?></td>
        <td><?php if ($pageNum_RsGetTeachersSecheduleList < $totalPages_RsGetTeachersSecheduleList) { // Show if not last page ?>
            <a href="<?php printf("%s?pageNum_RsGetTeachersSecheduleList=%d%s", $currentPage, $totalPages_RsGetTeachersSecheduleList, $queryString_RsGetTeachersSecheduleList); ?>">Last</a>
            <?php } // Show if not last page ?></td>
      </tr>
    </table>
    </p>
</div><!-- End of Navigation --><?php } ?>
</div><!-- End of etail_view -->
<?php }else{
	 fnShowMessageBox(MSG_NO_RECORDS_FOUND,MSG_TITLE_NO_RECORDS_FOUND);
	 // the HTML Below will show  add new button
	 ?>
     <div class="detail_view" >
<p>&nbsp;  </p>
     <form id="form1" name="form1" method="post" action="?page_id=_teacher_cpanel/teacher_courses_schedule_new" accept-charset="utf-8">
           <input type="submit" name="btnAddNew" id="btnAddNew" value="AddNew" />
         </form> 
</div>
     <?php  
}?>
<?php
mysql_free_result($RsGetTeachersSecheduleList);
?>

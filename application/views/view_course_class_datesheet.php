<?php require_once("application/controllers/".basename( __FILE__ )); ?>
<h2> Course Classes Datesheet </h2>
<div>
<form action="index.php" method="get" enctype="application/x-www-form-urlencoded" name="frmSearchCourseByID" id="frmSearchCourseByID">
<input type="hidden" name="page_id" value="view_course_class_datesheet" />
  <table width="100%" border="0" cellspacing="2" cellpadding="2">
     <tr class="header_caption_row">
      <td width="21%">Choose Course Name</td>
      </tr>
    <tr>
      <td><label for="CourseID"></label>
        <select name="CourseID" id="CourseID">
          <?php
do {  
?>
          <option value="<?php echo $row_RsGetCourses['CourseID']?>"><?php echo $row_RsGetCourses['CourseName']?></option>
          <?php
} while ($row_RsGetCourses = mysql_fetch_assoc($RsGetCourses));
  $rows = mysql_num_rows($RsGetCourses);
  if($rows > 0) {
      mysql_data_seek($RsGetCourses, 0);
	  $row_RsGetCourses = mysql_fetch_assoc($RsGetCourses);
  }
?>
          </select>
        <input type="submit" name="btnShow" id="btnShow" value="Show" /></td>
      </tr>
    </table>
  <p>&nbsp;</p>
</form>
</div>
<?php if($totalRows_RsGetWeeklyScheduleForACourse>0){ ?>
	<div class="detail_view">
  <table width="100%" border="1" cellspacing="2" cellpadding="2">
     <tr class="header_caption_row">
      <td>Course Name</td>
     
    </tr>
    <tr>
      <td><?php echo $row_RsGetDateRangeForCourse['CourseName'];?></td>
      
    </tr>
    <tr>
      <td><?php echo $row_RsGetDateRangeForCourse['Description']; ?></td>
    </tr>
  </table>
</div>
  <p>&nbsp;</p>
<div class="detail_view">
  <table width="100%" border="1" cellspacing="2" cellpadding="2">
     <tr class="header_caption_row">
      <td width="9%">Day</td>
      <td width="91%">Dated</td>
    </tr>
    
  <?php

	// Call the function to Display the Results of the Date Sheet
	$data=fnShowCourseClassDateSchedule($arrGetDateRangeArray,$arrWeekDay); 
	$i=0;
	foreach($data as $ScheduleDate => $vDate){	
		//echo  $vDate;
		 
	
	 
		$i++;
		if(($i%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
      <tr class="<?php echo $row_bg; ?>">
		  <td><?php echo date("l", strtotime($vDate)); ?></td>
		  <td><?php echo $vDate; ?></td>
		</tr>
	  <?php
	
	}// end of for each 
?>
    
  </table>
</div>
 <?php 
 }else {
   fnShowMessageBox(MSG_PLEASE_CHOOSE_COURSE_FIRST,MSG_TITLE_PLEASE_CHOOSE_COURSE_FIRST);
 }
 
mysql_free_result($RsGetCourses);
?>
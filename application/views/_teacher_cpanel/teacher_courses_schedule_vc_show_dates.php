<?php require_once("application/controllers/_teacher_cpanel/".basename( __FILE__ )); ?>

 
<h2> Course Classes Datesheet </h2>

<?php if(1){ ?>
	<div class="detail_view">
  <table width="100%" border="1" cellspacing="2" cellpadding="2">
    <tr>
      <td width="15%"><strong><?php echo VIEW_LABEL_TITLE; ?></strong></td>
      <td width="85%"><?php echo $row_RsGetDateRangeForCourse['CourseName'];?></td>
      
    </tr>
    <tr>
      <td><strong><?php echo VIEW_LABEL_DESCRIPTION;?></strong></td>
      <td><?php echo $row_RsGetDateRangeForCourse['Description']; ?></td>
    </tr>
    <tr>
      <td><strong><?php echo VIEW_LABEL_DURATION; ?></strong></td>
      <td> <?php
	  		echo $ClassDuration;
	   ?> <?php echo VIEW_LABEL_DURATION_IN_MINUTES;?></td>
    </tr>
  </table>
</div>
  <p>&nbsp;</p>
<div class="detail_view">
<p>&nbsp;</p>
<table width="100%" border="1" cellpadding="3" cellspacing="3">
   <tr class="header_caption_row">
     <td><?php echo VIEW_LABEL_SUNDAY;?></td>
     <td><?php echo VIEW_LABEL_MONDAY;?></td>
     <td><?php echo VIEW_LABEL_TUESDAY;?></td>
     <td><?php echo VIEW_LABEL_WEDNESDAY;?></td>
     <td><?php echo VIEW_LABEL_THURSDAY;?></td>
     <td><?php echo VIEW_LABEL_FRIDAY;?></td>
     <td><?php echo VIEW_LABEL_SATURDAY;?></td>
    </tr>
 
      <tr>
    <td><?php if( $WeekDay0==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?>
    </td>
      <td><?php if($WeekDay1==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if($WeekDay2==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if($WeekDay3==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if($WeekDay4==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if($WeekDay5==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
      <?php } else { ?>
      <img src="images/icons/cross.png" width="16" height="16" />
      <?php } ?></td>
      <td><?php if($WeekDay6==1){ ?><img src="images/icons/tick.png" width="16" height="16" />
        <?php } else { ?>
        <img src="images/icons/cross.png" width="16" height="16" />
        <?php } ?></td>
      </tr>
    
</table>
 </div>
 <p>&nbsp;  </p>
 
<div class="detail_view">
<form action="?page_id=_teacher_cpanel/teacher_courses_schedule_vc_create" name="frmCreateVirtualClasses" id="frmCreateVirtualClasses" method="post">

<input name="CourseID" type="hidden" value="<?php echo $_POST['CourseID']; ?>" />
<input name="ClassDuration" type="hidden" value="<?php echo $ClassDuration ?>" />
<input name="CourseTitle" type="hidden" value="<?php echo $row_RsGetDateRangeForCourse['CourseName'];?>" />


  <table width="100%" border="1" cellspacing="2" cellpadding="2">
     <tr class="header_caption_row">
      <td width="4%"><?php echo VIEW_LABEL_DAY; ?></td>
      <td width="80%"><?php echo VIEW_LABEL_DATED; ?></td>
      <td colspan="2"><?php echo VIEW_LABEL_TIMMING; ?></td>
    </tr>
    
  <?php

	// Call the function to Display the Results of the Date Sheet
	$data=fnShowCourseClassDateSchedule($arrGetDateRangeArray,$arrWeekDay); 
	$j=0;
	$CallenderID=0;
	foreach($data as $ScheduleDate => $vDate){	
		//echo  $vDate;
		 
	
	 
		$j++;
		if(($j%2)==0) $row_bg="dark"; else $row_bg="light";
	 ?>
    <tr class="<?php echo $row_bg; ?>">
		  <td><?php //echo date("l", strtotime($vDate)); ?></td>
		  <td><input name="StartDate[]" id="StartDate<?php echo $CallenderID;?>" type="text" value="<?php echo $vDate; ?>" required="required"/></td>
		  <td width="8%"><select name="ClassTimingsM[]" id="ClassTimingsM">
          <option value="00" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="00")
				       echo "Selected";?>>00</option>
          <option value="01" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="01")
				       echo "Selected";?>>01</option>
          <option value="02" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="02")
				       echo "Selected";?>>02</option> 
          <option value="03" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="03")
				       echo "Selected";?>>03</option>
          <option value="04" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="04")
				       echo "Selected";?>>04</option>
          <option value="05" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="05")
				       echo "Selected";?>>05</option>
          <option value="06" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="06")
				       echo "Selected";?>>06</option>
          <option value="07" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="07")
				       echo "Selected";?>>07</option>
          <option value="08" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="08")
				       echo "Selected";?>>08</option>
          <option value="09" <?php
		        if(isset($_POST['ClassTimingsM']) && 
				$_POST['ClassTimingsM']=="09")
				       echo "Selected";?>>09</option>                       
          <?php
			for ($i=10;$i<=59;$i++) {
				$Selected="";
				if(isset($_POST['ClassTimingsM']) && $_POST['ClassTimingsM']==$i)
				$Selected="Selected";
               echo  "<option value=\"$i\" $Selected >$i</option>";
			}
           ?>
        </select></td>
		  <td width="8%"><select name="ClassTimingsH[]" id="ClassTimingsH">
          <option value="00" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="00")
				       echo "Selected";?>>00</option>
          <option value="01" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="01")
				       echo "Selected";?>>01</option>
          <option value="02" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="02")
				       echo "Selected";?>>02</option> 
          <option value="03" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="03")
				       echo "Selected";?>>03</option>
          <option value="04" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="04")
				       echo "Selected";?>>04</option>
          <option value="05" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="05")
				       echo "Selected";?>>05</option>
          <option value="06" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="06")
				       echo "Selected";?>>06</option>
          <option value="07" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="07")
				       echo "Selected";?>>07</option>
          <option value="08" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="08")
				       echo "Selected";?>>08</option>
          <option value="09" <?php
		        if(isset($_POST['ClassTimingsH']) && 
				$_POST['ClassTimingsH']=="09")
				       echo "Selected";?>>09</option>                       
          <?php
			for ($i=10;$i<=23;$i++) {
				$Selected="";
				if(isset($_POST['ClassTimingsH']) && $_POST['ClassTimingsH']==$i)
				$Selected="Selected";
               echo  "<option value=\"$i\" $Selected >$i</option>";
			}
           ?>
	      </select></td>
		</tr>

	  <?php
	$CallenderID++;
	}// end of for each 
?>
    <tr class="<?php $j++ ;if(($j%2)==0) echo $row_bg="dark"; else echo $row_bg="light";?>">
      <td colspan="4"><input type="submit" name="btnCreateWizIQVc" id="btnCreateWizIQVc" value="Create Virtual Classes" /></td>
    </tr>
    
  </table>
  </form>
</div>
 <?php 
 }else {
   fnShowMessageBox(MSG_PLEASE_CHOOSE_COURSE_FIRST,MSG_TITLE_PLEASE_CHOOSE_COURSE_FIRST);
 }
 
mysql_free_result($RsGetCourses);
?>
<script type="text/javascript">
    $(function() {
       <?php 
	   for ($cal=0;$cal<$CallenderID;$cal++)
	   {
	   ?>
	    $( "#StartDate<?php echo $cal; ?>" ).datepicker({ dateFormat: 'yy-mm-dd' });
		//date=$( "#StartDate<?php echo $cal; ?>" ).datepicker({ dateFormat: 'yy-mm-dd' }).datepicker('getDate');;
		//var dayOfWeek = date.getUTCDay();
		 
		<?php 
	   }
	   ?>
	 
    });
</script>
<?php
$WizIQ_class_id="";
$CourseID=0;
if(isset($_GET['WizIQ_class_id']) && !empty($_GET['WizIQ_class_id']) && (isset($_GET['CourseID']) && !empty($_GET['CourseID']))){
	$WizIQ_class_id=$_GET['WizIQ_class_id'];
	$CourseID=$_GET['CourseID'];
}else{
	
header("Location: index.php?page_id=unknown_resource");	
}
require_once("application/controllers/wiziq/WiZiQClassAPI/zorkif_wiziq_student_to_class.php");
 $std=new ZorkifWizIQClassAddAttendee;
 $std->SetCourseID($CourseID);
 $std->SetWizIQClassID($WizIQ_class_id);
 $Status=true;
 $Status=$std->AddAttendee($WizIQ_class_id);
if($Status==true){
   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowNotificationMessage(\" Student Were Added to the Claases\");
			});
		</script>";	
} else{
	   echo "<script type=\"text/javascript\">
			$(document).ready(function(e) {
			ZORKIF_ShowErrorMessage(\" Sorry We are unable to Add Students to your Class\");
			});
		</script>";
}
 	
?>
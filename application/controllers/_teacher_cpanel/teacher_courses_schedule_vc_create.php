<?php
allow_access_to_teachers_and_admins_only();
if (!isset($_POST['StartDate'])     ||
    !isset($_POST['ClassTimingsH']) ||
    !isset($_POST['CourseID'])      ||
    !isset($_POST['ClassDuration'])){
		
		header("Location: index.php?page_id=_teacher_cpanel/teacher_courses_schedule_vc&STATUS=UNKNOWNSOURCE");
	exit(0);	
	}
	
	
	
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_RsGetTeachersEmail = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetTeachersEmail = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetTeachersEmail = sprintf("SELECT * FROM user_accounts WHERE UserID = %s", GetSQLValueString($colname_RsGetTeachersEmail, "int"));
$RsGetTeachersEmail = mysql_query($query_RsGetTeachersEmail, $conn) or die(mysql_error());
$row_RsGetTeachersEmail = mysql_fetch_assoc($RsGetTeachersEmail);
$totalRows_RsGetTeachersEmail = mysql_num_rows($RsGetTeachersEmail);

$colname_RsGetCourseTeacherID = "-1";
if (isset($_POST['CourseID'])) {
  $colname_RsGetCourseTeacherID = $_POST['CourseID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetCourseTeacherID = sprintf("SELECT TeacherUserID FROM eschool_courses WHERE CourseID = %s", GetSQLValueString($colname_RsGetCourseTeacherID, "int"));
$RsGetCourseTeacherID = mysql_query($query_RsGetCourseTeacherID, $conn) or die(mysql_error());
$row_RsGetCourseTeacherID = mysql_fetch_assoc($RsGetCourseTeacherID);
$totalRows_RsGetCourseTeacherID = mysql_num_rows($RsGetCourseTeacherID);



$StartDate=$_POST['StartDate'];
$ClassTimingsH=$_POST['ClassTimingsH'];
$ClassTimingsM=$_POST['ClassTimingsM'];
$CourseID=$_POST['CourseID'];
$ClassDuration=$_POST['ClassDuration'];

$CourseTitle=$_POST['CourseTitle'];
$MaximumStudents=10;  // No of Student Licenses 
$TeacherEmail=$row_RsGetTeachersEmail['Email'];
$TeacherUserID=0;
if(isset($_SESSION['MM_UserID']) && (isset($_SESSION['MM_UserGroup']) & $_SESSION['MM_UserGroup']==2 )){
	$TeacherUserID=$_SESSION['MM_UserID'];
}else{
	$TeacherUserID=$row_RsGetCourseTeacherID['TeacherUserID'];
}

// Import The WizIQ API Lbrary Classes to  Create Virtual Classes for this course
require_once("application/controllers/wiziq/WiZiQClassAPI/zorkif_wiziq_class_management.php");

foreach($StartDate as $Key =>$ClassStartDate){
 
		$ClassStartDateTime=$ClassStartDate . " ".$ClassTimingsH[$Key].":".$ClassTimingsM[$Key].":00";	
 
 
		$WizIQClass =new ZorkifWizIQClass; // WizIQ New Class
		$WizIQClass->ClassID;
		$WizIQClass->CourseID=$CourseID; 
		$WizIQClass->TeacherUserID=$TeacherUserID; //$_SESSION['MM_UserID'];
		$WizIQClass->CreateAt=date("Y-m-d H:i:s");
		$WizIQClass->WhoUserID=$_SESSION['MM_UserID'] ;//$_SESSION['MM_UserID'];
		
		 
		$WizIQClass->WizIQ_class_title=$CourseTitle;
		$WizIQClass->WizIQ_start_time=$ClassStartDateTime;//date("Y-m-d 05:40:00"); 
		$WizIQClass->WizIQ_presenter_email=$TeacherEmail;
		$WizIQClass->WizIQ_duration =$ClassDuration; //in minutes
		$WizIQClass->WizIQ_attendee_limit=$MaximumStudents; // Defualt Number of Students
		$WizIQClass->WizIQ_presenter_default_controls="video"; //audio, video
		$WizIQClass->WizIQ_attendee_default_controls="audio";  //audio, writing
		$WizIQClass->WizIQ_create_recording ="true"; 
		$WizIQClass->WizIQ_return_url="http://www.example.com/thankyou.php" ;
		$WizIQClass->WizIQ_status_ping_url="http://www.example.com/status.php" ;
		$WizIQClass->WizIQ_language_culture_name="en-us";
		if($WizIQClass->ScheduleClassOnWizIQServer()){	
			$WizIQClass->SaveScheduledClassToDB();
			echo "Class Schedule was Successfull for $ClassStartDateTime<br>";	
		}else{	
			 echo "sorry, the class could not be created <br>";
			 if(!empty($ClassCreateErrorMessage)) echo $ClassCreateErrorMessage;	
		}// end of if statement for class scheduling

}
   

mysql_free_result($RsGetTeachersEmail);

mysql_free_result($RsGetCourseTeacherID);
?>

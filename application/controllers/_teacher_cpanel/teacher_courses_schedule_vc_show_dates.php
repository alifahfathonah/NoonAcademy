<?php
allow_access_to_teachers_and_admins_only();
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

$colname_RsGetDateRangeForCourse = "-1";
if (isset($_GET['CourseID'])) {
  $colname_RsGetDateRangeForCourse = $_GET['CourseID'];
}else{
	if (isset($_POST['CourseID'])) 
  $colname_RsGetDateRangeForCourse = $_POST['CourseID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetDateRangeForCourse = sprintf("SELECT * FROM eschool_courses WHERE CourseID = %s", GetSQLValueString($colname_RsGetDateRangeForCourse, "int"));
$RsGetDateRangeForCourse = mysql_query($query_RsGetDateRangeForCourse, $conn) or die(mysql_error());
$row_RsGetDateRangeForCourse = mysql_fetch_assoc($RsGetDateRangeForCourse);
$totalRows_RsGetDateRangeForCourse = mysql_num_rows($RsGetDateRangeForCourse);

$vStartDate= $row_RsGetDateRangeForCourse['StartDate'];
$vEndDate=$row_RsGetDateRangeForCourse['EndDate'];
$arrGetDateRangeArray=getDatesBetween($vStartDate,$vEndDate);
	$WeekDay0=0;
	$WeekDay1=0;
	$WeekDay2=0;
	$WeekDay3=0;
	$WeekDay4=0;
	$WeekDay5=0;
	$WeekDay6=0;
	$ClassDuration=60;
	if(isset($_POST['ClassDuration'])) $ClassDuration=$_POST['ClassDuration']; ;
	
	if(isset($_POST['WeekDay0'])&& $_POST['WeekDay0']==1) $WeekDay0=1; else $WeekDay0=0 ;
	if(isset($_POST['WeekDay1'])&& $_POST['WeekDay1']==1) $WeekDay1=1; else $WeekDay1=0 ;
	if(isset($_POST['WeekDay2'])&& $_POST['WeekDay2']==1) $WeekDay2=1; else $WeekDay2=0 ;
	if(isset($_POST['WeekDay3'])&& $_POST['WeekDay3']==1) $WeekDay3=1; else $WeekDay3=0 ;
	if(isset($_POST['WeekDay4'])&& $_POST['WeekDay4']==1) $WeekDay4=1; else $WeekDay4=0 ;
	if(isset($_POST['WeekDay5'])&& $_POST['WeekDay5']==1) $WeekDay5=1; else $WeekDay5=0 ;
	if(isset($_POST['WeekDay6'])&& $_POST['WeekDay6']==1) $WeekDay6=1; else $WeekDay6=0 ;

 
	
if(1){
 $arrWeekDay=array(
	$WeekDay0,
	$WeekDay1,
	$WeekDay2,
	$WeekDay3,
	$WeekDay4,
	$WeekDay5,
	$WeekDay6
	); 
}// end of if 

function fnShowCourseClassDateSchedule($arrGetDateRangeArray,$arrWeekDay){
	$WeekDay=-1;
	$count=0;
	$arrSchedule=array();
	foreach($arrGetDateRangeArray as $date){
		$WeekDay=date("w", strtotime($date));
		 if ($arrWeekDay[$WeekDay]==1) $arrSchedule[]= $date;
 	}	
   return $arrSchedule;
 } //end of function fnShowCourseClassDateSchedule 
 
 // Get Courses List


mysql_select_db($database_conn, $conn);
$query_RsGetCourses = "SELECT * FROM eschool_courses WHERE EndDate >= CURDATE()";
$RsGetCourses = mysql_query($query_RsGetCourses, $conn) or die(mysql_error());
$row_RsGetCourses = mysql_fetch_assoc($RsGetCourses);
$totalRows_RsGetCourses = mysql_num_rows($RsGetCourses);
?>
 
<?php
allow_access_to_athenticated_users_only();
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

$colname_RsGetWeeklyScheduleForACourse = "-1";
if (isset($_GET['CourseID'])) {
  $colname_RsGetWeeklyScheduleForACourse = $_GET['CourseID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetWeeklyScheduleForACourse = sprintf("SELECT * FROM eschool_courses_schedule WHERE CourseID = %s", GetSQLValueString($colname_RsGetWeeklyScheduleForACourse, "int"));
$RsGetWeeklyScheduleForACourse = mysql_query($query_RsGetWeeklyScheduleForACourse, $conn) or die(mysql_error());
$row_RsGetWeeklyScheduleForACourse = mysql_fetch_assoc($RsGetWeeklyScheduleForACourse);
$totalRows_RsGetWeeklyScheduleForACourse = mysql_num_rows($RsGetWeeklyScheduleForACourse);

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
if($totalRows_RsGetWeeklyScheduleForACourse>0){
 $arrWeekDay=array(
	$row_RsGetWeeklyScheduleForACourse['WeekDay0'],
	$row_RsGetWeeklyScheduleForACourse['WeekDay1'],
	$row_RsGetWeeklyScheduleForACourse['WeekDay2'],
	$row_RsGetWeeklyScheduleForACourse['WeekDay3'],
	$row_RsGetWeeklyScheduleForACourse['WeekDay4'],
	$row_RsGetWeeklyScheduleForACourse['WeekDay5'],
	$row_RsGetWeeklyScheduleForACourse['WeekDay6']); 
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

mysql_select_db($database_conn, $conn);
$query_RsGetCourses = "SELECT * FROM eschool_courses WHERE EndDate >= CURDATE()";
$RsGetCourses = mysql_query($query_RsGetCourses, $conn) or die(mysql_error());
$row_RsGetCourses = mysql_fetch_assoc($RsGetCourses);
$totalRows_RsGetCourses = mysql_num_rows($RsGetCourses);
?>

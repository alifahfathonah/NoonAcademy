<?php
allow_access_to_admins_only();
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

// The Function Below will make sure the the Course Schedule is allready inserted or not.
function fnCheckIfCoursesScheduleExisted($colname_RsChkClassScheduleIfExisted = "-1",$database_conn, $conn){
	
/* //$colname_RsChkClassScheduleIfExisted = "-1";
if (isset($_GET['CourseID'])) {
  $colname_RsChkClassScheduleIfExisted = $_GET['CourseID'];
} */
mysql_select_db($database_conn, $conn);
$query_RsChkClassScheduleIfExisted = sprintf("SELECT * FROM eschool_courses_schedule WHERE CourseID = %s", GetSQLValueString($colname_RsChkClassScheduleIfExisted, "int"));
$RsChkClassScheduleIfExisted = mysql_query($query_RsChkClassScheduleIfExisted, $conn) or die(mysql_error());
$row_RsChkClassScheduleIfExisted = mysql_fetch_assoc($RsChkClassScheduleIfExisted);
return $totalRows_RsChkClassScheduleIfExisted = mysql_num_rows($RsChkClassScheduleIfExisted);
	
}// end of fnCheckIfCoursesScheduleExisted


	
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
	if(fnCheckIfCoursesScheduleExisted($_POST['CourseID'],$database_conn, $conn)){
	fnShowMessageBox(MSG_CHK_EXISTANCE_OF_COURSE_SCHEDULE,MSG_TITLE_CHK_EXISTANCE_OF_COURSE_SCHEDULE);
}else{
  $insertSQL = sprintf("INSERT INTO eschool_courses_schedule (CourseID, WeekDay0, WeekDay1, WeekDay2, WeekDay3, WeekDay4, WeekDay5, WeekDay6, TeacherUserID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                     
                       GetSQLValueString($_POST['CourseID'], "int"),
                       GetSQLValueString(isset($_POST['WeekDay0']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay1']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay2']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay3']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay4']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay5']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay6']) ? "true" : "", "defined","1","0"),
					   GetSQLValueString($_SESSION['MM_UserID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
  fnShowMessageBox(MSG_COURSE_SCHEDULE_ADDED,MSG_TITLE_COURSE_SCHEDULE_ADDED);
  }// End of if Function Check fnCheckIfCoursesScheduleExisted
}// end of if insert

$colname_RsGetTeachersCourses = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetTeachersCourses = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetTeachersCourses = sprintf("SELECT * FROM eschool_courses WHERE TeacherUserID = %s ORDER BY CourseID DESC", GetSQLValueString($colname_RsGetTeachersCourses, "int"));
$RsGetTeachersCourses = mysql_query($query_RsGetTeachersCourses, $conn) or die(mysql_error());
$row_RsGetTeachersCourses = mysql_fetch_assoc($RsGetTeachersCourses);
$totalRows_RsGetTeachersCourses = mysql_num_rows($RsGetTeachersCourses);
?>

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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE eschool_courses_schedule SET CourseID=%s, WeekDay0=%s, WeekDay1=%s, WeekDay2=%s, WeekDay3=%s, WeekDay4=%s, WeekDay5=%s, WeekDay6=%s WHERE CourseClassScheduleID=%s",
                       GetSQLValueString($_POST['CourseID'], "int"),
                       GetSQLValueString(isset($_POST['WeekDay0']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay1']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay2']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay3']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay4']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay5']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString(isset($_POST['WeekDay6']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['CourseClassScheduleID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());

  $updateGoTo = "?page_id=_teacher_cpanel/teacher_courses_schedule_list";
/*   if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  } */
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_RsGetScheduleForEdit = "-1";
if (isset($_GET['EditID'])) {
  $colname_RsGetScheduleForEdit = $_GET['EditID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetScheduleForEdit = sprintf("SELECT * FROM eschool_courses_schedule WHERE CourseClassScheduleID = %s", GetSQLValueString($colname_RsGetScheduleForEdit, "int"));
$RsGetScheduleForEdit = mysql_query($query_RsGetScheduleForEdit, $conn) or die(mysql_error());
$row_RsGetScheduleForEdit = mysql_fetch_assoc($RsGetScheduleForEdit);
$totalRows_RsGetScheduleForEdit = mysql_num_rows($RsGetScheduleForEdit);

$colname_RsGetCourses = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetCourses = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetCourses = sprintf("SELECT * FROM eschool_courses WHERE TeacherUserID = %s ORDER BY CourseName ASC", GetSQLValueString($colname_RsGetCourses, "int"));
$RsGetCourses = mysql_query($query_RsGetCourses, $conn) or die(mysql_error());
$row_RsGetCourses = mysql_fetch_assoc($RsGetCourses);
$totalRows_RsGetCourses = mysql_num_rows($RsGetCourses);
?>

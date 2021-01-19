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

$colname_Rs_GetTeacherCoursesList = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_Rs_GetTeacherCoursesList = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
if($_SESSION['MM_UserGroup']==1){
$query_Rs_GetTeacherCoursesList = sprintf("SELECT eschool_courses.*, eschool_subjects.SubjectTitle FROM eschool_courses, eschool_subjects WHERE eschool_courses.EndDate>=CURDATE() AND eschool_courses.SubjectID=eschool_subjects.SubjectID  AND eschool_courses.IsEnrollable=1", GetSQLValueString($colname_Rs_GetTeacherCoursesList, "int"));	
}else{
$query_Rs_GetTeacherCoursesList = sprintf("SELECT eschool_courses.*, eschool_subjects.SubjectTitle FROM eschool_courses, eschool_subjects WHERE eschool_courses.EndDate>=CURDATE() AND TeacherUserID = %s AND eschool_courses.SubjectID=eschool_subjects.SubjectID  AND eschool_courses.IsEnrollable=1", GetSQLValueString($colname_Rs_GetTeacherCoursesList, "int"));
}
$Rs_GetTeacherCoursesList = mysql_query($query_Rs_GetTeacherCoursesList, $conn) or die(mysql_error());
$row_Rs_GetTeacherCoursesList = mysql_fetch_assoc($Rs_GetTeacherCoursesList);
$totalRows_Rs_GetTeacherCoursesList = mysql_num_rows($Rs_GetTeacherCoursesList);
?>


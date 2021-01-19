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

$colname_RsGetMyScheduledClasses = "-1";
if (isset($_POST['CourseID'])) {
  $colname_RsGetMyScheduledClasses = $_POST['CourseID'];
}
$colname2_RsGetMyScheduledClasses = "-1";
if (isset($_SESSION['MM_UserGroup'])) {
  $colname2_RsGetMyScheduledClasses = $_SESSION['MM_UserGroup'];
}
mysql_select_db($database_conn, $conn);

$query_RsGetMyScheduledClasses = sprintf("SELECT * FROM eschool_courses_classes WHERE CourseID = %s", GetSQLValueString($colname_RsGetMyScheduledClasses, "int"));
if(!isset($_POST['CourseID'])) {
	$query_RsGetMyScheduledClasses = sprintf("SELECT * FROM eschool_courses_classes WHERE TeacherUserID = %s", GetSQLValueString($colname2_RsGetMyScheduledClasses, "int"));
}

$RsGetMyScheduledClasses = mysql_query($query_RsGetMyScheduledClasses, $conn) or die(mysql_error());
$row_RsGetMyScheduledClasses = mysql_fetch_assoc($RsGetMyScheduledClasses);
$totalRows_RsGetMyScheduledClasses = mysql_num_rows($RsGetMyScheduledClasses);
?>

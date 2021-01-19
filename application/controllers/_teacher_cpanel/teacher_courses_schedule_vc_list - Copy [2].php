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
  $colname2_RsGetMyScheduledClasses = $_SESSION['MM_UserID']; // Get Teacher User Id
}

$SelectedCourseID= 0;
if (isset($_POST['CourseID']) && !empty($_POST['CourseID'])) {
  $SelectedCourseID = $_POST['CourseID']; // Get Teacher User Id
}else if (isset($_GET['CourseID']) && !empty($_GET['CourseID'])) {
  $SelectedCourseID = $_GET['CourseID']; // Get Teacher User Id

}
mysql_select_db($database_conn, $conn);

//$query_RsGetMyScheduledClasses = sprintf("SELECT * FROM eschool_courses_classes WHERE CourseID = %s", GetSQLValueString($colname_RsGetMyScheduledClasses, "int"));

if($SelectedCourseID==0 && isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==2) { // for Teacher
	$query_RsGetMyScheduledClasses = sprintf("SELECT * FROM eschool_courses_classes WHERE TeacherUserID = %s", GetSQLValueString($colname2_RsGetMyScheduledClasses, "int"));
}else if($SelectedCourseID>0 && isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==2) { // For Teacher With Course ID
		$query_RsGetMyScheduledClasses = sprintf("SELECT * FROM eschool_courses_classes WHERE TeacherUserID = %s AND CourseID=%s", GetSQLValueString($colname2_RsGetMyScheduledClasses, "int"),GetSQLValueString($SelectedCourseID, "int"));
}else  if($SelectedCourseID==0 && isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==1) { // For Administrator
	$query_RsGetMyScheduledClasses = sprintf("SELECT * FROM eschool_courses_classes ");
}else  if($SelectedCourseID>0 && isset($_SESSION['MM_UserGroup']) && $_SESSION['MM_UserGroup']==1) { // For Administrator with Course ID
	$query_RsGetMyScheduledClasses = sprintf("SELECT * FROM eschool_courses_classes WHERE CourseID=%s",GetSQLValueString($SelectedCourseID,"int"));
}

$RsGetMyScheduledClasses = mysql_query($query_RsGetMyScheduledClasses, $conn) or die(mysql_error());
$row_RsGetMyScheduledClasses = mysql_fetch_assoc($RsGetMyScheduledClasses);
$totalRows_RsGetMyScheduledClasses = mysql_num_rows($RsGetMyScheduledClasses);
?>

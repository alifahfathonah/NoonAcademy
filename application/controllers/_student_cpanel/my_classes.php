<?php
allow_access_to_students_only();
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

$maxRows_Rs_GetMyClasses = 20;
$pageNum_Rs_GetMyClasses = 0;
if (isset($_GET['pageNum_Rs_GetMyClasses'])) {
  $pageNum_Rs_GetMyClasses = $_GET['pageNum_Rs_GetMyClasses'];
}
$startRow_Rs_GetMyClasses = $pageNum_Rs_GetMyClasses * $maxRows_Rs_GetMyClasses;

$colname_Rs_GetMyClasses = "-1";
if (isset($_SESSION['MM_UserID'])) {
   $colname_Rs_GetMyClasses = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
  $query_Rs_GetMyClasses = sprintf("SELECT  eschool_courses_studdent_wiziq_classes.*, eschool_courses.CourseName,eschool_courses_classes.WizIQ_start_time FROM eschool_courses_studdent_wiziq_classes, eschool_courses,eschool_courses_classes WHERE 
  eschool_courses_classes.WizIQ_start_time>=NOW() AND 
  eschool_courses_studdent_wiziq_classes.StudentUserID = %s AND eschool_courses_studdent_wiziq_classes.CourseID=eschool_courses.CourseID
   AND eschool_courses_classes.WizIQ_class_id=eschool_courses_studdent_wiziq_classes.WizIQ_class_id ORDER BY eschool_courses_studdent_wiziq_classes.StdClassID DESC", GetSQLValueString($colname_Rs_GetMyClasses, "int"));
$query_limit_Rs_GetMyClasses = sprintf("%s LIMIT %d, %d", $query_Rs_GetMyClasses, $startRow_Rs_GetMyClasses, $maxRows_Rs_GetMyClasses);
$Rs_GetMyClasses = mysql_query($query_limit_Rs_GetMyClasses, $conn) or die(mysql_error());
$row_Rs_GetMyClasses = mysql_fetch_assoc($Rs_GetMyClasses);

if (isset($_GET['totalRows_Rs_GetMyClasses'])) {
  $totalRows_Rs_GetMyClasses = $_GET['totalRows_Rs_GetMyClasses'];
} else {
  $all_Rs_GetMyClasses = mysql_query($query_Rs_GetMyClasses);
  $totalRows_Rs_GetMyClasses = mysql_num_rows($all_Rs_GetMyClasses);
}
$totalPages_Rs_GetMyClasses = ceil($totalRows_Rs_GetMyClasses/$maxRows_Rs_GetMyClasses)-1;


//********************* Start of Expired Classes List ******************
/*
mysql_select_db($database_conn, $conn);
  $query_Rs_GetMyClasses_Expired = sprintf("SELECT  eschool_courses_studdent_wiziq_classes.*, eschool_courses.CourseName FROM eschool_courses_studdent_wiziq_classes, eschool_courses WHERE eschool_courses_studdent_wiziq_classes.StudentUserID = %s AND eschool_courses_studdent_wiziq_classes.CourseID=eschool_courses.CourseID", GetSQLValueString($colname_Rs_GetMyClasses, "int"));
$Rs_GetMyClasses_Expired = mysql_query($query_Rs_GetMyClasses_Expired , $conn) or die(mysql_error());
$row_Rs_GetMyClasses_Expired = mysql_fetch_assoc($Rs_GetMyClasses_Expired);
*/

//********************* End of Expired Classes List ********************


// EXPIRED

  $query_Rs_GetMyClasses_Expired = sprintf("SELECT  eschool_courses_studdent_wiziq_classes.*, eschool_courses.CourseName,eschool_courses_classes.WizIQ_start_time FROM eschool_courses_studdent_wiziq_classes, eschool_courses,eschool_courses_classes WHERE 
  eschool_courses_classes.WizIQ_start_time<NOW() AND 
  eschool_courses_studdent_wiziq_classes.StudentUserID = %s AND eschool_courses_studdent_wiziq_classes.CourseID=eschool_courses.CourseID
   AND eschool_courses_classes.WizIQ_class_id=eschool_courses_studdent_wiziq_classes.WizIQ_class_id ORDER BY eschool_courses_studdent_wiziq_classes.StdClassID DESC", GetSQLValueString($colname_Rs_GetMyClasses, "int"));
$Rs_GetMyClasses_Expired = mysql_query($query_Rs_GetMyClasses_Expired, $conn) or die(mysql_error());
$row_Rs_GetMyClasses_Expired = mysql_fetch_assoc($Rs_GetMyClasses_Expired);
$totalRows_Rs_GetMyClasses_Expired = mysql_num_rows($Rs_GetMyClasses_Expired );
//END of EXPIRED
?>

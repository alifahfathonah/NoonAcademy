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

$colname_RsCheckCurrentEnrollmentStatus = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsCheckCurrentEnrollmentStatus = $_SESSION['MM_UserID'];
}
$colname2_RsCheckCurrentEnrollmentStatus = "-1";
if (isset($_GET['CourseID'])) {
  $colname2_RsCheckCurrentEnrollmentStatus = $_GET['CourseID'];
}
mysql_select_db($database_conn, $conn);
$query_RsCheckCurrentEnrollmentStatus = sprintf("SELECT * FROM eschool_courses_studdent_entrollments WHERE StudentUserID = %s AND eschool_courses_studdent_entrollments.CourseID=%s", GetSQLValueString($colname_RsCheckCurrentEnrollmentStatus, "int"),GetSQLValueString($colname2_RsCheckCurrentEnrollmentStatus, "int"));
$RsCheckCurrentEnrollmentStatus = mysql_query($query_RsCheckCurrentEnrollmentStatus, $conn) or die(mysql_error());
$row_RsCheckCurrentEnrollmentStatus = mysql_fetch_assoc($RsCheckCurrentEnrollmentStatus);
$totalRows_RsCheckCurrentEnrollmentStatus = mysql_num_rows($RsCheckCurrentEnrollmentStatus);


if($totalRows_RsCheckCurrentEnrollmentStatus<=0) {
if ((isset($_GET["CourseID"])) && (!empty($_GET["CourseID"])) && isset($_SESSION['MM_UserID'])) {

	
	  $insertSQL = sprintf("INSERT INTO  eschool_courses_studdent_entrollments (
	`CourseID` ,
	`StudentUserID` ,
	`WhoUserID` ,
	`CreateAt`) VALUES (%s,%s,%s,%s)",
	   GetSQLValueString($_GET["CourseID"],"int"),
	   GetSQLValueString($_SESSION['MM_UserID']),
	   GetSQLValueString($_SESSION['MM_UserID'],"int"),
	   GetSQLValueString(date("Y-m-d H:i:s"), "date"));
	
	  mysql_select_db($database_conn, $conn);
	  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
	


	
	  $insertGoTo = "index.php?page_id=thank_you";
	/*   if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	  } */
	  header(sprintf("Location: %s", $insertGoTo));
}// end of student enrollement to a course
}else{
	fnShowMessageBox(MSG_STUDENT_ALREADY_ENTROLLED_TO_COURSE,MSG_TITLE_STUDENT_ALREADY_ENTROLLED_TO_COURSE);
}//end of checking if allready existed $totalRows_RsCheckCurrentEnrollmentStatus
mysql_free_result($RsCheckCurrentEnrollmentStatus);
?>

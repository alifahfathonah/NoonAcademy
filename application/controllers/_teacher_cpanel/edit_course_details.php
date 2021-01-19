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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE eschool_courses SET CourseName=%s, `Description`=%s,  StartDate=%s, EndDate=%s, IsEnrollable=%s, MaxNoOfStudent=%s, TotalNoOfClasses=%s, CourseFee=%s, TeacherUserID=%s, TeacherLibID=%s, SubjectID=%s WHERE CourseID=%s",
                       GetSQLValueString($_POST['CourseName'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['StartDate'], "date"),
                       GetSQLValueString($_POST['EndDate'], "date"),
                       GetSQLValueString(isset($_POST['IsEnrollable']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['MaxNoOfStudent'], "int"),
                       GetSQLValueString($_POST['TotalNoOfClasses'], "int"),
                       GetSQLValueString($_POST['CourseFee'], "double"),
                       GetSQLValueString($_POST['TeacherUserID'], "int"),
                       GetSQLValueString($_POST['TeacherLibID'], "int"),
                       GetSQLValueString($_POST['SubjectID'], "int"),
                       GetSQLValueString($_POST['CourseID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form2")) {
	
	$UploadedFileName="";
	if (($UploadedFileName=fnUploadFileToPath('ContentDataFileName',USER_COURSES_UPLOAD_PATH))=='NOTALLOWED'){
		fnShowMessageBox(MSG_FILE_UPLOAD_FAILED,MSG_TITLE_FILE_UPLOAD_FAILED);
		
	}else{
  $updateSQL = sprintf("UPDATE eschool_courses SET  ContentDataFileName=%s  WHERE CourseID=%s",
                       GetSQLValueString($UploadedFileName, "text"),
                       GetSQLValueString($_POST['CourseID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
	}// end of file Uploaed Check
}
mysql_select_db($database_conn, $conn);
$query_RsGetSubjectsID = "SELECT * FROM eschool_subjects";
$RsGetSubjectsID = mysql_query($query_RsGetSubjectsID, $conn) or die(mysql_error());
$row_RsGetSubjectsID = mysql_fetch_assoc($RsGetSubjectsID);
$totalRows_RsGetSubjectsID = mysql_num_rows($RsGetSubjectsID);

mysql_select_db($database_conn, $conn);
$query_RsGetTeacherUserID = "SELECT * FROM user_accounts WHERE GroupID = 2";
$RsGetTeacherUserID = mysql_query($query_RsGetTeacherUserID, $conn) or die(mysql_error());
$row_RsGetTeacherUserID = mysql_fetch_assoc($RsGetTeacherUserID);
$totalRows_RsGetTeacherUserID = mysql_num_rows($RsGetTeacherUserID);

mysql_select_db($database_conn, $conn);
$query_RsGetTeacherLibraryID = "SELECT * FROM eschool_teacher_library";
$RsGetTeacherLibraryID = mysql_query($query_RsGetTeacherLibraryID, $conn) or die(mysql_error());
$row_RsGetTeacherLibraryID = mysql_fetch_assoc($RsGetTeacherLibraryID);
$totalRows_RsGetTeacherLibraryID = mysql_num_rows($RsGetTeacherLibraryID);

$colname_RSGetCourseForEdit = "-1";
if (isset($_GET['EditID'])) {
  $colname_RSGetCourseForEdit = $_GET['EditID'];
}
mysql_select_db($database_conn, $conn);
$query_RSGetCourseForEdit = sprintf("SELECT * FROM eschool_courses WHERE CourseID = %s", GetSQLValueString($colname_RSGetCourseForEdit, "int"));
$RSGetCourseForEdit = mysql_query($query_RSGetCourseForEdit, $conn) or die(mysql_error());
$row_RSGetCourseForEdit = mysql_fetch_assoc($RSGetCourseForEdit);
$totalRows_RSGetCourseForEdit = mysql_num_rows($RSGetCourseForEdit);
if(mysql_affected_rows()){
	fnShowMessageBox(MSG_COURSE_DETAILS_UPDATED,MSG_TITLE_COURSE_DETAILS_UPDATED);
}
?>

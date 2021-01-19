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


$colname_RsGetTeacherLibraryMeterial = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetTeacherLibraryMeterial = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
 $query_RsGetTeacherLibraryMeterial = sprintf("SELECT eschool_teacher_library.TeacherLibID, eschool_teacher_library.LibName, eschool_teacher_library_meterial.TeacherLibMetrialID
FROM eschool_teacher_library, eschool_teacher_library_meterial
WHERE TeacherUserID =%s
AND eschool_teacher_library.TeacherLibID = eschool_teacher_library_meterial.TeacherLibID", GetSQLValueString($colname_RsGetTeacherLibraryMeterial, "int"));
$RsGetTeacherLibraryMeterial = mysql_query($query_RsGetTeacherLibraryMeterial, $conn) or die(mysql_error());
$row_RsGetTeacherLibraryMeterial = mysql_fetch_assoc($RsGetTeacherLibraryMeterial);
$totalRows_RsGetTeacherLibraryMeterial = mysql_num_rows($RsGetTeacherLibraryMeterial);

if($totalRows_RsGetTeacherLibraryMeterial>0) // Teacher Library Item Found Then Delte it
{

if ((isset($_GET['DeleteID'])) && ($_GET['DeleteID'] != "") && (isset($_SESSION['MM_UserID']))) {
  $deleteSQL = sprintf("DELETE FROM eschool_teacher_library_meterial WHERE TeacherLibMetrialID=%s",
                       GetSQLValueString($_GET['DeleteID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());
  if(mysql_affected_rows()>0){
  fnShowMessageBox(MSG_TEACHER_LIBRARY_METERIAL_DELETED,MSG_TITLE_TEACHER_LIBRARY_METERIAL_DELETED);
  }else{
	  // Delete Failed
	fnShowMessageBox(MSG_TEACHER_LIBRARY_METERIAL_NOT_DELETED,MSG_TITLE_TEACHER_LIBRARY_METERIAL_NOT_DELETED);  
  }
}	
	
}else{
	// Delete Failed
  fnShowMessageBox(MSG_TEACHER_LIBRARY_METERIAL_NOT_DELETED,MSG_TITLE_TEACHER_LIBRARY_METERIAL_NOT_DELETED);
}

mysql_free_result($RsGetTeacherLibraryMeterial);
?>

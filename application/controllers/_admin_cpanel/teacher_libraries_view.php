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

$colname_Rs_GetLibrary = "-1";
if (isset($_GET['ViewID'])) {
  $colname_Rs_GetLibrary = $_GET['ViewID'];
}

mysql_select_db($database_conn, $conn);
$query_Rs_GetLibrary = sprintf("SELECT * FROM eschool_teacher_library WHERE TeacherLibID = %s ", GetSQLValueString($colname_Rs_GetLibrary, "int"));
$Rs_GetLibrary = mysql_query($query_Rs_GetLibrary, $conn) or die(mysql_error());
$row_Rs_GetLibrary = mysql_fetch_assoc($Rs_GetLibrary);
$totalRows_Rs_GetLibrary = mysql_num_rows($Rs_GetLibrary);
if($totalRows_Rs_GetLibrary<=0) {
	fnShowMessageBox(MSG_TEACHER_LIBRARY_NOT_FOUND,MSG_TITLE_TEACHER_LIBRARY_NOT_FOUND);
	
}
if(!empty($row_Rs_GetLibrary['TeacherLibID'])){
mysql_select_db($database_conn, $conn);
$query_Rs_GetMeterialUploadList = "SELECT eschool_teacher_library_meterial.*, eschool_share_with_types.ShareWith FROM eschool_teacher_library_meterial, eschool_share_with_types WHERE TeacherLibID = ".$row_Rs_GetLibrary['TeacherLibID']." AND  eschool_teacher_library_meterial.ShareWithID= eschool_share_with_types.ShareWithID ";
$Rs_GetMeterialUploadList = mysql_query($query_Rs_GetMeterialUploadList, $conn) or die(mysql_error());
$row_Rs_GetMeterialUploadList = mysql_fetch_assoc($Rs_GetMeterialUploadList);
$totalRows_Rs_GetMeterialUploadList = mysql_num_rows($Rs_GetMeterialUploadList);
}
?>
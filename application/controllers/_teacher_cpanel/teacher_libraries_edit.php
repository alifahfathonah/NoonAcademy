<?php
allow_access_to_teachers_and_admins_only();
// Teacher Panel Controller
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
  $updateSQL = sprintf("UPDATE eschool_teacher_library SET LibName=%s, LibDescription=%s, TeacherUserID=%s WHERE TeacherLibID=%s",
                       GetSQLValueString($_POST['LibName'], "text"),
                       GetSQLValueString($_POST['LibDescription'], "text"),
                       GetSQLValueString($_SESSION['MM_UserID'], "int"),
                       GetSQLValueString($_POST['TeacherLibID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

$colname_RsGetSelectedLibrary = "-1";
if (isset($_GET['EditID'])) {
  $colname_RsGetSelectedLibrary = $_GET['EditID'];
}

$colname2_RsGetSelectedLibrary = "-1";
if (isset($_SESSION)) {
  $colname2_RsGetSelectedLibrary = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetSelectedLibrary = sprintf("SELECT * FROM eschool_teacher_library WHERE TeacherLibID = %s AND TeacherUserID=%s", GetSQLValueString($colname_RsGetSelectedLibrary, "int"),
GetSQLValueString($colname2_RsGetSelectedLibrary, "int") 
);
$RsGetSelectedLibrary = mysql_query($query_RsGetSelectedLibrary, $conn) or die(mysql_error());
$row_RsGetSelectedLibrary = mysql_fetch_assoc($RsGetSelectedLibrary);
$totalRows_RsGetSelectedLibrary = mysql_num_rows($RsGetSelectedLibrary);


?>

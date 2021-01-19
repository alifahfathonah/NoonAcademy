<?php
allow_access_to_admins_only();
// Admin Panel Controller
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
                       GetSQLValueString($_POST['TeacherUserID'], "int"),
                       GetSQLValueString($_POST['TeacherLibID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_RSGetTeacherUserID = "SELECT UserID, Username, FirstName, MiddleNames, LastNames FROM user_accounts WHERE GroupID = 2 ORDER BY UserID DESC";
$RSGetTeacherUserID = mysql_query($query_RSGetTeacherUserID, $conn) or die(mysql_error());
$row_RSGetTeacherUserID = mysql_fetch_assoc($RSGetTeacherUserID);
$totalRows_RSGetTeacherUserID = mysql_num_rows($RSGetTeacherUserID);

$colname_RsGetSelectedLibrary = "-1";
if (isset($_GET['EditID'])) {
  $colname_RsGetSelectedLibrary = $_GET['EditID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetSelectedLibrary = sprintf("SELECT * FROM eschool_teacher_library WHERE TeacherLibID = %s", GetSQLValueString($colname_RsGetSelectedLibrary, "int"));
$RsGetSelectedLibrary = mysql_query($query_RsGetSelectedLibrary, $conn) or die(mysql_error());
$row_RsGetSelectedLibrary = mysql_fetch_assoc($RsGetSelectedLibrary);
$totalRows_RsGetSelectedLibrary = mysql_num_rows($RsGetSelectedLibrary);


?>

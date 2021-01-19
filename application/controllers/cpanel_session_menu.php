<?php
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

$colname_Rs_GetCurrentUserName = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_Rs_GetCurrentUserName = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_Rs_GetCurrentUserName = sprintf("SELECT FirstName, MiddleNames, LastNames FROM user_accounts WHERE UserID = %s", GetSQLValueString($colname_Rs_GetCurrentUserName, "text"));
$Rs_GetCurrentUserName = mysql_query($query_Rs_GetCurrentUserName, $conn) or die(mysql_error());
$row_Rs_GetCurrentUserName = mysql_fetch_assoc($Rs_GetCurrentUserName);
$totalRows_Rs_GetCurrentUserName = mysql_num_rows($Rs_GetCurrentUserName);
$FullName=$row_Rs_GetCurrentUserName['FirstName']. " " . $row_Rs_GetCurrentUserName['LastNames'];
mysql_free_result($Rs_GetCurrentUserName);
?>

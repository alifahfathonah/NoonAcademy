<?php require_once('../Connections/conn.php'); ?>
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

$colname_RsGetUsername = "-1";
if (isset($_POST['Username'])) {
  $colname_RsGetUsername = strtolower($_POST['Username']);
}
mysql_select_db($database_conn, $conn);
$query_RsGetUsername = sprintf("SELECT * FROM user_accounts WHERE Username = %s", GetSQLValueString($colname_RsGetUsername, "text"));
$RsGetUsername = mysql_query($query_RsGetUsername, $conn) or die(mysql_error());
$row_RsGetUsername = mysql_fetch_assoc($RsGetUsername);
$totalRows_RsGetUsername = mysql_num_rows($RsGetUsername);

if($totalRows_RsGetUsername>0 ||
	 ($colname_RsGetUsername=="admin")  ||
	 ($colname_RsGetUsername=="administrator") ||
	 ($colname_RsGetUsername=="info") ||
	 ($colname_RsGetUsername=="sysadmin") ||
	 ($colname_RsGetUsername=="system") ||
	 ($colname_RsGetUsername=="systemadministrator") ||
	 ($colname_RsGetUsername=="webmaster") ||
	 ($colname_RsGetUsername=="web-master")
  ){
	
	echo "TRUE";
	
}// Username Allready Existed
else
{
	echo   "FALSE";	
}
@mysql_free_result($RsGetUsername);
?>

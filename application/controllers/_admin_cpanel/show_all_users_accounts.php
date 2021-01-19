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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Rs_GetAllUserAccounts = 30;
$pageNum_Rs_GetAllUserAccounts = 0;
if (isset($_GET['pageNum_Rs_GetAllUserAccounts'])) {
  $pageNum_Rs_GetAllUserAccounts = $_GET['pageNum_Rs_GetAllUserAccounts'];
}
$startRow_Rs_GetAllUserAccounts = $pageNum_Rs_GetAllUserAccounts * $maxRows_Rs_GetAllUserAccounts;

mysql_select_db($database_conn, $conn);
$query_Rs_GetAllUserAccounts = "SELECT * FROM user_accounts ORDER BY UserID DESC";
$query_limit_Rs_GetAllUserAccounts = sprintf("%s LIMIT %d, %d", $query_Rs_GetAllUserAccounts, $startRow_Rs_GetAllUserAccounts, $maxRows_Rs_GetAllUserAccounts);
$Rs_GetAllUserAccounts = mysql_query($query_limit_Rs_GetAllUserAccounts, $conn) or die(mysql_error());
$row_Rs_GetAllUserAccounts = mysql_fetch_assoc($Rs_GetAllUserAccounts);

if (isset($_GET['totalRows_Rs_GetAllUserAccounts'])) {
  $totalRows_Rs_GetAllUserAccounts = $_GET['totalRows_Rs_GetAllUserAccounts'];
} else {
  $all_Rs_GetAllUserAccounts = mysql_query($query_Rs_GetAllUserAccounts);
  $totalRows_Rs_GetAllUserAccounts = mysql_num_rows($all_Rs_GetAllUserAccounts);
}
$totalPages_Rs_GetAllUserAccounts = ceil($totalRows_Rs_GetAllUserAccounts/$maxRows_Rs_GetAllUserAccounts)-1;

$queryString_Rs_GetAllUserAccounts = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Rs_GetAllUserAccounts") == false && 
        stristr($param, "totalRows_Rs_GetAllUserAccounts") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Rs_GetAllUserAccounts = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Rs_GetAllUserAccounts = sprintf("&totalRows_Rs_GetAllUserAccounts=%d%s", $totalRows_Rs_GetAllUserAccounts, $queryString_Rs_GetAllUserAccounts);
?>
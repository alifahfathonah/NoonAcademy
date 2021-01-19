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

$maxRows_RsGetNewsFeed = 10;
$pageNum_RsGetNewsFeed = 0;
if (isset($_GET['pageNum_RsGetNewsFeed'])) {
  $pageNum_RsGetNewsFeed = $_GET['pageNum_RsGetNewsFeed'];
}
$startRow_RsGetNewsFeed = $pageNum_RsGetNewsFeed * $maxRows_RsGetNewsFeed;

mysql_select_db($database_conn, $conn);
$query_RsGetNewsFeed = "SELECT * FROM news ORDER BY NewsID DESC";
$query_limit_RsGetNewsFeed = sprintf("%s LIMIT %d, %d", $query_RsGetNewsFeed, $startRow_RsGetNewsFeed, $maxRows_RsGetNewsFeed);
$RsGetNewsFeed = mysql_query($query_limit_RsGetNewsFeed, $conn) or die(mysql_error());
$row_RsGetNewsFeed = mysql_fetch_assoc($RsGetNewsFeed);

if (isset($_GET['totalRows_RsGetNewsFeed'])) {
  $totalRows_RsGetNewsFeed = $_GET['totalRows_RsGetNewsFeed'];
} else {
  $all_RsGetNewsFeed = mysql_query($query_RsGetNewsFeed);
  $totalRows_RsGetNewsFeed = mysql_num_rows($all_RsGetNewsFeed);
}
$totalPages_RsGetNewsFeed = ceil($totalRows_RsGetNewsFeed/$maxRows_RsGetNewsFeed)-1;
?>
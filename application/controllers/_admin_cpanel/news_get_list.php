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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_Rs_GetNewsList = 20;
$pageNum_Rs_GetNewsList = 0;
if (isset($_GET['pageNum_Rs_GetNewsList'])) {
  $pageNum_Rs_GetNewsList = $_GET['pageNum_Rs_GetNewsList'];
}
$startRow_Rs_GetNewsList = $pageNum_Rs_GetNewsList * $maxRows_Rs_GetNewsList;

mysql_select_db($database_conn, $conn);
$query_Rs_GetNewsList = "SELECT news.*,content_languages.* FROM news, content_languages WHERE news.Content_LanguageID=content_languages.ContentLanguageID ";
$query_limit_Rs_GetNewsList = sprintf("%s LIMIT %d, %d", $query_Rs_GetNewsList, $startRow_Rs_GetNewsList, $maxRows_Rs_GetNewsList);
$Rs_GetNewsList = mysql_query($query_limit_Rs_GetNewsList, $conn) or die(mysql_error());
$row_Rs_GetNewsList = mysql_fetch_assoc($Rs_GetNewsList);

if (isset($_GET['totalRows_Rs_GetNewsList'])) {
  $totalRows_Rs_GetNewsList = $_GET['totalRows_Rs_GetNewsList'];
} else {
  $all_Rs_GetNewsList = mysql_query($query_Rs_GetNewsList);
  $totalRows_Rs_GetNewsList = mysql_num_rows($all_Rs_GetNewsList);
}
$totalPages_Rs_GetNewsList = ceil($totalRows_Rs_GetNewsList/$maxRows_Rs_GetNewsList)-1;

$queryString_Rs_GetNewsList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Rs_GetNewsList") == false && 
        stristr($param, "totalRows_Rs_GetNewsList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Rs_GetNewsList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Rs_GetNewsList = sprintf("&totalRows_Rs_GetNewsList=%d%s", $totalRows_Rs_GetNewsList, $queryString_Rs_GetNewsList);
?>
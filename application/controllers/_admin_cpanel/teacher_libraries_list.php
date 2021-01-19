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

$maxRows_RsGetTeachersLibs = 10;
$pageNum_RsGetTeachersLibs = 0;
if (isset($_GET['pageNum_RsGetTeachersLibs'])) {
  $pageNum_RsGetTeachersLibs = $_GET['pageNum_RsGetTeachersLibs'];
}
$startRow_RsGetTeachersLibs = $pageNum_RsGetTeachersLibs * $maxRows_RsGetTeachersLibs;

$colname_RsGetTeachersLibs = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetTeachersLibs = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
//$query_RsGetTeachersLibs = sprintf("SELECT * FROM eschool_teacher_library WHERE TeacherUserID = %s", GetSQLValueString($colname_RsGetTeachersLibs, "int"));
$query_RsGetTeachersLibs = sprintf("SELECT eschool_teacher_library.*,user_accounts.Username FROM eschool_teacher_library,user_accounts WHERE eschool_teacher_library.TeacherUserID=user_accounts.UserID  ORDER BY  	eschool_teacher_library.TeacherLibID DESC ");
$query_limit_RsGetTeachersLibs = sprintf("%s LIMIT %d, %d", $query_RsGetTeachersLibs, $startRow_RsGetTeachersLibs, $maxRows_RsGetTeachersLibs);
$RsGetTeachersLibs = mysql_query($query_limit_RsGetTeachersLibs, $conn) or die(mysql_error());
$row_RsGetTeachersLibs = mysql_fetch_assoc($RsGetTeachersLibs);

if (isset($_GET['totalRows_RsGetTeachersLibs'])) {
  $totalRows_RsGetTeachersLibs = $_GET['totalRows_RsGetTeachersLibs'];
} else {
  $all_RsGetTeachersLibs = mysql_query($query_RsGetTeachersLibs);
  $totalRows_RsGetTeachersLibs = mysql_num_rows($all_RsGetTeachersLibs);
}
$totalPages_RsGetTeachersLibs = ceil($totalRows_RsGetTeachersLibs/$maxRows_RsGetTeachersLibs)-1;

$queryString_RsGetTeachersLibs = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsGetTeachersLibs") == false && 
        stristr($param, "totalRows_RsGetTeachersLibs") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsGetTeachersLibs = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsGetTeachersLibs = sprintf("&totalRows_RsGetTeachersLibs=%d%s", $totalRows_RsGetTeachersLibs, $queryString_RsGetTeachersLibs);
?>
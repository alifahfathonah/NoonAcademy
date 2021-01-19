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

$maxRows_RsCoursesList = 10;
$pageNum_RsCoursesList = 0;
if (isset($_GET['pageNum_RsCoursesList'])) {
  $pageNum_RsCoursesList = $_GET['pageNum_RsCoursesList'];
}
$startRow_RsCoursesList = $pageNum_RsCoursesList * $maxRows_RsCoursesList;

$colname_RsCoursesList = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsCoursesList = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsCoursesList = sprintf("SELECT `eschool_courses`.*,`eschool_subjects`.* FROM `eschool_courses`,`eschool_subjects` WHERE `eschool_courses`.`SubjectID` = `eschool_subjects`.`SubjectID` AND TeacherUserID = %s ORDER BY `eschool_courses`.CourseID DESC", GetSQLValueString($colname_RsCoursesList, "int"));
$query_limit_RsCoursesList = sprintf("%s LIMIT %d, %d", $query_RsCoursesList, $startRow_RsCoursesList, $maxRows_RsCoursesList);
$RsCoursesList = mysql_query($query_limit_RsCoursesList, $conn) or die(mysql_error());
$row_RsCoursesList = mysql_fetch_assoc($RsCoursesList);

if (isset($_GET['totalRows_RsCoursesList'])) {
  $totalRows_RsCoursesList = $_GET['totalRows_RsCoursesList'];
} else {
  $all_RsCoursesList = mysql_query($query_RsCoursesList);
  $totalRows_RsCoursesList = mysql_num_rows($all_RsCoursesList);
}
$totalPages_RsCoursesList = ceil($totalRows_RsCoursesList/$maxRows_RsCoursesList)-1;

$queryString_RsCoursesList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsCoursesList") == false && 
        stristr($param, "totalRows_RsCoursesList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsCoursesList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsCoursesList = sprintf("&totalRows_RsCoursesList=%d%s", $totalRows_RsCoursesList, $queryString_RsCoursesList);
?>

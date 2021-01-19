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

$maxRows_RsGetTeachersSecheduleList = 10;
$pageNum_RsGetTeachersSecheduleList = 0;
if (isset($_GET['pageNum_RsGetTeachersSecheduleList'])) {
  $pageNum_RsGetTeachersSecheduleList = $_GET['pageNum_RsGetTeachersSecheduleList'];
}
$startRow_RsGetTeachersSecheduleList = $pageNum_RsGetTeachersSecheduleList * $maxRows_RsGetTeachersSecheduleList;

$colname_RsGetTeachersSecheduleList = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetTeachersSecheduleList = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetTeachersSecheduleList = sprintf("SELECT eschool_courses_schedule.*, eschool_courses.* FROM eschool_courses_schedule, eschool_courses WHERE eschool_courses_schedule.TeacherUserID = %s AND eschool_courses_schedule.CourseID =eschool_courses.CourseID", GetSQLValueString($colname_RsGetTeachersSecheduleList, "int"));
$query_limit_RsGetTeachersSecheduleList = sprintf("%s LIMIT %d, %d", $query_RsGetTeachersSecheduleList, $startRow_RsGetTeachersSecheduleList, $maxRows_RsGetTeachersSecheduleList);
$RsGetTeachersSecheduleList = mysql_query($query_limit_RsGetTeachersSecheduleList, $conn) or die(mysql_error());
$row_RsGetTeachersSecheduleList = mysql_fetch_assoc($RsGetTeachersSecheduleList);

if (isset($_GET['totalRows_RsGetTeachersSecheduleList'])) {
  $totalRows_RsGetTeachersSecheduleList = $_GET['totalRows_RsGetTeachersSecheduleList'];
} else {
  $all_RsGetTeachersSecheduleList = mysql_query($query_RsGetTeachersSecheduleList);
  $totalRows_RsGetTeachersSecheduleList = mysql_num_rows($all_RsGetTeachersSecheduleList);
}
$totalPages_RsGetTeachersSecheduleList = ceil($totalRows_RsGetTeachersSecheduleList/$maxRows_RsGetTeachersSecheduleList)-1;

$queryString_RsGetTeachersSecheduleList = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsGetTeachersSecheduleList") == false && 
        stristr($param, "totalRows_RsGetTeachersSecheduleList") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsGetTeachersSecheduleList = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsGetTeachersSecheduleList = sprintf("&totalRows_RsGetTeachersSecheduleList=%d%s", $totalRows_RsGetTeachersSecheduleList, $queryString_RsGetTeachersSecheduleList);
?>

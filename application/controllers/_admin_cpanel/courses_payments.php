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
// Process Selected course Entrollment for Payment and Mark the enrolledment as Paid
if ((isset($_GET["ViewID"])) && ($_GET["ViewID"] >0)) {
  $updateSQL = sprintf("UPDATE eschool_courses_studdent_entrollments SET IsPaid=1 WHERE CEID=%s",  
                       GetSQLValueString($_GET["ViewID"], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($updateSQL, $conn) or die(mysql_error());
}

$maxRows_RsGetMyCourses = 10;
$pageNum_RsGetMyCourses = 0;
if (isset($_GET['pageNum_RsGetMyCourses'])) {
  $pageNum_RsGetMyCourses = $_GET['pageNum_RsGetMyCourses'];
}
$startRow_RsGetMyCourses = $pageNum_RsGetMyCourses * $maxRows_RsGetMyCourses;

$colname_RsGetMyCourses = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsGetMyCourses = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsGetMyCourses = sprintf("SELECT user_accounts.Username,user_accounts.FirstName,
user_accounts.MiddleNames,
user_accounts.LastNames,
eschool_courses.*,
eschool_subjects.* ,eschool_courses_studdent_entrollments.* 
FROM 
eschool_courses,
eschool_subjects,
eschool_courses_studdent_entrollments,user_accounts
WHERE 
eschool_courses.SubjectID = eschool_subjects.SubjectID  
AND 
eschool_courses_studdent_entrollments.CourseID=eschool_courses.CourseID
AND 
eschool_courses_studdent_entrollments.IsPaid=0
AND
eschool_courses_studdent_entrollments.StudentUserID=user_accounts.UserID 
ORDER BY
user_accounts.UserID,user_accounts.Username DESC");
$query_limit_RsGetMyCourses = sprintf("%s LIMIT %d, %d", $query_RsGetMyCourses, $startRow_RsGetMyCourses, $maxRows_RsGetMyCourses);
$RsGetMyCourses = mysql_query($query_limit_RsGetMyCourses, $conn) or die(mysql_error());
$row_RsGetMyCourses = mysql_fetch_assoc($RsGetMyCourses);

if (isset($_GET['totalRows_RsGetMyCourses'])) {
  $totalRows_RsGetMyCourses = $_GET['totalRows_RsGetMyCourses'];
} else {
  $all_RsGetMyCourses = mysql_query($query_RsGetMyCourses);
  $totalRows_RsGetMyCourses = mysql_num_rows($all_RsGetMyCourses);
}
$totalPages_RsGetMyCourses = ceil($totalRows_RsGetMyCourses/$maxRows_RsGetMyCourses)-1;


$queryString_RsGetMyCourses = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsGetMyCourses") == false && 
        stristr($param, "totalRows_RsGetMyCourses") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsGetMyCourses = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsGetMyCourses = sprintf("&totalRows_RsGetMyCourses=%d%s", $totalRows_RsGetMyCourses, $queryString_RsGetMyCourses);

?>
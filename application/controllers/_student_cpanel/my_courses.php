<?php
allow_access_to_students_only();
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

if ((isset($_GET['DeleteID'])) && ($_GET['DeleteID'] != "") && (isset($_SESSION['MM_UserID']))) {
  $deleteSQL = sprintf("DELETE FROM eschool_courses_studdent_entrollments WHERE CEID=%s AND StudentUserID=%s",
                       GetSQLValueString($_GET['DeleteID'], "int"),
					    GetSQLValueString($_SESSION['MM_UserID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($deleteSQL, $conn) or die(mysql_error());
}

$currentPage = $_SERVER["PHP_SELF"];

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
$query_RsGetMyCourses = sprintf("SELECT eschool_courses.*,eschool_subjects.* ,eschool_courses_studdent_entrollments.*
FROM 
eschool_courses,
eschool_subjects,
eschool_courses_studdent_entrollments
WHERE 
eschool_courses.SubjectID = eschool_subjects.SubjectID  AND eschool_courses_studdent_entrollments.CourseID=eschool_courses.CourseID AND eschool_courses_studdent_entrollments.StudentUserID=%s AND 
eschool_courses.EndDate>CURDATE() AND
eschool_courses_studdent_entrollments.IsPaid=0", GetSQLValueString($colname_RsGetMyCourses, "int"));
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

// Get List of Paid Courses
$query_RsGetMyCourses_paid = sprintf("SELECT eschool_courses.*,eschool_subjects.* ,eschool_courses_studdent_entrollments.*
FROM 
eschool_courses,
eschool_subjects,
eschool_courses_studdent_entrollments
WHERE 
eschool_courses.SubjectID = eschool_subjects.SubjectID  AND eschool_courses_studdent_entrollments.CourseID=eschool_courses.CourseID AND eschool_courses_studdent_entrollments.StudentUserID=%s AND eschool_courses_studdent_entrollments.IsPaid=1", GetSQLValueString($colname_RsGetMyCourses, "int"));
 
$RsGetMyCourses_paid = mysql_query($query_RsGetMyCourses_paid, $conn) or die(mysql_error());
$row_RsGetMyCourses_paid = mysql_fetch_assoc($RsGetMyCourses_paid);
 $totalRows_RsGetMyCourses_paid = mysql_num_rows($RsGetMyCourses_paid);
// End of Listing Paid Courses
?>

 

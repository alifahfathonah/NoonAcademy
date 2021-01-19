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

mysql_select_db($database_conn, $conn);
$query_RsGetStudentCourses = "SELECT  `eschool_courses_studdent_entrollments`.`CourseID`, `eschool_courses`.`CourseName`, `eschool_courses`.`Description`, `eschool_courses`.`StartDate`, `eschool_courses`.`EndDate`, `eschool_courses_studdent_entrollments`.`StudentUserID`, `user_accounts`.`Username`  FROM  `eschool_courses_studdent_entrollments`, `user_accounts`, `eschool_courses` WHERE  `eschool_courses_studdent_entrollments`.`StudentUserID` =`user_accounts`.`UserID`  AND `eschool_courses_studdent_entrollments`.`CourseID` =`eschool_courses`.`CourseID`";
$RsGetStudentCourses = mysql_query($query_RsGetStudentCourses, $conn) or die(mysql_error());
$row_RsGetStudentCourses = mysql_fetch_assoc($RsGetStudentCourses);
$totalRows_RsGetStudentCourses = mysql_num_rows($RsGetStudentCourses);

mysql_free_result($RsGetStudentCourses);
?>

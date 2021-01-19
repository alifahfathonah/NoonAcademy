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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO eschool_courses (CourseName, `Description`, ContentDataFileName, StartDate, EndDate, IsEnrollable, MaxNoOfStudent, TotalNoOfClasses, CourseFee, TeacherUserID, TeacherLibID, SubjectID) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['CourseName'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['ContentDataFileName'], "text"),
                       GetSQLValueString($_POST['StartDate'], "date"),
                       GetSQLValueString($_POST['EndDate'], "date"),
                       GetSQLValueString(isset($_POST['IsEnrollable']) ? "true" : "", "defined","1","0"),
                       GetSQLValueString($_POST['MaxNoOfStudent'], "int"),
                       GetSQLValueString($_POST['TotalNoOfClasses'], "int"),
                       GetSQLValueString($_POST['CourseFee'], "double"),
                       GetSQLValueString($_POST['TeacherUserID'], "int"),
                       GetSQLValueString($_POST['TeacherLibID'], "int"),
                       GetSQLValueString($_POST['SubjectID'], "int"));

  mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
}

mysql_select_db($database_conn, $conn);
$query_RsSubjects = "SELECT * FROM eschool_subjects ORDER BY SubjectTitle ASC";
$RsSubjects = mysql_query($query_RsSubjects, $conn) or die(mysql_error());
$row_RsSubjects = mysql_fetch_assoc($RsSubjects);
$totalRows_RsSubjects = mysql_num_rows($RsSubjects);

$colname_RsTeacherLibrary = "-1";
if (isset($_SESSION['MM_UserID'])) {
  $colname_RsTeacherLibrary = $_SESSION['MM_UserID'];
}
mysql_select_db($database_conn, $conn);
$query_RsTeacherLibrary = sprintf("SELECT TeacherLibID, LibName FROM eschool_teacher_library WHERE TeacherLibID = %s ORDER BY TeacherLibID DESC", GetSQLValueString($colname_RsTeacherLibrary, "int"));
$RsTeacherLibrary = mysql_query($query_RsTeacherLibrary, $conn) or die(mysql_error());
$row_RsTeacherLibrary = mysql_fetch_assoc($RsTeacherLibrary);
$totalRows_RsTeacherLibrary = mysql_num_rows($RsTeacherLibrary);
?>
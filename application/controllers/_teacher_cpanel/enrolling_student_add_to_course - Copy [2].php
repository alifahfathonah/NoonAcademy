<?php
allow_access_to_teachers_and_admins_only();
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
if(!isset($_POST['CourseID']) && $_POST['CourseID']<=0){
	ob_clean();
	header("Location: ?page_id=_teacher_cpanel/enrolling_student_get_course_list.php");
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
	$TeacherUserID=0;
	
if($_SESSION['MM_UserGroup']==1){
			//Get Teacher ID for the Selected Courses	
				$colname_RsGetTeacherID = "-1";
			if (isset($_POST['CourseID'])) {
			  $colname_RsGetTeacherID = $_POST['CourseID'];
			}
			mysql_select_db($database_conn, $conn);
			$query_RsGetTeacherID = sprintf("SELECT TeacherUserID FROM eschool_courses WHERE CourseID = %s", GetSQLValueString($colname_RsGetTeacherID, "int"));
			$RsGetTeacherID = mysql_query($query_RsGetTeacherID, $conn) or die(mysql_error());
			$row_RsGetTeacherID = mysql_fetch_assoc($RsGetTeacherID);
			$totalRows_RsGetTeacherID = mysql_num_rows($RsGetTeacherID);
			
			//Get Teacher ID for the Selected Courses
			$TeacherUserID=$row_RsGetTeacherID['TeacherUserID'];	
}else{
			$TeacherUserID=$_SESSION['MM_UserID'];
}


if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "frmAddThisStudentToCourse")) {
	
	if(!empty($_POST['UserID'])) {
		
		foreach($_POST['UserID'] as $checkUserID) {
		if(!IsAlreadyEntrolled($_POST['CourseID'],$checkUserID)){
	
	  $insertSQL = sprintf("INSERT INTO  eschool_courses_studdent_entrollments (
	CourseID ,
	StudentUserID ,
	TeacherUserID,
	WhoUserID ,
	CreateAt) VALUES (%s,%s,%s,%s,%s)",
	   GetSQLValueString($_POST['CourseID'],"int"),
	   GetSQLValueString($checkUserID,"int"),
	   GetSQLValueString($TeacherUserID,"int"),	   
	   GetSQLValueString($_SESSION['MM_UserID'],"int"),
	   GetSQLValueString(date("Y-m-d H:i:s"), "date"));
	
	  mysql_select_db($database_conn, $conn);
	  $Result1 = mysql_query($insertSQL, $conn) or die(mysql_error());
		}// end of IsAlreadyEntrolled
		}// end for foreach
 		
	}//end of Empty Check
	
	  $insertGoTo = "index.php?page_id=_teacher_cpanel/enrolled_student_list&STATUS=STUDENTSADDED";
	/*   if (isset($_SERVER['QUERY_STRING'])) {
		$insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
		$insertGoTo .= $_SERVER['QUERY_STRING'];
	  } */
	  header(sprintf("Location: %s", $insertGoTo));
}// end of frmAddThisStudentToCourse

$maxRows_RsGetStudentDetails = 10;
$pageNum_RsGetStudentDetails = 0;
if (isset($_GET['pageNum_RsGetStudentDetails'])) {
  $pageNum_RsGetStudentDetails = $_GET['pageNum_RsGetStudentDetails'];
}
$startRow_RsGetStudentDetails = $pageNum_RsGetStudentDetails * $maxRows_RsGetStudentDetails;

mysql_select_db($database_conn, $conn);
$query_RsGetStudentDetails = "SELECT * FROM user_accounts WHERE GroupID = 3 AND user_accounts.AccountStatus=1  
ORDER BY UserID DESC";
$query_limit_RsGetStudentDetails = sprintf("%s LIMIT %d, %d", $query_RsGetStudentDetails, $startRow_RsGetStudentDetails, $maxRows_RsGetStudentDetails);
$RsGetStudentDetails = mysql_query($query_limit_RsGetStudentDetails, $conn) or die(mysql_error());
$row_RsGetStudentDetails = mysql_fetch_assoc($RsGetStudentDetails);

if (isset($_GET['totalRows_RsGetStudentDetails'])) {
  $totalRows_RsGetStudentDetails = $_GET['totalRows_RsGetStudentDetails'];
} else {
  $all_RsGetStudentDetails = mysql_query($query_RsGetStudentDetails);
  $totalRows_RsGetStudentDetails = mysql_num_rows($all_RsGetStudentDetails);
}
$totalPages_RsGetStudentDetails = ceil($totalRows_RsGetStudentDetails/$maxRows_RsGetStudentDetails)-1;

$queryString_RsGetStudentDetails = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_RsGetStudentDetails") == false && 
        stristr($param, "totalRows_RsGetStudentDetails") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_RsGetStudentDetails = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_RsGetStudentDetails = sprintf("&totalRows_RsGetStudentDetails=%d%s", $totalRows_RsGetStudentDetails, $queryString_RsGetStudentDetails);


function IsAlreadyEntrolled($vCourseID,$vUserID){
	global $database_conn;
	global $conn;
mysql_select_db($database_conn, $conn);
echo $query_RsCheckIfStudentNotCourse = "SELECT user_accounts . * FROM     user_accounts,  (SELECT  user_accounts . *,     eschool_courses_studdent_entrollments.CourseID FROM     user_accounts,     eschool_courses_studdent_entrollments WHERE     user_accounts.GroupID = 3         AND user_accounts.AccountStatus = 1         AND user_accounts.UserID = eschool_courses_studdent_entrollments.StudentUserID         AND eschool_courses_studdent_entrollments.CourseID =".$vCourseID.") as EnrolledStudents WHERE  user_accounts.GroupID = 3 AND  EnrolledStudents.UserID =user_accounts.UserID AND user_accounts.UserID=".$vUserID;
$RsCheckIfStudentNotCourse = mysql_query($query_RsCheckIfStudentNotCourse, $conn) or die(mysql_error());
$row_RsCheckIfStudentNotCourse = mysql_fetch_assoc($RsCheckIfStudentNotCourse);
$totalRows_RsCheckIfStudentNotCourse = mysql_num_rows($RsCheckIfStudentNotCourse);

mysql_free_result($RsCheckIfStudentNotCourse);	
return $totalRows_RsCheckIfStudentNotCourse;
}
?>
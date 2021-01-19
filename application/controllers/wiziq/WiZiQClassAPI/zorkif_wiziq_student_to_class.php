<?php 
// Add Attendenices to a Class
 if(!isset($_SESSION)) session_start();
  mysql_select_db($database_conn, $conn);
 class ZorkifWizIQClassAddAttendee
{
	
			// Parameter from WizIQ
		private $access_key="sw6tXNP1FeQ=";
		private $secretAcessKey="dBZegbP/VXQEvzz7pcIn2g==";
		private $webServiceUrl="http://class.api.wiziq.com/";
		
	private $CourseID=0;	
	private $WizIQ_class_id=0;
	private $WizIQ_attendee_url="";
	
 
	private function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
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

} //end of GetSQLValueString function
 
	
	
	function SetWizIQClassID($class_id){		
		return $WizIQ_class_id=$class_id;			
	}
	
	function GetWizIQClassAttendeeURL(){
		return $WizIQ_attendee_url;		
	}
	
	function SetCourseID($CourseID){
		return $this->CourseID=$CourseID;		
	}
	function AddAttendee($WizIQ_class_id){
		$addAttendeeStatus=false;
		// Database Functions
		if(!empty($WizIQ_class_id)) $this->WizIQ_class_id=$WizIQ_class_id;
		$colname_RsGetCourseEntrolledStudents =$this->CourseID;
		 
		//mysql_select_db($database_conn, $conn);
		$query_RsGetCourseEntrolledStudents = sprintf("SELECT 
		eschool_courses_studdent_entrollments.CourseID, 
		eschool_courses_studdent_entrollments.StudentUserID,
		CONCAT ( user_accounts.FirstName,' ',user_accounts.LastNames) as screen_name FROM
		eschool_courses_studdent_entrollments,
		user_accounts
		WHERE 
		eschool_courses_studdent_entrollments.StudentUserID=user_accounts.UserID
		AND
		eschool_courses_studdent_entrollments.IsPaid=1
		AND  
		eschool_courses_studdent_entrollments.CourseID = %s", 
		$this->GetSQLValueString($colname_RsGetCourseEntrolledStudents, "int"));
		 
		
		$RsGetCourseEntrolledStudents = mysql_query($query_RsGetCourseEntrolledStudents)
										 or die(mysql_error());
		$row_RsGetCourseEntrolledStudents = mysql_fetch_assoc($RsGetCourseEntrolledStudents);
		$totalRows_RsGetCourseEntrolledStudents = mysql_num_rows($RsGetCourseEntrolledStudents);
		// End of Database Functions
		
		require_once("AuthBase.php");
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$XMLAttendee="<attendee_list>";
		$language_culture_name="en-US";
		 do {  
			 $XMLAttendee=$XMLAttendee ."<attendee>";
			 $XMLAttendee=$XMLAttendee ."<attendee_id><![CDATA[";
			 $XMLAttendee=$XMLAttendee .$row_RsGetCourseEntrolledStudents['StudentUserID']; 
			 $XMLAttendee=$XMLAttendee ."]]></attendee_id>";
			 $XMLAttendee=$XMLAttendee ."<screen_name><![CDATA[";
			 $XMLAttendee=$XMLAttendee .$row_RsGetCourseEntrolledStudents['screen_name']; 
			 $XMLAttendee=$XMLAttendee ."]]></screen_name>";
			 $XMLAttendee=$XMLAttendee ."<language_culture_name><![CDATA[";
			 $XMLAttendee=$XMLAttendee .$language_culture_name;
			 $XMLAttendee=$XMLAttendee ."]]></language_culture_name>";
			 $XMLAttendee=$XMLAttendee ."</attendee>";	     
		 }while ($row_RsGetCourseEntrolledStudents = mysql_fetch_assoc($RsGetCourseEntrolledStudents));
		$XMLAttendee=$XMLAttendee ."</attendee_list>";
		//echo "<textarea cols=\"80\" rows=\"8\">$XMLAttendee </textarea>";
		
		$method = "add_attendees";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"] = $this->WizIQ_class_id; //"11595";//required
		$requestParameters["attendee_list"]=$XMLAttendee;
		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=add_attendees',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
			$status=$objDOM->getElementsByTagName("rsp")->item(0);
    		$attribNode = $status->getAttribute("status");
			if($attribNode=="ok")
			{
				$methodTag=$objDOM->getElementsByTagName("method");
				//echo "<br>method=".$method=$methodTag->item(0)->nodeValue;
				
				$class_idTag=$objDOM->getElementsByTagName("class_id");
				//echo "<br>class_id=".$class_id=$class_idTag->item(0)->nodeValue;
				
				$add_attendeesTag=$objDOM->getElementsByTagName("add_attendees")->item(0);
				//echo "<br>add_attendeesStatus=".$add_attendeesStatus = $add_attendeesTag->getAttribute("status");
				
				$attendeeTag=$objDOM->getElementsByTagName("attendee");
				$length=$attendeeTag->length;
				for($i=0;$i<$length;$i++)
				{
					$attendee_idTag=$objDOM->getElementsByTagName("attendee_id");
					//echo "<br>attendee_id=".$attendee_id=$attendee_idTag->item($i)->nodeValue;
					$attendee_id=$attendee_idTag->item($i)->nodeValue;
					
					$attendee_urlTag=$objDOM->getElementsByTagName("attendee_url");
					//echo "<br>attendee_url=".$attendee_url=$attendee_urlTag->item($i)->nodeValue;
					$attendee_url=$attendee_urlTag->item($i)->nodeValue;
					$insertSQL = sprintf("INSERT INTO eschool_courses_studdent_wiziq_classes (CourseID, StudentUserID, WizIQ_class_id, WizIQ_screen_name, WizIQ_attendee_id, WizIQ_attendee_url, WhoUserID, CreateAt) VALUES (%s, %s, %s, %s, %s, %s, %s, %s)",
                       
                       $this->GetSQLValueString($this->CourseID, "int"),
                       $this->GetSQLValueString($attendee_id, "int"),
                       $this->GetSQLValueString($this->WizIQ_class_id, "text"),
                       $this->GetSQLValueString("", "text"),
                       $this->GetSQLValueString($attendee_id, "text"),
                       $this->GetSQLValueString($attendee_url, "text"),
                       $this->GetSQLValueString($_SESSION['MM_UserID'], "int"),
                       $this->GetSQLValueString(date("Y-m-d H:i:s"), "date"));

  				//mysql_select_db($database_conn, $conn);
  				$Result1 = mysql_query($insertSQL) or die(mysql_error());
 						if(mysql_affected_rows()>0){
							$addAttendeeStatus=true;
						}
				}
 			}
			else if($attribNode=="fail")
			{
				$error=$objDOM->getElementsByTagName("error")->item(0);
				echo "<br><br>". $errorcode = $error->getAttribute("code"); // "<br>errorcode=".	
				echo "<br><br>". $errormsg = $error->getAttribute("msg");// "<br>errormsg=".	
			}
	 	}//end if	
		return $addAttendeeStatus;
   }//end function
	
}// end of class ZorkifWizIQClassAddAttendee


/*  $std=new ZorkifWizIQClassAddAttendee;
 $std->SetCourseID(3);
 $std->SetWizIQClassID(1264450);
 $std->AddAttendee(1264450); */
 	

?>
<?php
class ZorkifWizIQClass {
		// Parameter from WizIQ
		private $access_key="sw6tXNP1FeQ=";
		private $secretAcessKey="dBZegbP/VXQEvzz7pcIn2g==";
		private $webServiceUrl="http://class.api.wiziq.com/";
		
		// Local Defualt
		public $ClassCreateStatus=0; // false;
		public $ClassCreateErrorCode="";
		public $ClassCreateErrorMessage="";
		
		//$secretAcessKey,$access_key,$webServiceUrl
		
		public  $ClassID;
		public  $CourseID; 
		public  $TeacherUserID ;
		public  $CreateAt ;
		public  $WhoUserID;
		

		public  $WizIQ_class_title="";
		public  $WizIQ_start_time=""; 
		public  $WizIQ_presenter_email="";
		public  $WizIQ_duration=60 ;
		public  $WizIQ_attendee_limit=2 ;
		public  $WizIQ_presenter_default_controls="video"; //audio, video
		public  $WizIQ_attendee_default_controls="audio";  //audio, writing
		public  $WizIQ_create_recording="true" ; 
		public  $WizIQ_return_url="http://www.example.com/thankyou.php" ;
		public  $WizIQ_status_ping_url="http://www.example.com/status.php" ;
		public  $WizIQ_language_culture_name="en-us";
		public  $WizIQ_DefinedTimeZone="Asia/Riyadh";

		
		public $WizIQ_get_recording_url; // The Url to download class recordings from
		public $WizIQ_get_class_id;  // The ID of class schedule by the WizIQ Server
		public $WizIQ_get_presenter_url;  // The URL of the VC defined by the WizIQ Server
		public $WizIQ_get_presenter_email;  // The Email Address of the Class Presenter
		
		
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
}
 
	//function ScheduleClassOnWizIQServer($secretAcessKey,$access_key,$webServiceUrl)
	public function ScheduleClassOnWizIQServer()
	{
		require_once("AuthBase.php");
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "create";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		#for teacher account pass parameter 'presenter_email'
                //This is the unique email of the presenter that will identify the presenter in WizIQ. Make sure to add
                //this presenter email to your organization’s teacher account. ’ For more information visit at: (http://developer.wiziq.com/faqs)
		$requestParameters["presenter_email"]=$this->WizIQ_presenter_email;
		#for room based account pass parameters 'presenter_id', 'presenter_name'
		//$requestParameters["presenter_id"] = "40";
		//$requestParameters["presenter_name"] = "vinugeorge";  
		$requestParameters["start_time"] = $this->WizIQ_start_time;
		$requestParameters["title"]= $this->WizIQ_class_title; //Required
		$requestParameters["duration"]=$this->WizIQ_duration; //optional
		$requestParameters["time_zone"]=$this->WizIQ_DefinedTimeZone; //optional
		$requestParameters["attendee_limit"]=$this->WizIQ_attendee_limit; //optional
		$requestParameters["control_category_id"]=""; //optional
		$requestParameters["create_recording"]=$this->WizIQ_create_recording; //optional
		$requestParameters["return_url"]=$this->WizIQ_return_url; //optional
		$requestParameters["status_ping_url"]=$this->WizIQ_status_ping_url; //optional
        $requestParameters["language_culture_name"]=$this->WizIQ_language_culture_name;
		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=create',http_build_query($requestParameters, '', '&')); 
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
			$method=$methodTag->item(0)->nodeValue;
			$class_idTag=$objDOM->getElementsByTagName("class_id");
			$this->WizIQ_get_class_id=$class_id=$class_idTag->item(0)->nodeValue;
			$recording_urlTag=$objDOM->getElementsByTagName("recording_url");
			$this->WizIQ_get_recording_url=$recording_url=$recording_urlTag->item(0)->nodeValue;
			$presenter_emailTag=$objDOM->getElementsByTagName("presenter_email");
			$this->WizIQ_get_presenter_email=$presenter_email=$presenter_emailTag->item(0)->nodeValue;
			$presenter_urlTag=$objDOM->getElementsByTagName("presenter_url");
			$this->WizIQ_get_presenter_url=$presenter_url=$presenter_urlTag->item(0)->nodeValue;
			$this->ClassCreateStatus=1;
			return 1; // Class created successfully on WizIQ Server

		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);
   			$this->ClassCreateErrorCode=$errorcode = $error->getAttribute("code");	
   			$this->ClassCreateErrorMessage=$errormsg = $error->getAttribute("msg");
			$this->ClassCreateStatus=0;	
			return 0;// unable to create the class 
		}
	 }//end if	
   }//end function
   
   
    
   // Now save the Create Class to the Database
   
	public function SaveScheduledClassToDB(){		 
		require_once('Connections/conn.php'); 
		 $insertSQL = sprintf("INSERT INTO eschool_courses_classes (CourseID, TeacherUserID, WizIQ_class_id, WizIQ_start_time,  WizIQ_duration, WizIQ_presenter_url, WizIQ_recording_url, CreateAt, WhoUserID) VALUES (%s, %s, %s, %s, %s, %s,  %s, %s, %s)",
                        $this->GetSQLValueString($this->CourseID,"int"),
					    $this->GetSQLValueString($this->TeacherUserID,"int"),
                        $this->GetSQLValueString($this->WizIQ_get_class_id,"text"),
					    $this->GetSQLValueString($this->WizIQ_start_time,"text"),					  
					    $this->GetSQLValueString($this->WizIQ_duration,"int"),
						$this->GetSQLValueString($this->WizIQ_get_presenter_url,"text"),
					    $this->GetSQLValueString($this->WizIQ_get_recording_url,"text"),				   
					    $this->GetSQLValueString($this->CreateAt,"date"),
					    $this->GetSQLValueString($this->WhoUserID,"int"));

 // mysql_select_db($database_conn, $conn);
  $Result1 = mysql_query($insertSQL) or die(mysql_error());
	}// end of saved scheduledclasstodb
}// end of class CreateWizIQClass
/* 
$WizIQClass =new ZorkifWizIQClass; // WizIQ New Class
$WizIQClass->ClassID;
$WizIQClass->CourseID=1; 
$WizIQClass->TeacherUserID="4"; //$_SESSION['MM_UserID'];
$WizIQClass->CreateAt=date("Y-m-d H:i:s");
$WizIQClass->WhoUserID="4" ;//$_SESSION['MM_UserID'];

 
$WizIQClass->WizIQ_class_title="Testing Class";
$WizIQClass->WizIQ_start_time="2013-1-19 4:01:00";//date("Y-m-d 05:40:00"); 
$WizIQClass->WizIQ_presenter_email="irfan.khan@yahoo.com";
$WizIQClass->WizIQ_duration =30; //in minutes
$WizIQClass->WizIQ_attendee_limit=2; // Defualt Number of Students
$WizIQClass->WizIQ_presenter_default_controls="video"; //audio, video
$WizIQClass->WizIQ_attendee_default_controls="audio";  //audio, writing
$WizIQClass->WizIQ_create_recording ="true"; 
$WizIQClass->WizIQ_return_url="http://www.example.com/thankyou.php" ;
$WizIQClass->WizIQ_status_ping_url="http://www.example.com/status.php" ;
$WizIQClass->WizIQ_language_culture_name="en-us";
if($WizIQClass->ScheduleClassOnWizIQServer()){	
	$WizIQClass->SaveScheduledClassToDB();
	echo "done";	
}else{	
     echo "sorry, the class could not be created";	
}// end of if statement for class scheduling
 */
 
 
 
?>
<?php
class CancelClass
{
				// Parameter from WizIQ
		private $secretAcessKey="Sriqk4YwcmFLf+sRIndV2Q==";
		private $access_key="y3AnOoHdntQ=";
		private $webServiceUrl="http://class.api.wiziq.com/";
		
		private $WizIQ_class_id_defined=0;
		private $CourseID=0;
		
		function SetWizIQClassID($class_id){		
			$this->WizIQ_class_id_defined=$class_id;			
		}
	
	
	 function CancelClass(){
		require_once("AuthBase.php");
		$authBase = new AuthBase($this->secretAcessKey,$this->access_key);
		$method = "cancel";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"] = $this->WizIQ_class_id_defined;
		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($this->webServiceUrl.'?method=cancel',http_build_query($requestParameters, '', '&')); 
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
				echo "method=".$method=$methodTag->item(0)->nodeValue;
				$cancelTag=$objDOM->getElementsByTagName("cancel")->item(0);
				echo "<br>cancel=".$cancel = $cancelTag->getAttribute("status");
			}
			else if($attribNode=="fail")
			{
				$error=$objDOM->getElementsByTagName("error")->item(0);
				echo "<br>errorcode=".$errorcode = $error->getAttribute("code");	
				echo "<br>errormsg=".$errormsg = $error->getAttribute("msg");	
			}
	 	}//end if	
   }//end function
	
}
?>
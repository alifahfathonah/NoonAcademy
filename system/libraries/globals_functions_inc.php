<?php
 
$MessageBoxText="";
$MessageBoxTitle="";
// *****************************************************************************
//  Show Inline Message Box
// *****************************************************************************
function fnShowMessageBox($MessageBoxText="Unknown Status Message",$MessageBoxTitle="No Title Defined"){
// The Styles are located in messages.css file
				echo "<div class=\"message_box\">
						  <div class=\"message_title\">". $MessageBoxTitle ."</div>
						  <p> " . $MessageBoxText ."</p>
						  				
					  </div>";
				  
}
// *****************************************************************************
//   Find Date Difference and Return the Number of Days in between
// *****************************************************************************
function date_diff_in_days($date1, $date2) {
    $current = $date1;
    $datetime2 = date_create($date2);
    $count = 0;
    while(date_create($current) < $datetime2){
        $current = gmdate("Y-m-d", strtotime("+1 day", strtotime($current)));
        $count++;
    }
    return $count;
} 

// *****************************************************************************
// The Function below will returns all the dates between two dates
// *****************************************************************************
function getDatesBetween($StartDate, $EndDate, $Step = '+1 day', $format = 'Y-m-d' ) {

	$dates = array();
	$current = strtotime( $StartDate );
	$EndDate = strtotime( $EndDate );

	while( $current <= $EndDate ) {

		$dates[] = date( $format, $current );
		$current = strtotime( $Step, $current );
	}
	return $dates;
	
}
// *****************************************************************************


// *****************************************************************************
// Email Address Validation Function
// *****************************************************************************
function fnIsEmail($email) {
  // First, we check that there's one @ symbol, 
  // and that the lengths are right.
  if (!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)) {
    // Email invalid because wrong number of characters 
    // in one section or wrong number of @ symbols.
    return false;
  }
  // Split it into sections to make life easier
  $email_array = explode("@", $email);
  $local_array = explode(".", $email_array[0]);
  for ($i = 0; $i < sizeof($local_array); $i++) {
    if
(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&
↪'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$",
$local_array[$i])) {
      return false;
    }
  }
  // Check if domain is IP. If not, 
  // it should be valid domain name
  if (!ereg("^\[?[0-9\.]+\]?$", $email_array[1])) {
    $domain_array = explode(".", $email_array[1]);
    if (sizeof($domain_array) < 2) {
        return false; // Not enough parts to domain
    }
    for ($i = 0; $i < sizeof($domain_array); $i++) {
      if
(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|
↪([A-Za-z0-9]+))$",
$domain_array[$i])) {
        return false;
      }
    }
  }
  return true;
}
// End of Email Address Validation Function
// *****************************************************************************


// *****************************************************************************
// Encryption Decryption Functions
// *****************************************************************************
   $ZorkifSecretKeyForAllEncryption = "ZXD!@786"; // Secret Password Key for Encryption
    function fnEncryptData($sValue)
    {
        return trim(
            base64_encode(
                mcrypt_encrypt(
                    MCRYPT_RIJNDAEL_256,
                    $GLOBALS['ZorkifSecretKeyForAllEncryption'], $sValue, 
                    MCRYPT_MODE_ECB, 
                    mcrypt_create_iv(
                        mcrypt_get_iv_size(
                            MCRYPT_RIJNDAEL_256, 
                            MCRYPT_MODE_ECB
                        ), 
                        MCRYPT_RAND)
                    )
                )
            );
    }

    function fnDecryptData($sValue)
    {
        return trim(
            mcrypt_decrypt(
                MCRYPT_RIJNDAEL_256, 
                $GLOBALS['ZorkifSecretKeyForAllEncryption'], 
                base64_decode($sValue), 
                MCRYPT_MODE_ECB,
                mcrypt_create_iv(
                    mcrypt_get_iv_size(
                        MCRYPT_RIJNDAEL_256,
                        MCRYPT_MODE_ECB
                    ), 
                    MCRYPT_RAND
                )
            )
        );
    }
// *****************************************************************************



// *****************************************************************************

/* is_uploaded_file($_FILES['DisplayImage']['tmp_name'])?fnUploadFileToPath($_FILES['DisplayImage']['tmp_name'],$_FILES['DisplayImage']['name'],USERS_ITEMS_STORE_AND_DEALS_UPLOAD_PATH):"none.jpg"

*/
// *****************************************************************************
function fnUploadFileToPath($FormFiled_Name,$DefinedUploadFilePath=""){ 			
  		     //Cech if no files are bing uploaded at all
			 if(empty($_FILES[$FormFiled_Name]['tmp_name'])) return "none.jpg";
			 switch (pathinfo($_FILES[$FormFiled_Name]['name'], PATHINFO_EXTENSION)){
				 case 'jpg':
				 case 'jpeg':
				 case 'gif':
				 case 'png':
				 case 'doc':
				 case 'docx':
				 case 'xls':
				 case 'xlsx':
				 case 'pdf':
				 case 'zip':
				 case 'rar':
				 break;
			default:
				return "NOTALLOWED";				 
			 }
			// File name of the file being uploaed		 
			$UploadedFileName="";
			if(is_uploaded_file($_FILES[$FormFiled_Name]['tmp_name'])){

			//$upload_file_path=$DefinedUploadFilePath;
			if(empty($DefinedUploadFilePath))
			$upload_file_path=USER_UPLOAD_PATH;
			else 
			$upload_file_path=$DefinedUploadFilePath;
			//if ($error == UPLOAD_ERR_OK) {	 
			$UploadedFileName=$_SESSION['MM_UserID']."_".date("dmyzHs").rand(11111,99999).md5($_FILES[$FormFiled_Name]['name']). ".".pathinfo($_FILES[$FormFiled_Name]['name'], PATHINFO_EXTENSION);
		    $upload_file_path= $upload_file_path.$UploadedFileName;
			$temp=$_FILES[$FormFiled_Name]['tmp_name'];

			move_uploaded_file($temp,$upload_file_path)or die("Can't move file".mysql_error()); 
			//}
            return $UploadedFileName;
			}else{
				return false;	
			}
}

// *****************************************************************************


?>
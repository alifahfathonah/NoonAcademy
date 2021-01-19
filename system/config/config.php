<?php
$config['application_path']="/application";
$config['views_path']="/application/views";
$config['controllers_path']="/application/views";





	//Below are the Relative Physical Paths of File Upload
	define("USER_UPLOAD_PATH","user_uploads/");
	define("USER_LIBRARY_UPLOAD_PATH","user_uploads/library_materials/");
	define("USER_COURSES_UPLOAD_PATH","user_uploads/teacher_courses_materials/");
	define("USER_PROFILE_UPLOAD_PATH","user_uploads/profile_pictures/");

	// Allowed File Extentions for File Upload
	 $AllowedFileExtensions[] = 'doc';
	 $AllowedFileExtensions[] = 'xls';
	 $AllowedFileExtensions[] = 'pdf';
	 $AllowedFileExtensions[] = 'jpeg';
	 $AllowedFileExtensions[] = 'jpg';
	 $AllowedFileExtensions[] = 'gif';
	 
	 // Limit Post Upload File Size  
	 ini_set( 'post_max_size', '50M' );
	 ini_set( 'upload_max_filesize', '50M' );
	 
	 
?>
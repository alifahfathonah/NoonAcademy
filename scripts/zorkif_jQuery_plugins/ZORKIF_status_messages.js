/*
	FileName:     Zorkif_status_messages.js
	Description:  To handle the notifications and status messages on the web page.
	Programmer:   Kifayat Ullah Khan
	Email:		  kifayat@zorkif.com
*/
var ZORKIF_DELAY_TIMER=3000; // Define the fade out delay for the message boxes

function ZORKIF_ShowErrorMessage($data){	 
	 $('#error_message').html($data); 
	 $('#error_message').fadeIn("slow").delay(ZORKIF_DELAY_TIMER).fadeOut("slow");
}; // End of Function

function ZORKIF_ShowWarningMessage($data){	 
	 $('#warning_message').html($data); 
	 $('#warning_message').fadeIn("slow").delay(ZORKIF_DELAY_TIMER).fadeOut("slow");
}; // End of Function 

function ZORKIF_ShowNotificationMessage($data){	 
	 $('#notification_message').html($data); 
	 $('#notification_message').fadeIn("slow").delay(ZORKIF_DELAY_TIMER).fadeOut("slow");
}; // End of Function 


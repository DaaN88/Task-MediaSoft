<?php
	mb_internal_encoding("UTF-8"); //установка внутренней кодировки скрипта

	function validateDataPOST($value){
		
		$value = trim($value);
    	$value = stripslashes($value);
    	$value = strip_tags($value);
    	$value = htmlspecialchars($value);
    	
    	return $value;
   	}
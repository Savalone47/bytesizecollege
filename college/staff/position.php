<?php
function position($level){

	switch ($level) {
		case '1':
		
		return "President";
			break;

		case '2':
		
		return "Admin";
			break;
			
		default:
			return "Teacher";
			break;
	}

}

?>
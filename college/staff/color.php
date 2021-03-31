<?php
function color($i){

	switch ($i) {
		case '1':
		return "bg-b-green";
		break;
		
		case '2':
		return "bg-b-yellow";
		break;

		case '3':
		return "bg-b-blue";
		break;

		case '4':
		return "bg-b-pink";
		break;
		case '5':
		return "bg-b-red";
		break;
		default:
			# code...
		break;
	}


}
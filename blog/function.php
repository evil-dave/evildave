<?php
//run this function on any date time date to make it human friendly
function convert_date($dateR){
	$engMon=array('January','February','March','April','May','June','July','August','September','October','November','December',' ');
	$l_months='January:February:March:April:May:June:July:August:September:October:November:December';
	$dateFormat='F j, Y';
	$months=explode (':', $l_months);
	$months[]='&nbsp;';
	$dfval=strtotime($dateR);
	$dateR=date($dateFormat,$dfval);
	$dateR=str_replace($engMon,$months,$dateR);
	return $dateR;
}

//show the number of comments on any post with good grammar
// @param $number init
function comments_number($number){
	if($number == 1 ){
		echo '1 Comment';
	}elseif( $number == 0 ){
		echo 'No Comments';
	}else{
		echo "$number Comments";
	}

}
/**
 * Sanitizer for DB inputs
 * @param $input mixed - pass any dirty form field
 * @param $link database connection
 */

function clean_input ($input, $link){
	return mysqli_real_escape_string($link, strip_tags(trim($input)));	
}
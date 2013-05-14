<?php

//a helper function to display errors for form fields

function display_error( $array, $key ){
	if ( isset($array[$key] )  ) {
		$message = $array[$key];
		echo "<div class='error message glow'> $message</div>";

	}
}

//retain information user provided before they fucked up.

function display_value($field){
	if (isset($field)) {
		echo $field;
	}
}

//for checking the checked checkbox check this code

function checked($expected, $actual){
	if ($actual == $expected) {
		echo 'checked="checked"';
	}

}
//no closey php


<?php

$input_string = '$2$There once was a man from Nantucket, who kept all of his cash in a bucket.  But his daughter named Nan, ran away with a man and as for the bucket, Nan took it.';

list($prefix, $loop_iterations, $string) = explode('$', $input_string);

// print '<br>Prefix: '.$prefix;
// print '<br>Iterations: '.$loop_iterations;
// print '<br>String: '.$string;

print '<br><pre>'.str_pad(strlen($string), 5).': '.$string.'</pre>';

// print '<br>String length: '.strlen($string);


$character_replacement_array = build_character_replacement_array();

$encoded_string = string_encoding_replacement($string, $character_replacement_array);

// print '<br>'.$encoded_string;
// print '<br>Encoded string length: '.strlen($encoded_string);


print '<pre>'.str_pad(strlen($encoded_string), 5).': '.$encoded_string.'</pre>';




$encoded_string = string_encoding_replacement($encoded_string, $character_replacement_array);

print '<pre>'.str_pad(strlen($encoded_string), 5).': '.$encoded_string.'</pre>';



function string_encoding_replacement($string, $character_replacement_array) {



	// ************************************ { 2022-05-24 - RC } ************************************
	// SET THE DEFAULTS 
	// *********************************************************************************************
	$regex_string = '(?>'.implode('|', $character_replacement_array).')';
	preg_match_all('~'.$regex_string.'~', $string, $matches);






	// ************************************ { 2022-05-24 - RC } ************************************
	// LOOP THROUGH EACH OF THE MATCHES AND PERFORM THE SUBSTITUTION
	// *********************************************************************************************
	foreach ($matches[0] AS $sub) {


		
		$key = array_search ($sub, $character_replacement_array);
		$string = preg_replace('~'.$sub.'~', $key, $string);


		
	}

	

	return $string;



}






function build_character_replacement_array () {



	$character_replacement_array = array(
		'a' => 'th',
		'b' => 'he',
		'c' => 'in',
		'd' => 'er',
		'e' => 'an',
		'f' => 're',
		'g' => 'nd',
		'h' => 'at',
		'i' => 'on',
		'j' => 'nt',
		'k' => 'ha',
		'l' => 'es',
		'm' => 'st',
		'n' => 'en',
		'o' => 'ed',
		'p' => 'to',
		'q' => 'it',
		'r' => 'ou',
		's' => 'ea',
		't' => 'hi',
		'u' => 'is',
		'v' => 'or',
		'w' => 'ti',
		'x' => 'as',
		'y' => 'te',
		'z' => 'et',
		'0' => 'ng',
		'1' => 'of',
		'2' => 'al',
		'3' => 'de',
		'4' => 'se',
		'5' => 'le',
		'6' => 'sa',
		'7' => 'si',
		'8' => 'ar',
		'9' => 've',
		'_' => 'ra',
		'+' => 'ld',
		'=' => 'ur'
	);



	return $character_replacement_array;



}

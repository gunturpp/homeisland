<?php

//$number='9000000';
//echo number_format($number, 0, '', '.');


//$stringsCollection = [];

// while (sizeof($stringsCollection) != 6){
// 	$randString = random_string($length);

// 	if (!isset($stringsCollection[$randString])){
// 		$stringsCollection[$randString] = 1;
// 	}

// }
// print_r(array_keys($stringsCollection));

$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

$arr = str_split($chars,1);
shuffle($arr);
echo substr(implode('', $arr), 0,10);
?>




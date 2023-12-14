<?php

/**
 * The $arr array should contain the english alphabet in the format  Array ([0] => a, [1] => b, [2] => c, ...)
 */

$arr = range('a', 'z');

echo 'Array (';
foreach ($arr as $key => $value) {
	echo " [$key] => $value";
	if ($key < count($arr) - 1) {
		echo ',';
	}
}
echo ' )';

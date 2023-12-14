<?php

/**
 * The expected output is "apple, banana, cherry, tomato"
 * Please modify only the function itself, nothing else
 */

function filterArray($validOptions, $input)
{
	foreach ($input as $key => $value) {
		if (!in_array($value, $validOptions)) {
			unset($input[$key]);
		}
	}
	echo implode(', ', $input);
}

$input = ['apple', 'bear', 'beef', 'banana', 'cherry', 'tomato', 'car'];
$validOptions = ['apple', 'pear', 'banana', 'cherry', 'tomato'];


filterArray($validOptions, $input);

<?php

/**
 * 1) This script should print  "Here is the name: $name - $name2"
 * $name variables are decided as seen in the code, fix all the bugs whilst keeping the functionality!
 *
 * 2) The print_r should print 5 random names; Please modify only the functions themselves, not the way we invoke them.
 */

// define("PHP_EOL", "\n");

$arr = [];

function combineNames($str1 = "", $str2 = "")
{
	$params = [$str1, $str2];
	foreach ($params as &$param) {
		if ($param == "") {
			$param = randomHeroName();
		}
	}
	echo "Here is the name: " . implode(" - ", $params);
	echo PHP_EOL . PHP_EOL;
}

function randomGenerate(&$arr, $amount)
{
	for ($i = $amount; $i > 0; $i--) {
		array_push($arr, randomHeroName());
	}
	// return $amount;
}

function randomHeroName()
{
	$hero_firstnames = ["captain", "doctor", "iron", "Hank", "ant", "Wasp", "the", "Hawk", "Spider", "Black"];
	$hero_lastnames = ["America", "Strange", "man", "Pym", "girl", "hulk", "eye", "widow", "panther", "daredevil"];
	$heroes = [$hero_firstnames, $hero_lastnames];
	return $heroes[0][rand(0, 9)] . " " . $heroes[1][rand(0, 9)];
}

combineNames();
echo '<br>';

$fiveHeroesHolder = [];
randomGenerate($fiveHeroesHolder, 5);
print_r($fiveHeroesHolder);


// var_dump(defined("PHP_EOL")); // should output if exists: bool(true) 
<?php
	$file ='counter.txt';
	$current = file_get_contents($file);
	$current = $current + 1;
	file_put_contents($file, $current);
	echo "Loenduri väärtus on: " . $current;
?>

<?php 
function add_num(int $n, int $m, bool $yn): int {
	if($yn === true)
		return $n + $m;
	else
		return 99;
}

echo add_num(1,2,true);
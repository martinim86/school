<?php
$a = $argv[1];
$b = $argv[2];
function go($a,$b) {
	if($a===$b)return $b;
	if($a < $b){
		return $a.",".go($a+1,$b);
	}elseif($a > $b) {
		return $a.",".go($a-1,$b);
	} 
}

?>
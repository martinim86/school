<?php
function go($a,$b) {
	if($a===$b)return 1;
	if($a < $b){
		return $a.",".go($a+1,$b);
	}elseif($a > $b) {
		return $a.",".go($a-1,$b);
	} else {
		return "error";
	}
}
echo go(6,1);
?>
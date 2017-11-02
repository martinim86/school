<?php
class DiceRoller 
{
	public $diceValues;
	public  $diceCount;
	public $count;
	public $index;
	
	function __construct($count = 6,$diceCount,$index) {
       $this->diceCount=$diceCount;
	   $this->diceValue=$diceValue;
	   $this->index=$index;
	   $this->roll($diceCount,$index);
    }
	public function getCount()
    {
		return $this->diceCount;
    }
	public function getValue()
    {
		$i=1;
		foreach($this->diceValues as $values){
		   echo $i.")".$this->index."= ".$values.",";
		   $i++;
	   }
    }
	public function roll($diceCount,$index)
    {
		$diceValues = array();
		for ($i = 1; $i <= $diceCount; $i++) {
		$diceValues[]=mt_rand(1,6);
		}
		$this->diceValues=$diceValues;
		$this->diceCount=$diceCount;
    }
	public function total()
    {
		echo array_sum($this->diceValues);
       
    }
	public function __toString()
    {
		echo "(";
       foreach($this->diceValues as $values){
		   echo $values.",";
	   }
	   echo ")";
    }
}


class RiggedDiceRoller extends DiceRoller {
	public $minValue;
	public function RiggedDice($count, $min)
    {
	
    }
	public function getMin(){
		echo min($this->diceValues);
		echo $this->minValue;
		$this->minValue = min($this->diceValues);
	}
	
}


$obj= new DiceRoller(3,4,"Index");
echo $obj->diceValues."<br>";
echo $obj->diceCount."<br>";
echo $obj->getCount()."<br>";
echo $obj->getValue()."<br>";;
echo $obj->__toString()."<br>";
echo $obj->total()."<br>";
echo $obj->index."<br>";

$obj2= new RiggedDiceRoller(3,4,"Index");
echo $obj2->getMin()."<br>";;
echo $obj2->minValue."<br>";;

?>
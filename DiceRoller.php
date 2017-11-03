<?php
class DiceRoller {
    /*массив значений, выпавших на костях*/
	private $diceValues = [];
	/*количество костей*/
	private $diceCount;
    /*конструктор. Считать что на всех костях изначально выпала шестёрка*/
	function __construct($count = 6) {

    }
    /*возвращает количество костей*/
	public function getCount(){
		return $this->diceCount;
    }
    /*возвращает значение на кости с указанныи индексом*/
	public function getValue($index)
    {
		return $this->roll($index);
    }
    /*бросаает кость с указанным индексом*/
	public function roll($index)
    {
        return mt_rand(1,6);
    }
    /*возвращает сумму значений на всех костях*/
	public function total()
    {
		return array_sum($this->diceValues);
    }
    /*возаращает значения всех костей в виде строки*/
	public function __toString()
    {
        return  implode(",", $this->diceValues);
    }
}


class RiggedDiceRoller extends DiceRoller {
    /*минимальное значение для результата броска кости*/
	public $minValue;
	/*начение для костей по-умолчанию */
	public function RiggedDice($count, $min)
    {

	}
	/*возвращает минимальное значение для результата броска кости*/
	public function getMin()
    {

	}

}


$obj= new DiceRoller();
echo $obj;

//?>
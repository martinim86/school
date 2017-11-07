<?php
class DiceRoller {
    /*массив значений, выпавших на костях*/
    /**
     * @var $diceValues = [];
     */
    private $diceValues = [];
	/*количество костей*/
	private $diceCount;
    /*конструктор. Считать что на всех костях изначально выпала шестёрка*/
	function __construct($count = 6) {
        for ($i = 0; $i <= $this->diceCount; $i++) {
            $this->roll(1);
        }
    }
    /*возвращает количество костей*/
	public function getCount(){
		return $this->diceCount;
    }
    /*возвращает значение на кости с указанныи индексом*/
	public function getValue($index)
    {
		return $this->diceValues;
    }
    /*бросаает кость с указанным индексом*/
	public function roll($index)
    {
        array_push($this->diceValues,mt_rand(1,6));
    }
    /*возвращает сумму значений на всех костях*/
	public function total()
    {
		return array_sum($this->diceValues);
    }
    /*возаращает значения всех костей в виде строки*/
	public function __toString()
    {
        return  "(".implode(",", $this->diceValues).")";
    }
}


class RiggedDiceRoller extends DiceRoller {
    /*минимальное значение для результата броска кости*/
	public $minValue;
	/*значение для костей по-умолчанию */
	public function RiggedDice($count, $min)
    {

	}
	/*возвращает минимальное значение для результата броска кости*/
	public function getMin()
    {
        $this->minValue = min($this->getValue(1));
	}

}


$obj= new RiggedDiceRoller();
echo $obj;
$obj->getMin();
echo $obj->minValue;

//?>
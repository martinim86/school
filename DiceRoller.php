<?php

/**
 * Class DiceRoller
 *
 * https://gist.github.com/kroer/aec66e84ff4d63fa7c46a5eeb65ac958
 */
class DiceRoller {
    /*массив значений, выпавших на костях*/
    /**
     * @var $diceValues = [];
     */
    protected $diceValues = [];
	/*количество костей*/
	private $diceCount;
    /*конструктор. Считать что на всех костях изначально выпала шестёрка*/
	function __construct($count) {
        for ($i = 1; $i <= $count; $i++) {
            $this->diceValues[$i] = 6;
        }
    }
    /*возвращает количество костей*/
	public function getCount(){
		return $this->diceCount;
    }
    /*возвращает значение на кости с указанныи индексом*/
	public function getValue($index)
    {
		return array_pop($this->diceValues);
    }
    /*бросаает кость с указанным индексом*/
	public function roll($index)
    {
        $this->diceValues[$index]=mt_rand(1,6);
    }
    /*возвращает сумму значений на всех костях*/
	public function total()
    {
		return array_sum($this->diceValues);
    }
    /*возаращает значения всех костей в виде строки*/
	public function __toString()
    {
        return  "&ldquo; {".implode(",", $this->diceValues)."} &rdquo;";
    }
}


class RiggedDiceRoller extends DiceRoller {
    /*минимальное значение для результата броска кости*/
	private $minValue;

	/*значение для костей по-умолчанию */
    function __construct($count, $min)
    {
        parent::__construct($count);
        $this->minValue = $min;
	}
	/*возвращает минимальное значение для результата броска кости*/
	public function getMin()
    {
        return $this->minValue;
	}
    public function total()
    {
        return array_sum($this->diceValues)+1;
    }
    public function __toString()
    {
        return  "rigged &ldquo; {".implode(",", $this->diceValues)."} &rdquo; min ".$this->minValue;
    }

}


$obj= new RiggedDiceRoller(3,4);
echo $obj;


//?>
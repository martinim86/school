<?php

/**
 * Class DiceRoller generates throwing dice
 *
 * https://gist.github.com/kroer/aec66e84ff4d63fa7c46a5eeb65ac958
 */
class DiceRoller {
    /**
     * @var $diceValues = [];
     */
    protected $diceValues = [];
    /**
     * @var $diceCount
     */
	private $diceCount;
    /**
     * DiceRoller constructor.
     *
     * Generate values in throwing dice.
     * To consider that on all dices initially six fell out.
     *
     * @param $count
     */
    function __construct($count) {
        for ($i = 1; $i <= $count; $i++) {
            $this->diceValues[$i] = 6;
        }
        $this->diceCount = $count;
    }
    /**
     * return count of  dice;
     *
     * @return $this->diceCount
     */
    public function getCount(){
		return $this->diceCount;
    }
    /**
     * Return dice value with index
     *
     * @param $index
     * @return string
     */
    public function getValue($index)
    {
        $value = $this->diceValues[$index];
        return "Индекс кубика: ".$index."<br> Значение: ".$value;
    }
    /**
     * Throw dice value with index
     *
     * @param $index
     */
    public function roll($index)
    {
        $this->diceValues[$index]=mt_rand(1,6);
    }
    /**
     * Return sum in all dices
     *
     * @return int
     */
    public function total()
    {
		return array_sum($this->diceValues);
    }
    /**
     * Returm the values ​​of all dices as a string
     *
     * @return string
     */
    public function __toString()
    {
        return  "&ldquo; {".implode(",", $this->diceValues)."} &rdquo;";
    }
}

/**
 * Class RiggedDiceRoller
 *
 * should allow the player to cheat
 */
class RiggedDiceRoller extends DiceRoller {
    /**
     * Minimum value
     *
     * @var $minValue;
     */
	private $minValue;

    /**
     * Overwrites the parent constructor
     * RiggedDiceRoller constructor.
     * @param $count
     * @param $min
     * @throws Exception
     */
    function __construct($count, $min)
    {

        if($min >= 1 && $min <= 6){
            parent::__construct($count);
            $this->minValue = $min;
        } else {
            throw new Exception('Uncorrect minimum ');
        }
    }
    /**
     * Return a minimum value
     * @return mixed
     */
    public function getMin()
    {
        return $this->minValue;
	}

    /**
     * Return a sum of all dices +1
     * @return float|int
     */
    public function total()
    {
        return array_sum($this->diceValues)+1;
    }

    /**
     * Return string ex.  "rigged {4, 3, 6, 5} min 2"
     * @return string
     */
    public function __toString()
    {
        return  "rigged &ldquo; {".implode(",", $this->diceValues)."} &rdquo; min ".$this->minValue;
    }

}



try {
    $obj= new RiggedDiceRoller(3,4);
    echo $obj->getCount();
} catch( Exception $e ) {
    echo "Error : {$e->getMessage()}";
}
?>
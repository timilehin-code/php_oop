<?php
class calculate
{
    public string $operator;
    public float  $firstNumber;
    public float   $secondNumber;

    public function __construct(float $firstNumber,  string $operator,  float $secondNumber)
    {
        $this->firstNumber = $firstNumber;
        $this->operator = $operator;
        $this->secondNumber = $secondNumber;
    }
    public  function  calculator()
    {
        switch ($this->operator) {
            case 'add':
                $result =  $this->firstNumber + $this->secondNumber;

                break;
            case 'div':
                $result = $this->firstNumber / $this->secondNumber;


            case 'multi':
                $result = $this->firstNumber * $this->secondNumber;

                break;
            case 'sub':
                $result = $this->firstNumber - $this->secondNumber;

                break;
            default:
                echo null;
                break;
        }
        return $result;
    }
}

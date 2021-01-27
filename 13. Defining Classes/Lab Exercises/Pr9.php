<?php

class Number
{
    /**
     * @var int
     */
    private $value;

    /**
     * @var string
     */
    private $lastDigitName;

    /**
     * Number constructor.
     * @param int $value
     */
    public function __construct(int $value)
    {
        $this->value = $value;
        $this->lastDigitName = null;
    }

    public function getLastDigitName(): string
    {
        if (null !== $this->lastDigitName)
        {
            return $this->lastDigitName;
        }

        $lastDigit = $this->value % 10;
        switch ($lastDigit){
            case 0:
                $this->lastDigitName = "zero";
                break;
            case 1:
                $this->lastDigitName = "one";
                break;
            case 2:
                $this->lastDigitName = "two";
                break;
            case 3:
                $this->lastDigitName = "three";
                break;
            case 4:
                $this->lastDigitName = "four";
                break;
            case 5:
                $this->lastDigitName = "five";
                break;
            case 6:
                $this->lastDigitName = "six";
                break;
            case 7:
                $this->lastDigitName = "seven";
                break;
            case 8:
                $this->lastDigitName = "eight";
                break;
            case 9:
                $this->lastDigitName = "nine";
                break;
            default:
                $this->lastDigitName = "none";
                break;
        }

        return $this->lastDigitName;
    }
}

$num = new Number(intval(readline()));
echo $num->getLastDigitName();
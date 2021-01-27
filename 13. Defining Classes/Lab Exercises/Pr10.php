<?php
class DecimalNumber
{
    /**
     * @var string
     */
    private $value;

    /**
     * DecimalNumber constructor.
     * @param string $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function printReversed(): void
    {
        for ($i = strlen($this->value) -1; $i >= 0; $i--)
        {
            echo $this->value[$i];
        }
        echo PHP_EOL;
    }

}

$num = new DecimalNumber(readline());
$num->printReversed();
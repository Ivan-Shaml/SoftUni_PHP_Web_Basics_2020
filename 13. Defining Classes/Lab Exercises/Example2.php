<?php

class Text
{
    private $chars;

    /**
     * Text constructor.
     * @param $chars
     */
    public function __construct($chars)
    {
        $this->chars = $chars;
    }

    function substring(int $start, int $length = -1): Text
    {
        $result = [];
        $start = max(0, $start);
        $start = min(count($this->chars) -1, $start);

        if ($length < 0 || $length >= count($this->chars))
        {
          $length = count($this->chars) - $start;
        }

        for ($i = $start; $i < $start + $length; $i++)
        {
            $result[] = $this->chars[$i];
        }

        return new Text($result);

    }

    public function __toString()
    {
        $result = '';
        foreach ($this -> chars as $char)
        {
            $result .= $char;
        }
        return $result;
    }

}

$name = new Text(['c', 'h', 'u','s', 'h', 'k', 'i']);
echo $name . PHP_EOL; //chushki
echo $name->substring(2,3); //ush
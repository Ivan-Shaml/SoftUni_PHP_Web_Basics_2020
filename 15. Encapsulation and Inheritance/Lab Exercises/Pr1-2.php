<?php

class Box
{
    /**
     * @var float
     */
    private float $length;

    /**
     * @var float
     */
    private float $width;

    /**
     * @var float
     */
    private float $height;

    /**
     * Box constructor.
     * @param float $length
     * @param float $width
     * @param float $height
     * @throws Exception
     */
    public function __construct(float $length, float $width, float $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);
    }

    /**
     * @return float
     */
    public function getLength(): float
    {
        return $this->length;
    }

    /**
     * @param float $length
     * @throws Exception //Length cannot be zero or negative
     */
    protected function setLength(float $length): void
    {
        $this->validateInput($length, "Length");
        $this->length = $length;
    }

    /**
     * @return float
     */
    public function getWidth(): float
    {
        return $this->width;
    }

    /**
     * @param float $width
     * @throws Exception //Width cannot be zero or negative
     */
    protected function setWidth(float $width): void
    {
        $this->validateInput($width, "Width");
        $this->width = $width;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @param float $height
     * @throws Exception //Height cannot be zero or negative
     */
    protected function setHeight(float $height): void
    {
        $this->validateInput($height, "Height");
        $this->height = $height;
    }

    /**
     * @return float
     */
    private function getVolume(): float
    {
        return $this->getLength() * $this->getWidth() * $this->getHeight();
    }

    /**
     * @return float
     */
    private function getLateralSurfaceArea(): float
    {
        return 2 * ($this->getLength() * $this->getHeight())
            + 2 * ($this->getWidth() * $this->getHeight());
    }

    /**
     * @return float
     */
    private function getSurfaceArea(): float
    {
        return 2 * ($this->getLength() * $this->getWidth())
            + 2 * ($this->getLength() * $this->getHeight())
            + 2 * ($this->getWidth() * $this->getHeight());
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "Surface Area - " . number_format($this->getSurfaceArea(), 2, '.', '').PHP_EOL .
        "Lateral Surface Area - " . number_format($this->getLateralSurfaceArea(), 2, '.', '').PHP_EOL .
        "Volume - " . number_format($this->getVolume(), 2, '.', '').PHP_EOL;
    }

    /**
     * @param float $value
     * @param string $parameter
     * @throws Exception
     */
    private function validateInput(float $value, string $parameter): void
    {
        if ($value <= 0){
            throw new Exception("{$parameter} cannot be zero or negative !\n");
        }
    }
}

// MAIN

$l=floatval(readline());
$w=floatval(readline());
$h=floatval(readline());

try {
    $box = new Box($l, $w, $h);
    echo $box;
} catch (Exception $e) {
    echo $e->getMessage();
}
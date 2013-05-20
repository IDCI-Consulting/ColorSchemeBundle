<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Color;

class ColorRGB implements ColorInterface
{
    protected $red;
    protected $green;
    protected $blue;

    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }

    public function getRed()
    {
        return $this->red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function getBlue()
    {
        return $this->blue;
    }

    public function setRed($red)
    {
        $this->red = $red;

        return $this;
    }

    public function setGreen($green)
    {
        $this->green = $green;

        return $this;
    }

    public function setBlue($blue)
    {
        $this->blue = $blue;

        return $this;
    }

    public function isValid()
    {
        return (
            self::isValidSingleColorValue($this->getRed()) &&
            self::isValidSingleColorValue($this->getGreen()) && 
            self::isValidSingleColorValue($this->getBlue())
        );
    }

    public static function isValidSingleColorValue($value)
    {
        return (is_int($value) && 0 <= $value && $value < 256);
    }
}
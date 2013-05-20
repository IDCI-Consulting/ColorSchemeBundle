<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

abstract class ColorRGB extends AbstractColor
{
    protected $red;
    protected $green;
    protected $blue;

    public function __construct($red, $green, $blue)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);

        parent::__construct();
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
            $this->isValidSingleColorValue($this->getRed()) &&
            $this->isValidSingleColorValue($this->getGreen()) && 
            $this->isValidSingleColorValue($this->getBlue())
        );
    }

    abstract public function isValidSingleColorValue($value);
}

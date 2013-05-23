<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

use IDCI\Bundle\ColorSchemeBundle\Exceptions\UndefinedColorNameException;

class ColorRGBHexadecimal extends ColorRGB
{
    public function getRed()
    {
        return (strlen(parent::getRed()) < 2 ? '0' : '').parent::getRed();
    }

    public function getGreen()
    {
        return (strlen(parent::getGreen()) < 2 ? '0' : '').parent::getGreen();
    }

    public function getBlue()
    {
        return (strlen(parent::getBlue()) < 2 ? '0' : '').parent::getBlue();
    }

    public function __toString()
    {
        return sprintf("#%s%s%s",
            $this->getRed(),
            $this->getGreen(),
            $this->getBlue()
        );
    }

    public function isValidSingleColorValue($value)
    {
        return (1 === preg_match("/^([A-Fa-f0-9]{1,2})/i", $value));
    }

    /**
     * @return ColorInterface
     */
    public function toDec()
    {
        return new ColorRGBDecimal(
            hexdec($this->getRed()),
            hexdec($this->getGreen()),
            hexdec($this->getBlue())
        );
    }

    /**
     * @return ColorInterface
     */
    public function toHex()
    {
        return $this;
    }

    /**
     * @return ColorInterface
     */
    public function toHsl()
    {
        return $this->toDec()->toHsl();
    }

    /**
     * @return ColorInterface
     * @throw UndefinedColorNameException
     */
    public function toStr()
    {
        if($str = ColorSTR::getColorNameFromHexaCode($this->__toString())) {
            return new ColorSTR($str);
        }

        throw new UndefinedColorNameException();
    }
}

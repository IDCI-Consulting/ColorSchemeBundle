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
     * {@inheritDoc}
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
     * {@inheritDoc}
     */
    public function toHex()
    {
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function toHsl()
    {
        return $this->toDec()->toHsl();
    }

    /**
     * {@inheritDoc}
     */
    public function toStr()
    {
        if ($str = ColorSTR::getColorNameFromHexaCode($this->__toString())) {
            return new ColorSTR($str);
        }

        throw new UndefinedColorNameException();
    }
}

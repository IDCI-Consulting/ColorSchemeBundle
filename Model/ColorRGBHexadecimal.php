<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

class ColorRGBHexadecimal extends ColorRGB
{
    public function isValidSingleColorValue($value)
    {
        return (1 === preg_match("/^#([A-Fa-f0-9]{1,2})/i", $value));
    }

    /**
     * @return ColorInterface
     */
    public function toDec();
    {
        return new ColorRGBHexadecimal(
            hexdec($this->getRed()),
            hexdec($this->getGreen()),
            hexdec($this->getBlue()),
        );
    }

    /**
     * @return ColorInterface
     */
    public function toHex();
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
        //TODO;
    }
}

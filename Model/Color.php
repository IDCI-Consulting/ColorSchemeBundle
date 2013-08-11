<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

use IDCI\Bundle\ColorSchemeBundle\Exceptions\InvalidColorException;

class Color implements ColorInterface
{
    protected $colorValue;
    protected $colorObject = null;

    /**
     * Constructor
     *
     * @param string $color
     */
    public function __construct($colorValue)
    {
        $this->setColorValue($colorValue);
        if(!$this->guessColorObject()) {
            throw new InvalidColorException(sprintf(
                "The color %s was not guess",
                $colorValue
            ));
        }
    }

    /**
     * Set ColorValue
     *
     * @param string $color_value
     */
    public function setColorValue($colorValue)
    {
        $this->colorValue = $colorValue;
    }

    /**
     * Get ColorValue
     *
     * @return string
     */
    public function getColorValue()
    {
        return $this->colorValue;
    }

    /**
     * Set ColorObject
     *
     * @param ColorInterface $color_object
     */
    public function setColorObject(ColorInterface $colorObject)
    {
        $this->colorObject = $colorObject;
    }

    /**
     * Get ColorObject
     *
     * @return ColorInterface
     */
    public function getColorObject()
    {
        return $this->colorObject;
    }

    /**
     * Guess ColorObject
     *
     * @return boolean
     */
    protected function guessColorObject()
    {
        if($value = self::isValidHSLColorValue($this->getColorValue())) {
            $this->setColorObject(new ColorHSL($value[0], $value[1], $value[2]));
        } elseif($value = self::isValidRGBDecimalColorValue($this->getColorValue())) {
            $this->setColorObject(new ColorRGBDecimal($value[0], $value[1], $value[2]));
        } elseif($value = self::isValidRGBHexadecimalColorValue($this->getColorValue())) {
            $this->setColorObject(new ColorRGBHexadecimal($value[0], $value[1], $value[2]));
        } elseif($value = self::isValidSTRColorValue($this->getColorValue())) {
            $this->setColorObject(new ColorSTR($value));
        }

        return null !== $this->getColorObject();
    }

    /**
     *
     * @return boolean | array
     */
    public static function isValidHSLColorValue($value)
    {
        if(1 === preg_match("/^([0-9]{1,3})%,([0-9]{1,3}),([0-9]{1,3})/i", $value, $matches)) {
            if(100 < $matches[1]) {
                return false;
            }
            if(100 < $matches[2]) {
                return false;
            }
            if(100 < $matches[3]) {
                return false;
            }

            return array((int)$matches[1], (int)$matches[2], (int)$matches[3]);
        }

        return false;
    } 

    /**
     *
     * @return boolean | array
     */
    public static function isValidRGBDecimalColorValue($value)
    {
        if(1 === preg_match("/^([0-9]{1,3}),([0-9]{1,3}),([0-9]{1,3})$/i", $value, $matches)) {
            if(255 < $matches[1]) {
                return false;
            }
            if(255 < $matches[2]) {
                return false;
            }
            if(255 < $matches[3]) {
                return false;
            }

            return array((int)$matches[1], (int)$matches[2], (int)$matches[3]);
        }

        return false;
    }

    /**
     *
     * @return boolean | array
     */
    public static function isValidRGBHexadecimalColorValue($value)
    {
        if(1 === preg_match("/^#([A-Fa-f0-9]{1,2})([A-Fa-f0-9]{1,2})([A-Fa-f0-9]{1,2})$/i", $value, $matches)) {
            if(255 < hexdec($matches[1])) {
                return false;
            }
            if(255 < hexdec($matches[2])) {
                return false;
            }
            if(255 < hexdec($matches[3])) {
                return false;
            }

            return array($matches[1], $matches[2], $matches[3]);
        }

        return false;
    }

    /**
     *
     * @return boolean | string
     */
    public static function isValidSTRColorValue($value)
    {
        if(in_array($value, ColorSTR::getAvalaibleColorNames())) {
            return $value;
        }

        return false;
    }

    /**
     * @return ColorInterface
     */
    public function toDec()
    {
        return $this->getColorObject()->toDec();
    }

    /**
     * @return ColorInterface
     */
    public function toHex()
    {
        return $this->getColorObject()->toHex();
    }

    /**
     * @return ColorInterface
     */
    public function toHsl()
    {
        return $this->getColorObject()->toHsl();
    }

    /**
     * @return ColorInterface
     * @throw UndefinedColorNameException
     */
    public function toStr()
    {
        return $this->getColorObject()->toStr();
    }
}

<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

class ColorRGBDecimal extends ColorRGB
{
    public function isValidSingleColorValue($value)
    {
        return (is_int($value) && 0 <= $value && $value < 256);
    }

    /**
     * @return ColorInterface
     */
    public function toDec();
    {
        return $this;
    }

    /**
     * @return ColorInterface
     */
    public function toHex();
    {
        return new ColorRGBHexadecimal(
            dechex($this->getRed()),
            dechex($this->getGreen()),
            dechex($this->getBlue()),
        );
    }

    /**
     * @return ColorInterface
     */
    public function toHsl()
    {
        $r = ($this->getRed() / 255);
        $g = ($this->getGreen() / 255);
        $b = ($this->getBlue() / 255);
        $min = min($r, $g, $b);
        $max = max($r, $g, $b);

        $h = self::parseHue($r, $g, $b);
        $l = (0.5 * ($max + $min));

        if ($max == $min) {
            $s = 0;
        } else {
            if ($l <= 0.5) {
                $s = (($max - $min) / (2 * $l));
            } else {
                $s = (($max - $min) / (2 - (2 * $l)));
            }
        }

        $s = round($s * 100);
        $l = round($l * 100);

        return new ColorHSL($h, $s, $l);
    }

    /**
     * @return ColorInterface
     * @throw UndefinedColorNameException
     */
    public function toStr()
    {
        $this->toHex()->toStr();
    }

    /**
     * Parses the hue degree used in converting both HSV and HSL values.
     * The RGB(r, g, b) values are from 0..1 in this method since both HSV
     * and HSL converstions require them to be.
     *
     * @param  float $r
     * @param  float $g
     * @param  float $b
     * @return integer
     */
    public static function parseHue($r, $g, $b)
    {
        $min = min($r, $g, $b);
        $max = max($r, $g, $b);
        if ($max == $min) {
            $h = 0;
        } else {
            if (($max == $r) && ($g >= $b)) {
                $h = (60 * (($g - $b) / ($max - $min)));
            } else {
                if (($max == $r) && ($g < $b)) {
                    $h = (60 * (($g - $b) / ($max - $min)) + 360);
                } else {
                    if ($max == $g) {
                        $h = (60 * (($b - $r) / ($max - $min)) + 120);
                    } else {
                        $h = (60 * (($r - $g) / ($max - $min)) + 240);
                    }
                }
            }
        }

        return round($h);
    }
}

<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

class ColorHSL extends AbstractColor
{
    protected $hue;
    protected $saturation;
    protected $lightness;

    public function __construct($hue, $saturation, $lightness)
    {
        $this->setHue($hue);
        $this->setSaturation($saturation);
        $this->setLightness($lightness);

        parent::__construct();
    }

    public function __toString()
    {
        return sprintf("%s%%,%s,%s",
            $this->getHue(),
            $this->getSaturation(),
            $this->getLightness()
        );
    }

    public function getHue()
    {
        return $this->hue;
    }

    public function getSaturation()
    {
        return $this->saturation;
    }

    public function getLightness()
    {
        return $this->lightness;
    }

    public function setHue($hue)
    {
        $this->hue = $hue;

        return $this;
    }

    public function setSaturation($saturation)
    {
        $this->saturation = $saturation;

        return $this;
    }

    public function setLightness($lightness)
    {
        $this->lightness = $lightness;

        return $this;
    }

    public function isValid()
    {
        return
            is_int($this->getHue()) && 0 <= $this->getHue() && 360 >= $this->getHue() &&
            is_int($this->getSaturation()) && 0 <= $this->getSaturation() && 100 >= $this->getSaturation() &&
            is_int($this->getLightness()) && 0 <= $this->getLightness() && 100 >= $this->getLightness()
        ;  
    }

    /**
     * @return ColorInterface
     */
    public function toDec()
    {
        $h = $this->getHue() / 360;
        $s = $this->getSaturation() / 100;
        $l = $this->getLightness() / 100;
         
        $q = ($l < 0.5) ? ($l * (1 + $s)) : ($l + $s - ($l * $s));
        $p = ((2 * $l) - $q);
        $rgb = array();
        for ($i = 0; $i < 3; $i++) {
            switch ($i) {
                case 0: $t = ($h + (1 / 3)); break;
                case 1: $t = $h; break;
                case 2: $t = ($h - (1 / 3)); break;
            }
            if ($t < 0) {
                $t += 1.0;
            }
            if ($t > 1) { 
                $t -= 1.0;
            }
            if ($t < (1 / 6)) {
                $rgb[] = ($p + (($q - $p) * 6 * $t));
            } else if (((1 / 6) <= $t) && ($t < 0.5)) {
                $rgb[] = $q;
            } else if ((0.5 <= $t) && ($t < (2 / 3))) {
                $rgb[] = ($p + (($q - $p) * 6 * ((2 / 3) - $t)));
            } else {
                $rgb[] = $p;
            }
        }

        list($r, $g, $b) = $rgb;
        $r = (int)round(255 * $r);
        $g = (int)round(255 * $g);
        $b = (int)round(255 * $b);

        return new ColorRGBDecimal($r, $g, $b);
    }

    /**
     * @return ColorInterface
     */
    public function toHex()
    {
        return $this->toDec()->toHex();
    }

    /**
     * @return ColorInterface
     */
    public function toHsl()
    {
        return $this;
    }

    /**
     * @return ColorInterface
     * @throw UndefinedColorNameException
     */
    public function toStr()
    {
        return $this->toDec()->toStr();
    }
}

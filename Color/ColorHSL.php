<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Color;

class ColorHSL implements ColorInterface
{
    protected $hue;
    protected $saturation;
    protected $lightness;

    public function __construct($hue, $saturation, $lightness)
    {
        $this->setHue($hue);
        $this->setSaturation($saturation);
        $this->setLightness($lightness);
    }

    public function __toString()
    {
        return sprintf("%s%%,%s%s",
            $this->getRed(),
            $this->getGreen(),
            $this->getBlue()
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
        return true;
    }
}
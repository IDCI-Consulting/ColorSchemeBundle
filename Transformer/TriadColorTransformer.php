<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorInterface;
use IDCI\Bundle\ColorSchemeBundle\Model\ColorHSL;

class TriadColorTransformer extends AbstractColorTransformer
{
    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function getName()
    {
        return 'triad';
    }

    /**
     * Set the hue vary parameter
     *
     * @return integer
     */
    public function setHueVary($value)
    {
        if(0 > $value || $value > 180) {
            throw new InvalidHueVaryValueException();
        }

        return $this->setParameter('hue_vary', $value);
    }

    /**
     * Get the hue vary parameter
     *
     * @return integer
     */
    public function getHueVary()
    {
        return $this->getParameter('hue_vary', 30);
    }

    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function transform(ColorInterface $color)
    {
        $hue1 = self::hueTransform($color->toHsl()->getHue(), $this->getHueVary());
        $hue2 = self::hueTransform($color->toHsl()->getHue(), - $this->getHueVary());

        $hsl1 = new ColorHSL($hue1, $color->toHsl()->getSaturation(), $color->toHsl()->getLightness());
        $hsl2 = new ColorHSL($hue2, $color->toHsl()->getSaturation(), $color->toHsl()->getLightness());

        return array(
            $hsl1->toHex(),
            $hsl2->toHex()
        );
    }

    /**
     * Hue Transform
     *
     * @param integer $hue
     * @param integer $vary
     * @return integer
     */
    public static function hueTransform($hue, $vary)
    {
        $newHue = ($hue + $vary) % 360;
        if($newHue < 0) {
            $newHue = 360 + $newHue;
        }

        return $newHue;
    }
}

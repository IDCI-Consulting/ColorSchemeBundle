<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorInterface;

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
        $hsl1 = $color->toHsl();
        $hsl2 = clone $hsl1;

        $hue1 = ($hsl1->getHue() + $this->getHueVary()) % 360;
        $hue2 = ($hsl2->getHue() - $this->getHueVary()) % 360;

        return array(
            $hsl1->setHue($hue1)->toHex(),
            $hsl2->setHue($hue2)->toHex()
        );
    }
}
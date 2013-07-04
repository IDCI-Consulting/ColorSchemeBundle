<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorInterface;

class DarkenColorTransformer extends AbstractLightnessColorTransformer
{
    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function getName()
    {
        return 'darken';
    }

    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function transform(ColorInterface $color)
    {
        $hsl = $color->toHSL();
        $l = $hsl->getLightness() - $this->getLightnessVary();

        return $hsl->setLightness($l > 100 ? 100 : $l)->toHex();
    }
}

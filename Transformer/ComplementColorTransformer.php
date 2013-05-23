<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorInterface;

class ComplementColorTransformer extends AbstractColorTransformer
{
    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function getName()
    {
        return 'complement';
    }

    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function transform(ColorInterface $color)
    {
        $hsl = $color->toHSL();
        $h = ($hsl->getHue() + 180) % 360;

        return $hsl->setHue($h)->toHex(); 
    }
}

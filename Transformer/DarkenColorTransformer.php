<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorInterface;

class DarkenColorTransformer extends AbstractColorTransformer
{
    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function getName()
    {
        return 'darken';
    }

    /**
     * Get the vary parameter
     *
     * @return integer
     */
    public function getVary()
    {
        return $this->getParameter('vary', 10);
    }

    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function transform(ColorInterface $color)
    {
        $hsl = $color->toHSL();
        $l = $hsl->getLightness() - $this->getVary();

        return $hsl->setLightness($l > 100 ? 100 : $l);
    }
}
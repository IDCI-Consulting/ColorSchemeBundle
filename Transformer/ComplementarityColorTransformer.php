<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;

class ComplementarityColorTransformer implements ColorTransformerInterface
{
    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function getName()
    {
        return 'complementarity';
    }

    /**
     * @see IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface
     */
    public function transform(Color $color)
    {
        return 10;
    }
}

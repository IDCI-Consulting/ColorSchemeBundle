<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;

interface ColorTransformerInterface
{
    /**
     * Get Name
     *
     * @return string
     */
    public function getName();

    /**
     * Transform
     *
     * @param Color $color
     * @return array
     */
    public function transform(Color $color);
}

<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorInterface;

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
     * @param ColorInterface $color
     * @return mixed
     */
    public function transform(ColorInterface $color);
}

<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorInterface;
use IDCI\Bundle\ColorSchemeBundle\Exception\InvalidLightnessVaryValueException;

abstract class AbstractLightnessColorTransformer extends AbstractColorTransformer
{
    /**
     * Set the vary parameter
     *
     * @return integer
     */
    public function setLightnessVary($value)
    {
        if(0 > $value || $value > 100) {
            throw new InvalidLightnessVaryValueException();
        }

        return $this->setParameter('lightness_vary', $value);
    }

    /**
     * Get the vary parameter
     *
     * @return integer
     */
    public function getLightnessVary()
    {
        return $this->getParameter('lightness_vary', 10);
    }
}

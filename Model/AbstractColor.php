<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

use IDCI\Bundle\ColorSchemeBundle\Exceptions\InvalidColorException;

abstract class AbstractColor implements ColorInterface
{
    public function __construct()
    {
        if(!$this->isValid()) {
            throw new InvalidColorException();
        }
    }

    /**
     * @return boolean
     */
    abstract public function isValid();
}

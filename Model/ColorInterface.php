<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

interface ColorInterface
{
    /**
     * @return boolean
     */
    public function isValid();

    /**
     * @return ColorInterface
     */
    public function toDec();

    /**
     * @return ColorInterface
     */
    public function toHex();

    /**
     * @return ColorInterface
     */
    public function toHsl();

    /**
     * @return ColorInterface
     * @throw UndefinedColorNameException
     */
    public function toStr();

}

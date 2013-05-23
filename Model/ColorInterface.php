<?php

/**
 *
 * @author  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

use IDCI\Bundle\Exceptions\UndefinedColorNameException;

interface ColorInterface
{
    /**
     * @return ColorInterface A ColorInterface Instance
     */
    public function toDec();

    /**
     * @return ColorInterface A ColorInterface Instance
     */
    public function toHex();

    /**
     * @return ColorInterface A ColorInterface Instance
     */
    public function toHsl();

    /**
     * @return ColorInterface A ColorInterface Instance
     *
     * @throws UndefinedColorNameException When color name is invalid
     */
    public function toStr();
}

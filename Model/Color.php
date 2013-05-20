<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Model;

class Color
{
    protected $colorCode;
    protected $colorObject;

    /**
     * Constructor
     *
     * @param string $color
     */
    public function __construct($color_code)
    {
        $this->setColorCode($color_code);
        $this->guessColorObject();
    }

    /**
     * Set ColorCode
     *
     * @param string $color_code
     */
    public function setColorCode($color_code)
    {
        $this->colorCode = $color_code;
    }

    /**
     * Get ColorCode
     *
     * @return string
     */
    public function getColorCode()
    {
        return $this->colorCode;
    }

    /**
     * Guess ColorObject
     *
     * @throw InvalidColorException
     */
    protected function guessColorObject()
    {
    }
}

<?php

/**
 *
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;

class ColorTest extends \PHPUnit_Framework_TestCase
{
    public function testGuessHSLColorObject()
    {
        $color = new Color('100%,0,50');

        $this->assertEquals(get_class($color->getColorObject()), "IDCI\Bundle\ColorSchemeBundle\Model\ColorHSL");
    }

    public function testGuessRGBDecimalColorObject()
    {
        $color = new Color('180,68,38');

        $this->assertEquals(get_class($color->getColorObject()), "IDCI\Bundle\ColorSchemeBundle\Model\ColorRGBDecimal");
    }

    public function testGuessRGBHexadecimalColorObject()
    {
        $color = new Color('#F5D835');

        $this->assertEquals(get_class($color->getColorObject()), "IDCI\Bundle\ColorSchemeBundle\Model\ColorRGBHexadecimal");
    }

    public function testGuessSTRColorObject()
    {
        $color = new Color('gray');

        $this->assertEquals(get_class($color->getColorObject()), "IDCI\Bundle\ColorSchemeBundle\Model\ColorSTR");
    }
}

<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;

class ColorTest extends \PHPUnit_Framework_TestCase
{
    public function testGuessHSLColorObject()
    {
        $color = new Color('100%,0,50');

        $this->assertInstanceOf("IDCI\Bundle\ColorSchemeBundle\Model\ColorHSL", $color->getColorObject());
    }

    public function testGuessRGBDecimalColorObject()
    {
        $color = new Color('180,68,38');

        $this->assertInstanceOf("IDCI\Bundle\ColorSchemeBundle\Model\ColorRGBDecimal", $color->getColorObject());
    }

    public function testGuessRGBHexadecimalColorObject()
    {
        $color = new Color('#F5D835');

        $this->assertInstanceOf("IDCI\Bundle\ColorSchemeBundle\Model\ColorRGBHexadecimal", $color->getColorObject());
    }

    public function testGuessSTRColorObject()
    {
        $color = new Color('gray');

        $this->assertInstanceOf("IDCI\Bundle\ColorSchemeBundle\Model\ColorSTR", $color->getColorObject());
    }
}

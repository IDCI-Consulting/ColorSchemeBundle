<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorHSL;

class ColorHSLTest extends \PHPUnit_Framework_TestCase
{
    public function testToDec()
    {
        $colorHSL = new ColorHSL(0,0,50);

        $this->assertEquals($colorHSL->toDec(), "128,128,128");
    }

    public function testToHex()
    {
        $colorHSL = new ColorHSL(0,0,50);

        $this->assertEquals($colorHSL->toHex(), "#808080");
    }

    public function testToHsl()
    {
        $colorHSL = new ColorHSL(0,0,50);

        $this->assertEquals($colorHSL->toHsl(), "0%,0,50");
    }

    public function testToStr()
    {
        $colorHSL = new ColorHSL(0,0,50);

        $this->assertEquals($colorHSL->toStr(), "gray");
    }
}
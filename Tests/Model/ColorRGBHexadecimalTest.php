<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests\Model;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorRGBHexadecimal;

class ColorRGBHexadecimalTest extends \PHPUnit_Framework_TestCase
{
    public function testToDec()
    {
        $colorRGBDecimal = new ColorRGBHexadecimal(80,80,80);

        $this->assertEquals($colorRGBDecimal->toDec(), "128,128,128");
    }

    public function testToHex()
    {
        $colorRGBDecimal = new ColorRGBHexadecimal(80,80,80);

        $this->assertEquals($colorRGBDecimal->toHex(), "#808080");
    }

    public function testToHsl()
    {
        $colorRGBDecimal = new ColorRGBHexadecimal(80,80,80);

        $this->assertEquals($colorRGBDecimal->toHsl(), "0%,0,50");
    }

    public function testToStr()
    {
        $colorRGBDecimal = new ColorRGBHexadecimal(80,80,80);

        $this->assertEquals($colorRGBDecimal->toStr(), "gray");
    }
}
<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests\Model;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorRGBDecimal;

class ColorRGBDecimalTest extends \PHPUnit_Framework_TestCase
{
    public function testToDec()
    {
        $colorRGBDecimal = new ColorRGBDecimal(128,128,128);

        $this->assertEquals($colorRGBDecimal->toDec(), "128,128,128");
    }

    public function testToHex()
    {
        $colorRGBDecimal = new ColorRGBDecimal(128,128,128);

        $this->assertEquals($colorRGBDecimal->toHex(), "#808080");
    }

    public function testToHsl()
    {
        $colorRGBDecimal = new ColorRGBDecimal(128,128,128);

        $this->assertEquals($colorRGBDecimal->toHsl(), "0%,0,50");
    }

    public function testToStr()
    {
        $colorRGBDecimal = new ColorRGBDecimal(128,128,128);

        $this->assertEquals($colorRGBDecimal->toStr(), "gray");
    }
}
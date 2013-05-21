<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests;

use IDCI\Bundle\ColorSchemeBundle\Model\ColorSTR;

class ColorSTRTest extends \PHPUnit_Framework_TestCase
{
    public function testToDec()
    {
        $colorSTR = new ColorSTR('gray');

        $this->assertEquals($colorSTR->toDec(), "128,128,128");
    }

    public function testToHex()
    {
        $colorSTR = new ColorSTR('gray');

        $this->assertEquals($colorSTR->toHex(), "#808080");
    }

    public function testToHsl()
    {
        $colorSTR = new ColorSTR('gray');

        $this->assertEquals($colorSTR->toHsl(), "0%,0,50");
    }

    public function testToStr()
    {
        $colorSTR = new ColorSTR('gray');

        $this->assertEquals($colorSTR->toStr(), "gray");
    }
}
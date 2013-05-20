<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;
use IDCI\Bundle\ColorSchemeBundle\Transformer\ComplementarityColorTransformer;

class ComplementarityColorTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testStr()
    {
        $color = new Color('gray');
        $complementarityColorTransformer = new ComplementarityColorTransformer();
        $complementarityColor = $complementarityColorTransformer->transform($color);

        $this->assertEquals($complementarityColor, 10);
    }

    public function testHex()
    {

    }

    public function testDec()
    {

    }

    public function testHsl()
    {

    }
}
<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;
use IDCI\Bundle\ColorSchemeBundle\Transformer\DarkenColorTransformer;

class DarkenColorTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $color = new Color("#FF0000");
        $transformer = new DarkenColorTransformer();
        $darken = $transformer
            ->setLightnessVary(20)
            ->transform($color)
        ;

        $this->assertEquals($darken->toHex()->__toString(), "#990000");
    }
}
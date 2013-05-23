<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;
use IDCI\Bundle\ColorSchemeBundle\Transformer\LightenColorTransformer;

class LightenColorTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $color = new Color("#FF0000");
        $transformer = new LightenColorTransformer();
        $lighten = $transformer
            ->setParameter('vary', 20)
            ->transform($color)
        ;

        $this->assertEquals($lighten->toHex()->__toString(), "#ff6666");
    }
}
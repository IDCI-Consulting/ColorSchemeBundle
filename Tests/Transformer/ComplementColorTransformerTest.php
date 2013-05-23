<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;
use IDCI\Bundle\ColorSchemeBundle\Transformer\ComplementColorTransformer;

class ComplementColorTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $color = new Color("#0000FF");
        $transformer = new ComplementColorTransformer();
        $complement = $transformer->transform($color);

        $this->assertEquals($complement->toHex()->__toString(), "#ffff00");
    }
}
<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Tests\Transformer;

use IDCI\Bundle\ColorSchemeBundle\Model\Color;
use IDCI\Bundle\ColorSchemeBundle\Transformer\TriadColorTransformer;

class TriadColorTransformerTest extends \PHPUnit_Framework_TestCase
{
    public function testTransform()
    {
        $color = new Color("#FF0000");
        $transformer = new TriadColorTransformer();
        $triad = $transformer
            ->setHueVary(90)
            ->transform($color)
        ; 

        $this->assertEquals($triad[0]->__toString(), "#80ff00");
        $this->assertEquals($triad[1]->__toString(), "#8000ff");
    }
}

<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @license: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Service\ManagerTests;

use IDCI\Bundle\ColorSchemeBundle\Service\Manager;
use IDCI\Bundle\ColorSchemeBundle\Transformer\DarkenColorTransformer;
use IDCI\Bundle\ColorSchemeBundle\Transformer\LightenColorTransformer;
use IDCI\Bundle\ColorSchemeBundle\Transformer\TriadColorTransformer;
use IDCI\Bundle\ColorSchemeBundle\Transformer\ComplementColorTransformer;

class ManagerTest extends \PHPUnit_Framework_TestCase
{
    public function testGenerate()
    {
        $manager = new Manager();
        $scheme = $manager
            ->fromColors(array('red', '#0000FF'))
            ->addColorTransformer(new DarkenColorTransformer())
            ->addColorTransformer(new LightenColorTransformer())
            ->addColorTransformer(new ComplementColorTransformer())
            ->addColorTransformer(new TriadColorTransformer())
            ->generate()
        ;

        $this->assertEquals(count($scheme), 2);
        $this->assertEquals($scheme[0]['complement']->toHex()->__toString(), "#00ffff");
        $this->assertEquals($scheme[1]['complement']->toHex()->__toString(), "#ffff00");
    }
}

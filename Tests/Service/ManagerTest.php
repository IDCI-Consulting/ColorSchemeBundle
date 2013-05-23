<?php

/**
 * 
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Service\ManagerTests;

use IDCI\Bundle\ColorSchemeBundle\Service\Manager;
use IDCI\Bundle\ColorSchemeBundle\Model\Color;
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
            ->fromColors(array(new Color('#FF0000'), new Color('#0000FF')))
            ->addColorTransformer(new DarkenColorTransformer())
            ->addColorTransformer(new LightenColorTransformer())
            ->addColorTransformer(new ComplementColorTransformer())
            ->addColorTransformer(new TriadColorTransformer())
            ->generate()
        ;

        var_dump($scheme);
    }
}
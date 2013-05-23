<?php

/**
 *
 * @author:  Gabriel BONDAZ <gabriel.bondaz@idci-consulting.fr>
 * @licence: GPL
 *
 */

namespace IDCI\Bundle\ColorSchemeBundle\Service;

use IDCI\Bundle\ColorSchemeBundle\Transformer\ColorTransformerInterface;

class Manager
{
    /**
     * Colors holder
     *
     * @var array
     */
    protected $colors = array();

    /**
     * Transformers holder
     * @var array
     */
    protected $transformers = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->colors = array();
        $this->transformers = array();
    }

    /**
     * From Colors
     *
     * @param  array   $colors
     * @return Manager
     */
    public function fromColors($colors)
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * Get Colors
     *
     * @return array
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Add ColorTransformer
     *
     * @param  ColorTransformerInterface $transformer
     * @return Manager
     */
    public function addColorTransformer(ColorTransformerInterface $transformer)
    {
        $this->transformers[$transformer->getName()] = $transformer;

        return $this;
    }

    /**
     * Get ColorTransformers
     *
     * @return array
     */
    public function getColorTransformers()
    {
        return $this->transformers;
    }

    /**
     * Generate
     *
     * @return array
     */
    public function generate()
    {
        $results = array();

        foreach ($this->getColorTransformers() as $transformer) {
            foreach ($this->getColors() as $k => $color) {
                if (!isset($results[$k])) {
                    $results[$k] = array();
                }
                $results[$k] = array_merge(
                    $results[$k],
                    $transformer->transform($color)
                );
            }
        }

        return $results;
    }
}

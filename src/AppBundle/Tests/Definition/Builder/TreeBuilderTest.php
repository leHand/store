<?php

namespace Symfony\Component\Config\Tests\Definition\Builder;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class TreeBuilderTest
 *
 * @package Symfony\Component\Config\Tests\Definition\Builder
 */
class TreeBuilderTest extends Webt
{
    public function testDefinitionReutnsTree()
    {
        $builder = new TreeBuilder();

        $this->assertTrue($builder instanceof TreeBuilder);

    }
}
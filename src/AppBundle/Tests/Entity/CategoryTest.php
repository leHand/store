<?php

namespace AppBundle\Tests\Entity;

use AppBundle\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CountryTest
 *
 * @package AppBundle\Tests\Entity
 */
class CategoryTest extends KernelTestCase
{

    /**
     * Test
     */
    public function testInstanceofCountry()
    {
        $category = new Category();
        $this->assertInstanceOf('AppBundle\Entity\Category', $category);
    }

}
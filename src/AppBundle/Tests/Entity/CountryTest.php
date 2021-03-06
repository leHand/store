<?php

namespace AppBundle\Tests\Entity;


use AppBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class CountryTest
 *
 * @package AppBundle\Tests\Entity
 */
class CountryTest extends KernelTestCase
{

    /**
     * Test
     */
    public function testInstanceofCountry()
    {
        $country = new Country();
        $this->assertInstanceOf('AppBundle\Entity\Country', $country);
    }

}
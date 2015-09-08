<?php

namespace AppBundle\Tests\Entity;


use AppBundle\Entity\Country;

class CountryTest extends \PHPUnit_Framework_TestCase
{
    public function testInstanceofCountry()
    {
        $country = new Country();
        $this->assertInstanceOf('AppBundle\Entity\Country', $country);
    }
}
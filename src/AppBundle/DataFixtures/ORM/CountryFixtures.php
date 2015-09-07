<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Country;

class CountryFixtures extends AbstractDataFixture
{

    private $countries = array(
        'en' => array('England', 'GBP'),
        'es' => array('Spain', 'EUR'),
        'fr' => array('France', 'EUR'),
        'it' => array('Italy', 'EUR'),
        'ro' => array('Romania', 'RON'),
        'tn' => array('Tunisia',  'TND'),
    );

    protected function createAndPersistData()
    {
        $countryCount = 0;
        foreach ($this->countries as $code => $country) {
            $countryCount++;
            $countryEntity = new Country();
            $countryEntity
                ->setCode($code)
                ->setName($country[0])
                ->setCurrency($country[1])
                ->setActive(true)
                ->setCreated(new \DateTime())
                ->setUpdated(new \DateTime());
            $this->setReference(sprintf('country_%s', $countryCount), $countryEntity);

            $this->manager->persist($countryEntity);
        }
    }

    public function getOrder()
    {
        return 10;
    }

}

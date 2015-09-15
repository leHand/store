<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Country;

/**
 * Class CountryFixtures
 *
 * @package AppBundle\DataFixtures\ORM
 */
class CountryFixtures extends AbstractDataFixture
{

    /**
     * @var array
     */
    private $countries = array(
        'en' => array('England', 'GBP'),
        'es' => array('Spain', 'EUR'),
        'fr' => array('France', 'EUR'),
        'it' => array('Italy', 'EUR'),
        'ro' => array('Romania', 'RON'),
        'tn' => array('Tunisia', 'TND'),
    );

    /**
     * @inheritdoc
     */
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

    /**
     * @return int
     */
    public function getOrder()
    {
        return 10;
    }

}

<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Vendor
 *
 * @ORM\Table(name="vendor",
 *  indexes={
 *      @ORM\Index(name="name_idx", columns={"name"})
 * })
 * @ORM\Entity
 * @UniqueEntity(fields={"name", "country"}, message="vendor.name.in_use")
 */
class Vendor extends BaseEntity
{
    const REPOSITORY = 'AppBundle:Vendor';

    /**
     * @var Country
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Country")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Get country
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set country
     *
     * @param Country $country
     *
     * @return Vendor
     */
    public function setCountry(Country $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Vendor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

}

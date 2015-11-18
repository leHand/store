<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Base\BaseEntity;

/**
 * Region
 *
 * @ORM\Table(name="region",
 *	indexes={
 *      @ORM\Index(name="name_idx", columns={"name"})
 * })
 * @ORM\Entity
 */
class Region extends BaseEntity
{
    const REPOSITORY = 'AppBundle:Region'; 

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
     * Set name
     *
     * @param string $name
     *
     * @return Region
     */
    public function setName($name)
    {
        $this->name = $name;

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
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

}

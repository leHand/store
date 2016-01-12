<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Base\BaseEntity;

/**
 * Locality
 *
 * @ORM\Table(name="locality",
 *	indexes={
 *      @ORM\Index(name="name_idx", columns={"name"})
 * })
 * @ORM\Entity
 */
class Locality extends BaseEntity
{
    const REPOSITORY = 'AppBundle:Locality';

    /**
     * @var Region
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Region")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * Get region
     *
     * @return \AppBundle\Entity\Locality
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set country
     *
     * @param Region $region
     *
     * @return Vendor
     */
    public function setRegion(Region $region = null)
    {
        $this->region = $region;

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

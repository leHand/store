<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Base\BaseEntity;

/**
 * PostalCode
 *
 * @ORM\Table(name="postal_code",
 *  indexes={
 *      @ORM\Index(name="code_idx", columns={"code"})
 * })
 * @ORM\Entity
 */
class PostalCode extends BaseEntity
{
    const REPOSITORY = 'AppBundle:PostalCode';

    /**
     * @var Locality
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Locality")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="locality_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $locality;

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
     * @ORM\Column(name="code", type="string", length=10)
     */
    private $code;

    /**
     * Set locality
     *
     * @param Locality $locality
     *
     * @return PostalCode
     */
    public function setLocality(Locality $locality = null)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return \AppBundle\Entity\PostalCode
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * @return Region
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * @param Region $region
     *
     * @return PostalCode
     */
    public function setRegion(Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return PostalCode
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Return code
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getCode();
    }
}

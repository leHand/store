<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Base\BaseEntity;

/**
 * PostalCode
 *
 * @ORM\Table(name="postal_code")
 * @ORM\Entity
 */
class PostalCode extends BaseEntity
{
    const REPOSITORY = 'AppBundle:PostalCode'; 
    
    /**
     * @var integer
     *
     * @ORM\Column(name="locality", type="integer")
     */
    private $locality;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10)
     */
    private $code;

    /**
     * Set locality
     *
     * @param integer $locality
     * @return PostalCode
     */
    public function setLocality($locality)
    {
        $this->locality = $locality;

        return $this;
    }

    /**
     * Get locality
     *
     * @return integer 
     */
    public function getLocality()
    {
        return $this->locality;
    }

    /**
     * Set code
     *
     * @param string $code
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
    *   Return code
    */
    public function __toString()
    {
        return $this->getCode();
    }
}

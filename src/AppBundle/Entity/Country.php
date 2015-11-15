<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CountryRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Country extends BaseEntity
{
    const REPOSITORY = 'AppBundle:Country';

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=2, nullable=false)
     * @Assert\Country(message = "country.code.invalid")
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", nullable=false, length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="currency", type="string", length=3, nullable=false)
     */
    private $currency;

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Country
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
     * Set name
     *
     * @param string $name
     *
     * @return Country
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
     * Set currency
     *
     * @param string $currency
     *
     * @return Country
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getId();
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        if (!$this->getUpdated()) {
            $this->setUpdated(new \DateTime());
        }
        if (!$this->getCreated()) {
            $this->setCreated(new \DateTime());
        }
    }
}

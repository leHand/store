<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Company
 *
 * @ORM\Table(
 *  name="company",
 *  indexes={
 *      @ORM\Index(name="registration_number_idx", columns={"registration_number"})})
 *  })
 * @ORM\Entity
 * @UniqueEntity(fields={"registrationNumber"}, message="company.registration_number.in_use")
 */
class Company extends BaseEntity
{
    const REPOSITORY = 'AppBundle:Company';

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
     * @var \stdClass
     *
     * @ORM\Column(name="address", type="object")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="registration_number", type="string", length=255, unique=true)
     */
    private $registrationNumber;

    /**
     * @var boolean
     *
     * @ORM\Column(name="vatPayer", type="boolean")
     */
    private $vatPayer;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=255)
     */
    private $fax;

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Company
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
     * Set address
     *
     * @param \stdClass $address
     *
     * @return Company
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \stdClass 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set registrationNumber
     *
     * @param string $registrationNumber
     *
     * @return Company
     */
    public function setRegistrationNumber($registrationNumber)
    {
        $this->registrationNumber = $registrationNumber;

        return $this;
    }

    /**
     * Get registrationNumber
     *
     * @return string 
     */
    public function getRegistrationNumber()
    {
        return $this->registrationNumber;
    }

    /**
     * Set vatPayer
     *
     * @param boolean $vatPayer
     *
     * @return Company
     */
    public function setVatPayer($vatPayer)
    {
        $this->vatPayer = $vatPayer;

        return $this;
    }

    /**
     * Get vatPayer
     *
     * @return boolean 
     */
    public function isVatPayer()
    {
        return $this->vatPayer;
    }

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
     * Set phone
     *
     * @param string $phone
     *
     * @return Company
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Company
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }
}

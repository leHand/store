<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Product
 *
 * @ORM\Table(
 *  name="product",
 *  indexes={
 *      @ORM\Index(name="part_number_idx", columns={"part_number"}),
 *  })
 * @ORM\Entity
 * @UniqueEntity(fields={"vendor_id", "part_number"})
 */
class Product extends BaseEntity
{
    const REPOSITORY = 'AppBundle:Product';

    /**
     * @var Vendor
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Vendor")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="vendor_id", referencedColumnName="id")
     * })
     */
    private $vendor;

    /**
     * @var Supplier
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Supplier")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="supplier_id", referencedColumnName="id", onDelete="SET NULL")
     * })
     */
    private $supplier;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="part_number", type="string", length=255)
     */
    private $partNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var Category
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint")
     */
    private $status;

    /**
     * Get partNumber
     *
     * @return string
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * Set partNumber
     *
     * @param string $partNumber
     *
*@return Product
     */
    public function setPartNumber($partNumber)
    {
        $this->partNumber = $partNumber;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Product
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get vendor
     *
     * @return \AppBundle\Entity\Vendor
     */
    public function getVendor()
    {
        return $this->vendor;
    }

    /**
     * Set vendor
     *
     * @param \AppBundle\Entity\Vendor $vendor
     *
     * @return Product
     */
    public function setVendor(Vendor $vendor = null)
    {
        $this->vendor = $vendor;

        return $this;
    }

    /**
     * Get category
     *
     * @return \AppBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set category
     *
     * @param \AppBundle\Entity\Category $category
     *
     * @return Product
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
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
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Supplier
     */
    public function getSupplier()
    {
        return $this->supplier;
    }

    /**
     * Set Supplier
     *
     * @param \AppBundle\Entity\Supplier $supplier
     *
     * @return Product
     */
    public function setSupplier(Supplier $supplier = null)
    {
        $this->supplier = $supplier;
    }

}

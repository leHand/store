<?php

namespace AppBundle\Entity;

use AppBundle\Entity\Base\BaseEntity;
use AppBundle\Exception\LogicException;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Category
 *
 * @ORM\Table(
 *  name="category",
 *  indexes={
 *      @ORM\Index(name="fk_category_category_idx", columns={"parent_category_id"})
 * })
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Category extends BaseEntity
{
    const REPOSITORY = 'AppBundle:Category';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", unique=true, length=50, nullable=true)
     */
    private $name;

    /**
     * @var Category
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category", inversedBy="childrenCategories")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="parent_category_id", referencedColumnName="id")
     * })
     */
    private $parentCategory;

    /**
     * @var Category
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Category", mappedBy="parentCategory")
     */
    private $childrenCategories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->childrenCategories = new ArrayCollection();
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Category
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
     * Set parentCategory
     *
     * @param \AppBundle\Entity\Category $parentCategory
     *
     * @return Category
     */
    public function setParentCategory(Category $parentCategory = null)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \AppBundle\Entity\Category 
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Add childrenCategories
     *
     * @param \AppBundle\Entity\Category $childrenCategories
     *
     * @return Category
     */
    public function addChildrenCategory(Category $childrenCategories)
    {
        $this->childrenCategories[] = $childrenCategories;

        return $this;
    }

    /**
     * Remove childrenCategories
     *
     * @param \AppBundle\Entity\Category $childrenCategories
     */
    public function removeChildrenCategory(Category $childrenCategories)
    {
        $this->childrenCategories->removeElement($childrenCategories);
    }

    /**
     * Get childrenCategories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildrenCategories()
    {
        return $this->childrenCategories;
    }

    /**
     * @return string
     */
    public  function __toString()
    {
        return $this->getName();
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

    /**
     * @Assert\IsTrue(message = "Parent category cannot be the same as child")
     *
     * @return bool
     */
    public function isNotSameAsParent()
    {
        if (!$this->getParentCategory()) {
            return true;
        }

        return $this->getId() !== $this->getParentCategory()->getId();
    }
    /**
     * @ORM\PreRemove
     */
    public function preRemove()
    {
        if (count($this->getChildrenCategories()->getValues()) > 0) {
            throw new LogicException('Cannot remove a category that has children');
        }
    }
}

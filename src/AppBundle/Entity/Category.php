<?php

namespace AppBundle\Entity;

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
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", options={"unsigned":true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated", type="datetime", nullable=false)
     */
    private $updated;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->childrenCategories = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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
     * Set active
     *
     * @param boolean $active
     *
     * @return Category
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     *
     * @return Category
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     *
     * @return Category
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
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

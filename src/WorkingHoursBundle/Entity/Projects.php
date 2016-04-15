<?php

namespace WorkingHoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @ORM\Table(name="projects", indexes={@ORM\Index(name="category_id", columns={"category_id"}), @ORM\Index(name="user_id", columns={"user_id"})})
 * @ORM\Entity
 */
class Projects
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \WorkingHoursBundle\Entity\Users
     *
     * @ORM\ManyToOne(targetEntity="WorkingHoursBundle\Entity\Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \WorkingHoursBundle\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="WorkingHoursBundle\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     * })
     */
    private $category;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Projects
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projects
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set user
     *
     * @param \WorkingHoursBundle\Entity\Users $user
     *
     * @return Projects
     */
    public function setUser(\WorkingHoursBundle\Entity\Users $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WorkingHoursBundle\Entity\Users
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set category
     *
     * @param \WorkingHoursBundle\Entity\Categories $category
     *
     * @return Projects
     */
    public function setCategory(\WorkingHoursBundle\Entity\Categories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \WorkingHoursBundle\Entity\Categories
     */
    public function getCategory()
    {
        return $this->category;
    }
}

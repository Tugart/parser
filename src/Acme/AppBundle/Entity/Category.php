<?php

namespace Acme\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="category")
 * @ORM\Entity
 */
class Category
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * ORM\OneToMany(targetEntity="Task", mappedBy="category")
     */
    private $tasks;

    /**
     * @ORM\OneToMany(targetEntity="Section", mappedBy="category")
     */
    private $sections;

    /**
     * ORM\ManyToMany(targetEntity="Profile", mappedBy="categories")
     */
    private $profiles;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->name;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
//        $this->tasks = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sections = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Task
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
     * Add tasks
     *
     * @param \Home\AppBundle\Entity\Task $tasks
     * @return Category
     */
    public function addTask(\Home\AppBundle\Entity\Task $tasks)
    {
        $this->tasks[] = $tasks;

        return $this;
    }

    /**
     * Remove tasks
     *
     * @param \Home\AppBundle\Entity\Task $tasks
     */
    public function removeTask(\Home\AppBundle\Entity\Task $tasks)
    {
        $this->tasks->removeElement($tasks);
    }

    /**
     * Get tasks
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * Add sections
     *
     * @param \Home\AppBundle\Entity\sections $sections
     * @return Category
     */
    public function addSections(\Home\AppBundle\Entity\Section $sections)
    {
        $this->sections[] = $sections;

        return $this;
    }

    /**
     * Remove sections
     *
     * @param \Home\AppBundle\Entity\sections $sections
     */
    public function removeSections(\Home\AppBundle\Entity\Section $sections)
    {
        $this->sections->removeElement($sections);
    }

    /**
     * Get sections
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSections()
    {
        return $this->sections;
    }

    /**
     * Add sections
     *
     * @param \Home\AppBundle\Entity\Section $sections
     * @return Category
     */
    public function addSection(\Home\AppBundle\Entity\Section $sections)
    {
        $this->sections[] = $sections;

        return $this;
    }

    /**
     * Remove sections
     *
     * @param \Home\AppBundle\Entity\Section $sections
     */
    public function removeSection(\Home\AppBundle\Entity\Section $sections)
    {
        $this->sections->removeElement($sections);
    }

    /**
     * Add profiles
     *
     * @param \Home\AppBundle\Entity\Profile $profiles
     * @return Category
     */
    public function addProfile(\Home\AppBundle\Entity\Profile $profiles)
    {
        $this->profiles[] = $profiles;

        return $this;
    }

    /**
     * Remove profiles
     *
     * @param \Home\AppBundle\Entity\Profile $profiles
     */
    public function removeProfile(\Home\AppBundle\Entity\Profile $profiles)
    {
        $this->profiles->removeElement($profiles);
    }

    /**
     * Get profiles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProfiles()
    {
        return $this->profiles;
    }
}

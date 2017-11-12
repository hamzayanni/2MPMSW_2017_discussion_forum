<?php

namespace Core\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as JMS;


/**
 * Groups
 *
 * @ORM\Table(name="groups")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\GroupsRepository")
 */
class Groups
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @JMS\SerializedName("id")
     * @JMS\Groups({"Group", "Student", "GroupTeacher"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @JMS\SerializedName("title")
     * @JMS\Groups({"Group", "Student", "GroupTeacher"})
     */
    private $title;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Core\CoreBundle\Entity\GroupsTeacher", mappedBy="groups")
     */
    private $groupsTeacher;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Core\CoreBundle\Entity\CourseGroups", mappedBy="groups")
     */
    private $courseGroups;

    /**
     * Groups constructor.
     */
    public function __construct()
    {
        $this->groupsTeacher = new ArrayCollection();
        $this->courseGroups  = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Groups
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
     * @return ArrayCollection
     */
    public function getGroupsTeacher()
    {
        return $this->groupsTeacher;
    }

    /**
     * @param ArrayCollection $groupsTeacher
     * @return $this
     */
    public function setGroupsTeacher($groupsTeacher)
    {
        $this->groupsTeacher = $groupsTeacher;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCourseGroups()
    {
        return $this->courseGroups;
    }

    /**
     * @param ArrayCollection $courseGroups
     * @return $this
     */
    public function setCourseGroups($courseGroups)
    {
        $this->courseGroups = $courseGroups;
        return $this;
    }

}


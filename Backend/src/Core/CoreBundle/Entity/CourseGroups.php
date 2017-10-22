<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * CourseGroups
 *
 * @ORM\Table(name="course_groups")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\CourseGroupsRepository")
 */
class CourseGroups
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var Groups
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Groups", inversedBy="courseGroups", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     */
    private $groups;

    /**
     * @var Course
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Course", inversedBy="courseGroups", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     */
    private $course;


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
     * @return Groups
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Groups $groups
     * @return $this
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
        return $this;
    }

    /**
     * @return Course
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param Course $course
     * @return $this
     */
    public function setCourse($course)
    {
        $this->course = $course;
        return $this;
    }




}


<?php

namespace Core\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;


/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\CourseRepository")
 */
class Course
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
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $matter ;

    /**
     * @var Teacher
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Teacher")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $teacher;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Core\CoreBundle\Entity\CourseGroups", mappedBy="course")
     */
    private $courseGroups;

    /**
     * Groups constructor.
     */
    public function __construct()
    {
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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getMatter()
    {
        return $this->matter;
    }

    /**
     * @param string $matter
     * @return $this
     */
    public function setMatter($matter)
    {
        $this->matter = $matter;
        return $this;
    }

    /**
     * @return Teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * @param Teacher $teacher
     * @return $this
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;
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


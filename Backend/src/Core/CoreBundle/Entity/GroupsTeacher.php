<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * GroupsTeacher
 *
 * @ORM\Table(name="groups_teacher")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\GroupsTeacherRepository")
 */
class GroupsTeacher
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
     * @var Teacher
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Teacher", inversedBy="groupsTeacher", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     */
    private $teachers;

    /**
     * @var Groups
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Groups", inversedBy="groupsTeacher", fetch="EAGER")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @JMS\SerializedName("group")
     * @JMS\Groups({"GroupTeacher"})
     *
     */
    private $groups;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return Teacher
     */
    public function getTeachers()
    {
        return $this->teachers;
    }

    /**
     * @param Teacher $teachers
     * @return $this
     */
    public function setTeachers($teachers)
    {
        $this->teachers = $teachers;
        return $this;
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
}


<?php

namespace Core\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Teacher
 *
 * @ORM\Table(name="teacher")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\TeacherRepository")
 */
class Teacher extends User
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $id;

    /**
     * @var Role
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Role")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $role;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Core\CoreBundle\Entity\GroupsTeacher", mappedBy="teachers")
     */
    private $groupsTeacher;

    /**
     * Teacher constructor.
     */
    public function __construct()
    {
        $this->groupsTeacher = new ArrayCollection();
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
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return $this
     */
    public function setRole($role)
    {
        $this->role = $role;
        return $this;
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


}


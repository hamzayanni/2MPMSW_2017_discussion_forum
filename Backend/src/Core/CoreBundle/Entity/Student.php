<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\StudentRepository")
 */
class Student extends User
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
     * @var $group
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Groups")
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $group;


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
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     * @return $this
     */
    public function setGroup($group)
    {
        $this->group = $group;
        return $this;
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


}


<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\StudentRepository")
 */
class Student extends User
{

    /**
     * @var $group
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Groups")
     * @ORM\JoinColumn(nullable=false)
     * @JMS\SerializedName("group")
     * @JMS\Groups({"Student"})
     *
     */
    private $group;

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

}


<?php

namespace Core\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * Teacher
 *
 * @ORM\Table(name="teacher")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\TeacherRepository")
 */
class Teacher extends User
{

    /**
     * @var string
     *
     * @ORM\Column(name="grad", type="string", length=255)
     * @JMS\SerializedName("grad")
     * @JMS\Groups({"Teacher", "GroupTeacher"})
     */
    private $grad;

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
     * @return string
     */
    public function getGrad()
    {
        return $this->grad;
    }

    /**
     * @param string $grad
     * @return $this
     */
    public function setGrad($grad)
    {
        $this->grad = $grad;
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


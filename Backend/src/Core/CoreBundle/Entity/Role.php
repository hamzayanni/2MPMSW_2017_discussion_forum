<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * Role
 *
 * @ORM\Table(name="role")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\RoleRepository")
 */
class Role
{
    use TimestampableEntity;

    const ROLE_ROOT = "ROLE_ROOT";
    const ROLE_SUPER_ADMIN = "ROLE_SUPER_ADMIN";
    const ROLE_ADMIN = "ROLE_ADMIN";
    const ROLE_TEACHER = "ROLE_TEACHER";
    const ROLE_STUDENT = "ROLE_STUDENT";

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
     *
     * @ORM\Column(name="role", type="string", length=255)
     * @JMS\SerializedName("role")
     * @JMS\Groups({"Student", "Teacher", "Question", "Response", "GroupTeacher"})
     */
    private $role;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     * @JMS\SerializedName("code")
     * @JMS\Groups({"Student", "Teacher", "Question", "Response", "GroupTeacher"})
     */
    private $code;


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
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    public static function getAllConstants()
    {
        $class = new \ReflectionClass(__CLASS__);
        return $class->getConstants();
    }

}


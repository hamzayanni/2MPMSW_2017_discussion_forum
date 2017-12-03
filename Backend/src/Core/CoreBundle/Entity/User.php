<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\UserRepository")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"user" = "User", "Student" = "Student", "teacher" = "Teacher"})
 */
class User
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @JMS\SerializedName("id")
     * @JMS\Groups({"Student", "Teacher", "Question", "Response", "GroupTeacher"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255)
     * @JMS\SerializedName("first-name")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255)
     * @JMS\SerializedName("last-name")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @JMS\SerializedName("email")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $email;

    /**
     * @var int
     *
     * @ORM\Column(name="CIN", type="integer", length=8)
     * @JMS\SerializedName("cin")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $cIN;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     * @JMS\SerializedName("username")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255, nullable=true)
     * @JMS\SerializedName("sexe")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $sexe;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     * @JMS\SerializedName("password")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="validRegistration", type="boolean", nullable=true)
     * @JMS\SerializedName("valid-registration")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $validRegistration;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", nullable=true)
     * @JMS\SerializedName("score")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $score;

    /**
     * @var Role
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Role")
     * @ORM\JoinColumn(nullable=false)
     * @JMS\SerializedName("role")
     * @JMS\Groups({"Student", "Teacher", "Question", "Response", "GroupTeacher"})
     */
    private $role;

    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="Media")
     * @ORM\JoinColumn(nullable=true)
     * @JMS\SerializedName("avatar")
     * @JMS\Groups({"Student", "Teacher"})
     */
    private $media;


    public function __construct()
    {
        $this->validRegistration = false;
        $this->score = 0;
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set cIN
     *
     * @param string $cIN
     *
     * @return User
     */
    public function setCIN($cIN)
    {
        $this->cIN = $cIN;

        return $this;
    }

    /**
     * Get cIN
     *
     * @return string
     */
    public function getCIN()
    {
        return $this->cIN;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param int $score
     * @return $this
     */
    public function setScore($score)
    {
        $this->score = $score;
        return $this;
    }

    /**
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * @param string $sexe
     * @return $this
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValidRegistration()
    {
        return $this->validRegistration;
    }

    /**
     * @param bool $validRegistration
     * @return $this
     */
    public function setValidRegistration($validRegistration)
    {
        $this->validRegistration = $validRegistration;
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

    /**
     * @param $password
     * @return mixed
     */
    public function getDecryptedPassword($password)
    {
        if ($password) {
            if (password_verify($password, $this->password)) {
                return true;
            }
            return false;
        }

        return null;
    }

    /**
     * @return Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param Media $media
     * @return $this
     */
    public function setMedia(Media $media)
    {
        $this->media = $media;
        return $this;
    }



}


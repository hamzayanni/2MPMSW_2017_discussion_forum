<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * Question
 *
 * @ORM\Table(name="question")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\QuestionRepository")
 */
class Question
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @JMS\SerializedName("id")
     * @JMS\Groups({"Question", "Response"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @JMS\SerializedName("title")
     * @JMS\Groups({"Question", "Response"})
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @JMS\SerializedName("description")
     * @JMS\Groups({"Question", "Response"})
     */
    private $description;

    /**
     * @var Space
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Space")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @JMS\SerializedName("space")
     * @JMS\Groups({"Question", "Response"})
     *
     */
    private $space;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @JMS\SerializedName("user")
     * @JMS\Groups({"Question"})
     */
    private $user;


    /**
     * @var bool
     *
     * @ORM\Column(name="resolved", type="boolean", nullable=true)
     * @JMS\SerializedName("resolved")
     * @JMS\Groups({"Question"})
     */
    private $resolved;

    /**
     * @var bool
     *
     * @ORM\Column(name="hasResponse", type="boolean", nullable=true)
     * @JMS\SerializedName("has-response")
     * @JMS\Groups({"Question"})
     */
    private $hasResponse;

    public function __construct()
    {
        $this->hasResponse = false;
        $this->resolved = false;
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
     * @return Question
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
     * Set description
     *
     * @param string $description
     *
     * @return Question
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return Space
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * @param Space $space
     * @return $this
     */
    public function setSpace($space)
    {
        $this->space = $space;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return bool
     */
    public function isResolved()
    {
        return $this->resolved;
    }

    /**
     * @param bool $resolved
     */
    public function setResolved($resolved)
    {
        $this->resolved = $resolved;
    }

    /**
     * @return bool
     */
    public function isHasResponse()
    {
        return $this->hasResponse;
    }

    /**
     * @param bool $hasResponse
     */
    public function setHasResponse($hasResponse)
    {
        $this->hasResponse = $hasResponse;
    }

}


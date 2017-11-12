<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * Response
 *
 * @ORM\Table(name="response")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\ResponseRepository")
 */
class Response
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @JMS\SerializedName("id")
     * @JMS\Groups({"Response"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @JMS\SerializedName("description")
     * @JMS\Groups({"Response"})
     */
    private $description;

    /**
     * @var Question
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\Question")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     */
    private $question;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="Core\CoreBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     *
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="vote", type="integer")
     * @JMS\SerializedName("vote")
     * @JMS\Groups({"Response"})
     */
    private $vote;

    /**
     * @var bool
     *
     * @ORM\Column(name="bestResponse", type="boolean")
     * @JMS\SerializedName("best-response")
     * @JMS\Groups({"Response"})
     */
    private $bestResponse = false;


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
     * Set description
     *
     * @param string $description
     *
     * @return Response
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
     * @return Question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param Question $question
     * @return $this
     */
    public function setQuestion($question)
    {
        $this->question = $question;
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
     * Set vote
     *
     * @param integer $vote
     *
     * @return Response
     */
    public function setVote($vote)
    {
        $this->vote = $vote;

        return $this;
    }

    /**
     * Get vote
     *
     * @return int
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * @return bool
     */
    public function isBestResponse()
    {
        return $this->bestResponse;
    }

    /**
     * @param bool $bestResponse
     * @return $this
     */
    public function setBestResponse($bestResponse)
    {
        $this->bestResponse = $bestResponse;
        return $this;
    }


}


<?php

namespace Core\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use JMS\Serializer\Annotation as JMS;

/**
 * Space
 *
 * @ORM\Table(name="space")
 * @ORM\Entity(repositoryClass="Core\CoreBundle\Repository\SpaceRepository")
 */
class Space
{
    use TimestampableEntity;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @JMS\SerializedName("id")
     * @JMS\Groups({"Space", "Question", "Response"})
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     * @JMS\SerializedName("title")
     * @JMS\Groups({"Space", "Question", "Response"})
     */
    private $title;

    /**
     * @var string
     *
     * @JMS\SerializedName("nbQuestions")
     * @JMS\Groups({"Space"})
     */
    private $nbQuestions;

    public function __construct($nbQuestions = null)
    {
        $this->nbQuestions = 0;
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
     * @return Space
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
     * @return string
     */
    public function getNbQuestions()
    {
        return $this->nbQuestions;
    }

    /**
     * @param string $nbQuestions
     * @return $this
     */
    public function setNbQuestions($nbQuestions)
    {
        $this->nbQuestions = $nbQuestions;
        return $this;
    }


}


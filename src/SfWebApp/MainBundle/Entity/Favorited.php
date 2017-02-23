<?php

namespace SfWebApp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Favorited
 *
 * @ORM\Table(name="favorited")
 * @ORM\Entity(repositoryClass="SfWebApp\MainBundle\Repository\FavoritedRepository")
 */
class Favorited
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", cascade={"all"}, fetch="EAGER")
     *
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="Videos", cascade={"all"}, fetch="EAGER")
     *
     */
    private $videoId;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Favorited
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set videoId
     *
     * @param integer $videoId
     * @return Favorited
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;

        return $this;
    }

    /**
     * Get videoId
     *
     * @return integer
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * @return $string
     */
    public function __toString(){
        return "";
    }
}

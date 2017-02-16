<?php

namespace SfWebApp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FavsId
 *
 * @ORM\Table(name="favs_id")
 * @ORM\Entity(repositoryClass="SfWebApp\MainBundle\Repository\FavsIdRepository")
 */
class FavsId
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
     * @var int
     *
     * @ORM\Column(name="uuid", type="integer", unique=true)
     */
    private $uuid;

    /**
     * @var int
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="video_id", type="integer")
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
     * Set uuid
     *
     * @param integer $uuid
     * @return FavsId
     */
    public function setUuid($uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Get uuid
     *
     * @return integer 
     */
    public function getUuid()
    {
        return $this->uuid;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return FavsId
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
     * @return FavsId
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
}

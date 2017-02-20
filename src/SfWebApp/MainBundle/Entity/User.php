<?php

namespace SfWebApp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * Class User
 * @package SfWebApp\MainBundle\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    const ROLE_ADMIN = 'ROLE_ADMIN';
    const ROLE_USER = 'ROLE_USER';

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Many Users have Many Videos.
     * @ORM\ManyToMany(targetEntity="Videos", inversedBy="Users")
     * @ORM\JoinTable(name="Users_videos")
     */
    private $videos;


    /**
     * @var
     *
     * @ORM\Column(name="gender", type="string", length=255, nullable=true)
     */

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();

    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

}
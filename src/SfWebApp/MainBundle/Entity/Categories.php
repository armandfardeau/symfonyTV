<?php
/**
 * Created by PhpStorm.
 * User: armandfardeau
 * Date: 16/02/2017
 * Time: 12:35
 */
namespace SfWebApp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Categories
 * @package SfWebApp\MainBundle\Entity
 * @ORM\Table(name="Categories")
 * @ORM\Entity
 */
class Categories
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    protected $title;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->groups = new ArrayCollection();
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



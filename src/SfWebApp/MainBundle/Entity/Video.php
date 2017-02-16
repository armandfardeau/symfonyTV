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
 * Class Video
 * @package SfWebApp\MainBundle\Entity
 * @ORM\Table(name="video")
 * @ORM\Entity
 */
class Video
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
     * @var
     *
     * @ORM\ManyToMany(targetEntity="Categories", inversedBy="Video")
     * @ORM\JoinTable(name="video_categories",
     *      joinColumns={@ORM\JoinColumn(name="video_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="categories_id", referencedColumnName="id")}
     * )
     */
    protected $categories;

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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

}



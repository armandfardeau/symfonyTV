<?php

namespace SfWebApp\MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Videos
 *
 * @ORM\Table(name="Videos")
 * @ORM\Entity(repositoryClass="SfWebApp\MainBundle\Repository\VideosRepository")
 * @Vich\Uploadable
 **/
class Videos
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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * Many Videos have Many Users.
     * @ORM\ManyToMany(targetEntity="User", mappedBy="Videos")
     */
    private $users;

    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @var int
     *
     * @ORM\Column(name="channel", type="integer", nullable=true)
     */
    private $channel;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_start", type="time", nullable=true)
     */
    private $timeStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="time_end", type="time", nullable=true)
     */
    private $timeEnd;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", nullable=true)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="excerpt", type="string", length=255, nullable=true)
     */
    private $excerpt;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=255, nullable=true)
     */
    private $thumbnail;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="Videos", fileNameProperty="videoName")
     *
     * @var File
     * @Assert\File(maxSize="250M")
     * mimeTypes = {"video/mp4", "video/ogg"},
     * mimeTypesMessage = "Please upload a valid video"
     */
    private $videoFile;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $videoName;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the  update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile $video
     *
     * @return Videos
     */
    public function setVideoFile(File $video = null)
    {
        $this->videoFile = $video;

        if ($video) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    /**
     * @return File|null
     */
    public function getVideoFile()
    {
        return $this->videoFile;
    }

    /**
     * @param string $videoName
     *
     * @return Videos
     */
    public function setVideoName($videoName)
    {
        $this->videoName = $videoName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVideoName()
    {
        return $this->videoName;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Videos
     */
    public
    function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public
    function getTitle()
    {
        return $this->title;
    }

    /**
     * Set channel
     *
     * @param integer $channel
     * @return Videos
     */
    public
    function setChannel($channel)
    {
        $this->channel = $channel;

        return $this;
    }

    /**
     * Get channel
     *
     * @return integer
     */
    public
    function getChannel()
    {
        return $this->channel;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Videos
     */
    public
    function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public
    function getDate()
    {
        return $this->date;
    }

    /**
     * Set timeStart
     *
     * @param \DateTime $timeStart
     * @return Videos
     */
    public
    function setTimeStart($timeStart)
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    /**
     * Get timeStart
     *
     * @return \DateTime
     */
    public
    function getTimeStart()
    {
        return $this->timeStart;
    }

    /**
     * Set timeEnd
     *
     * @param \DateTime $timeEnd
     * @return Videos
     */
    public
    function setTimeEnd($timeEnd)
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    /**
     * Get timeEnd
     *
     * @return \DateTime
     */
    public
    function getTimeEnd()
    {
        return $this->timeEnd;
    }

    /**
     * Set category
     *
     * @param integer $category
     * @return Videos
     */
    public
    function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return integer
     */
    public
    function getCategory()
    {
        return $this->category;
    }

    /**
     * Set excerpt
     *
     * @param string $excerpt
     * @return Videos
     */
    public
    function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * Get excerpt
     *
     * @return string
     */
    public
    function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * Set thumbnail
     *
     * @param string $thumbnail
     * @return Videos
     */
    public
    function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail
     *
     * @return string
     */
    public
    function getThumbnail()
    {
        return $this->thumbnail;
    }
}

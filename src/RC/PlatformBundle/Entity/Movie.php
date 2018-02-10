<?php

namespace RC\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Movie
 *
 * @ORM\Table(name="movie")
 * @ORM\Entity(repositoryClass="RC\PlatformBundle\Repository\MovieRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Movie
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="datetime")
     */
    private $dateCreation;

    /**
     * @Gedmo\Slug(fields={"title", "year"})
     * @ORM\Column(name="slug", type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="integer", nullable=true)
     */
    private $duration;

    /**
     * @ORM\OneToOne(targetEntity="RC\PlatformBundle\Entity\Poster", cascade={"persist", "remove"})
     */
    private $poster;

    /**
     * @ORM\OneToOne(targetEntity="RC\PlatformBundle\Entity\Banner", cascade={"persist", "remove"})
     */
    private $banner;

    /**
     * @ORM\ManyToMany(targetEntity="RC\PlatformBundle\Entity\Category", cascade={"persist"})
     */
    private $categories;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="country_two", type="string", length=255, nullable=true)
     */
    private $countryTwo;

    /**
     * @var string
     *
     * @ORM\Column(name="country_three", type="string", length=255, nullable=true)
     */
    private $countryThree;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="release_date", type="date", nullable=true)
     */
    private $releaseDate;

    /**
     * @ORM\OneToOne(targetEntity="RC\PlatformBundle\Entity\Synopsis", cascade={"persist"})
     */
    private $Synopsis;

    /**
     * Movie constructor.
     */
    public function __construct()
    {
        $this->dateCreation = new \Datetime();
        $this->categories = new ArrayCollection();
    }

    /**
     * @var int
     * @ORM\Column(name="year", type="integer")
     */
    private $year;

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
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Movie
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Movie
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Movie
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
     * Set duration
     *
     * @param integer $duration
     *
     * @return Movie
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Movie
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set poster
     *
     * @param \RC\PlatformBundle\Entity\Poster $poster
     *
     * @return Movie
     */
    public function setPoster(Poster $poster = null)
    {
        $this->poster = $poster;

        return $this;
    }

    /**
     * Get poster
     *
     * @return \RC\PlatformBundle\Entity\Poster
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Movie
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Add category
     *
     * @param \RC\PlatformBundle\Entity\Category $category
     *
     * @return Movie
     */
    public function addCategory(\RC\PlatformBundle\Entity\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \RC\PlatformBundle\Entity\Category $category
     */
    public function removeCategory(\RC\PlatformBundle\Entity\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Movie
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set synopsis
     *
     * @param \RC\PlatformBundle\Entity\Synopsis $synopsis
     *
     * @return Movie
     */
    public function setSynopsis(\RC\PlatformBundle\Entity\Synopsis $synopsis = null)
    {
        $this->Synopsis = $synopsis;

        return $this;
    }

    /**
     * Get synopsis
     *
     * @return \RC\PlatformBundle\Entity\Synopsis
     */
    public function getSynopsis()
    {
        return $this->Synopsis;
    }

    /**
     * Set banner
     *
     * @param \RC\PlatformBundle\Entity\Banner $banner
     *
     * @return Movie
     */
    public function setBanner(\RC\PlatformBundle\Entity\Banner $banner = null)
    {
        $this->banner = $banner;

        return $this;
    }

    /**
     * Get banner
     *
     * @return \RC\PlatformBundle\Entity\Banner
     */
    public function getBanner()
    {
        return $this->banner;
    }

    /**
     * Set countryTwo
     *
     * @param string $countryTwo
     *
     * @return Movie
     */
    public function setCountryTwo($countryTwo)
    {
        $this->countryTwo = $countryTwo;

        return $this;
    }

    /**
     * Get countryTwo
     *
     * @return string
     */
    public function getCountryTwo()
    {
        return $this->countryTwo;
    }

    /**
     * Set countryThree
     *
     * @param string $countryThree
     *
     * @return Movie
     */
    public function setCountryThree($countryThree)
    {
        $this->countryThree = $countryThree;

        return $this;
    }

    /**
     * Get countryThree
     *
     * @return string
     */
    public function getCountryThree()
    {
        return $this->countryThree;
    }
}

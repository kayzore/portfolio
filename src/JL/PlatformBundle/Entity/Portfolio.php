<?php

namespace JL\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JL\PlatformBundle\Entity\PortfolioRepository")
 */
class Portfolio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="projectName", type="string", length=255)
     */
    private $projetName;

    /**
     * @var string
     *
     * @ORM\Column(name="shortDescription", type="string", length=255)
     */
    private $shortDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="urlImage", type="string", length=255)
     */
    private $urlImage;

    /**
     * @ORM\OneToMany(targetEntity="JL\PlatformBundle\Entity\ProjetImage", mappedBy="projet")
     */
    private $projectImages;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->projectImages = new ArrayCollection();
    }

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
     * Set projetName
     *
     * @param string $projetName
     * @return Portfolio
     */
    public function setProjetName($projetName)
    {
        $this->projetName = $projetName;

        return $this;
    }

    /**
     * Get projetName
     *
     * @return string 
     */
    public function getProjetName()
    {
        return $this->projetName;
    }

    /**
     * Set shortDescription
     *
     * @param string $shortDescription
     * @return Portfolio
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get shortDescription
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Portfolio
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
     * Add projectImages
     *
     * @param \JL\PlatformBundle\Entity\ProjetImage $projectImages
     * @return Portfolio
     */
    public function addProjectImage(ProjetImage $projectImages)
    {
        $this->projectImages[] = $projectImages;
        $projectImages->setProjet($this);
        return $this;
    }

    /**
     * Remove projectImages
     *
     * @param \JL\PlatformBundle\Entity\ProjetImage $projectImages
     */
    public function removeProjectImage(ProjetImage $projectImages)
    {
        $this->projectImages->removeElement($projectImages);
    }

    /**
     * Get projectImages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjectImages()
    {
        return $this->projectImages;
    }

    /**
     * Set urlImage
     *
     * @param string $urlImage
     * @return Portfolio
     */
    public function setUrlImage($urlImage)
    {
        $this->urlImage = $urlImage;

        return $this;
    }

    /**
     * Get urlImage
     *
     * @return string 
     */
    public function getUrlImage()
    {
        return $this->urlImage;
    }
}

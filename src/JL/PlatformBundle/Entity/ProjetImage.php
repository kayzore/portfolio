<?php

namespace JL\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProjetImage
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="JL\PlatformBundle\Entity\ProjetImageRepository")
 */
class ProjetImage
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="JL\PlatformBundle\Entity\Portfolio", inversedBy="projectImages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $projet;

    /**
     * @var string
     *
     * @ORM\Column(name="urlImage", type="string", length=255)
     */
    private $urlImage;

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
     * Set name
     *
     * @param string $name
     * @return ProjetImage
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set projet
     *
     * @param \JL\PlatformBundle\Entity\Portfolio $projet
     * @return ProjetImage
     */
    public function setProjet(Portfolio $projet)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \JL\PlatformBundle\Entity\Portfolio 
     */
    public function getProjet()
    {
        return $this->projet;
    }

    /**
     * Set urlImage
     *
     * @param string $urlImage
     * @return ProjetImage
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

<?php
// src/ISC/PlatformBundle/Services/JLPortfolio.php

namespace JL\PlatformBundle\Services;

use Doctrine\ORM\EntityManager;

class JLPortfolio
{
    private $em;

    /**
     * JLPortfolio constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em               = $em;
    }

    public function getLastRealisation()
    {
        $lastRealisation = $this->em->getRepository("JLPlatformBundle:Portfolio")->findBy(array(), array('id' => 'DESC'), 4);
        return $lastRealisation;
    }

    public function getAllRealisation()
    {
        $allRealisation = $this->em->getRepository("JLPlatformBundle:Portfolio")->findAll();
        return $allRealisation;
    }
}

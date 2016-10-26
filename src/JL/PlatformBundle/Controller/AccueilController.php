<?php

namespace JL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function accueilAction()
    {
        $portfolioService = $this->container->get('jl_platform.portfolio');
        $lastRealisation = $portfolioService->getLastRealisation();
        return $this->render('JLPlatformBundle::index.html.twig', array(
            'lastRealisation' => $lastRealisation
        ));
    }

    public function portfolioAction()
    {
        $portfolioService = $this->container->get('jl_platform.portfolio');
        $allRealisation = $portfolioService->getAllRealisation();
        return $this->render('JLPlatformBundle::portfolio.html.twig', array(
            'allRealisation' => $allRealisation
        ));
    }

    public function competencesAction()
    {
        return $this->render('JLPlatformBundle::competences.html.twig');
    }
}
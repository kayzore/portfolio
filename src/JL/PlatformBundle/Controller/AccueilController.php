<?php

namespace JL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function accueilAction()
    {
        return $this->render('JLPlatformBundle::index.html.twig');
    }

    public function portfolioAction()
    {
        return $this->render('JLPlatformBundle::portfolio.html.twig');
    }
}
<?php

namespace JL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JLPlatformBundle:Accueil:index.html.twig', array('name' => $name));
    }
}
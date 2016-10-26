<?php

namespace JL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use JL\PlatformBundle\Entity\Contact;

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

    public function contactAction()
    {
        $contact = new Contact();
        $form = $this->get('form.factory')->createBuilder('form', $contact)
            ->add('email',      'email')
            ->add('subject',    'text')
            ->add('content',    'textarea')
            ->add('Envoyer',    'submit')
            ->getForm();
        return $this->render('@JLPlatform/contact.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function contactPostAction(Request $request)
    {
        $contact = new Contact();
        $form = $this->get('form.factory')->createBuilder('form', $contact)
            ->add('email',      'email')
            ->add('subject',    'text')
            ->add('content',    'textarea')
            ->add('Envoyer',    'submit')
            ->getForm();
        $form->handleRequest($request);
        $data = $form->getData();

        $message = \Swift_Message::newInstance()
            ->setContentType('text/html')
            ->setSubject($data->getSubject())
            ->setFrom($data->getEmail())
            ->setTo('jerome.lelievre2@gmail.com')
            ->setBody('Réponse : '.$data->getEmail().'<br />'.nl2br($data->getContent()));

        $this->get('mailer')->send($message);

        $resultSend = 'Votre message à été envoyé avec succés.';

        return $this->render('@JLPlatform/contact.html.twig', array(
            'form' => $form->createView(),
            'resultSend' => $resultSend,
        ));
    }
}

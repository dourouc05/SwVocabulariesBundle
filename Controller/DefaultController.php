<?php

namespace Sw\VocabulariesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('SwVocabulariesBundle:Default:index.html.twig', array('name' => $name));
    }
}

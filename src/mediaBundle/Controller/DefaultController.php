<?php

namespace mediaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('mediaBundle:Default:index.html.twig');
    }
}

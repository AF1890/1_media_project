<?php

namespace MediaProjectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MediaProjectBundle:Album:index.html.twig');
    }
}

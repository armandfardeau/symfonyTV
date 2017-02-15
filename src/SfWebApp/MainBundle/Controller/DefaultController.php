<?php

namespace SfWebApp\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfWebAppMainBundle:Default:index.html.twig');
    }
}

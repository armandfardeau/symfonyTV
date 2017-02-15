<?php

namespace SfWebApp\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfWebAppBackOfficeBundle:Default:index.html.twig');
    }
}

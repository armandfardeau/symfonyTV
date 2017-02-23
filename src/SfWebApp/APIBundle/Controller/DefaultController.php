<?php

namespace SfWebApp\APIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfWebAppAPIBundle:Default:index.html.twig');
    }
}

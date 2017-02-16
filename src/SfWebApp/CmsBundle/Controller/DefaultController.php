<?php

namespace SfWebApp\CmsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $videos = $this->getDoctrine()->getRepository('SfWebAppMainBundle:Videos')->findAll();

        return $this->render('SfWebAppCmsBundle:Default:index.html.twig',  ['videos' => $videos]);
    }
}
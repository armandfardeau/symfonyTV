<?php

namespace SfWebApp\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $videos = $em->getRepository('SfWebAppMainBundle:Channels')->findAll();

        return $this->render('SfWebAppFrontOfficeBundle:Default:index.html.twig', array(
            'videos' => $videos,
        ));
    }
}

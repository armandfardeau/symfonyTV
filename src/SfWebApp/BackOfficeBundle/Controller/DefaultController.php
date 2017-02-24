<?php

namespace SfWebApp\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    public function indexAction(Request $request, Videos $video)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $videos = $em->getRepository('SfWebAppMainBundle:Videos')->find($user);
        return $this->render('SfWebAppFrontOfficeBundle:Default:single_post.html.twig',
            array(
                'videos' => $videos,
            ));
    }
}

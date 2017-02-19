<?php
namespace SfWebApp\FrontOfficeBundle\Controller;

use SfWebApp\MainBundle\Entity\Videos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $videos = $em->getRepository('SfWebAppMainBundle:Videos')->findAll();

        return $this->render('SfWebAppFrontOfficeBundle:Default:index.html.twig',
            array(
                'videos' => $videos,
            ));
    }

    /**
     * Finds and displays a video entity.
     *
     * @Route("/news/{title}", name="single_post")
     * @Method("GET")
     */
    public function showAction(Videos $video)
    {
        return $this->render('SfWebAppFrontOfficeBundle:Default:single_post.html.twig',
            array(
                'video' => $video,
            ));
    }
}

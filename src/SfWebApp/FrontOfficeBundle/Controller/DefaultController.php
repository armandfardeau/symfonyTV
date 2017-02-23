<?php
namespace SfWebApp\FrontOfficeBundle\Controller;

use SfWebApp\MainBundle\Entity\Favorited;
use SfWebApp\MainBundle\Entity\Videos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DefaultController
 * @package SfWebApp\FrontOfficeBundle\Controller
 */
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
     * @Method("GET|POST")
     */
    public function showAction(Request $request, Videos $video)
    {
        $favorited = new Favorited();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $formLike = $this->createFormBuilder($favorited)
            ->add('save', SubmitType::class, array('label' => 'Like'))
            ->getForm();

        $formLike->handleRequest($request);

        if ($formLike->isSubmitted() && $formLike->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $favorited = $formLike->getData();
            $favorited->setVideoId($video);
            $favorited->setUserId($user);
            dump($favorited);
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            $em = $this->getDoctrine()->getManager();
            $em->persist($favorited);
            $em->flush();
        }
        $em = $this->getDoctrine()->getManager();
        $videos = $em->getRepository('SfWebAppMainBundle:Videos')->findAll();
        return $this->render('SfWebAppFrontOfficeBundle:Default:single_post.html.twig',
            array(
                'videos' => $videos,
                'video' => $video,
                'formLike' => $formLike->createView(),
            ));
    }

    /**
     * @Route("/favoris", name="favorited_by_users")
     * @Method("GET")
     */
    public function favoritedAction(Request $request)
    {
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $em = $this->getDoctrine()->getManager();
        $favoris = $em->getRepository('SfWebAppMainBundle:Favorited')->find($user);
        $videos = $em->getRepository('SfWebAppMainBundle:Videos')->findAll($favoris);
        return $this->render('SfWebAppFrontOfficeBundle:Default:favoris.html.twig',
            array(
                'videos' => $videos,
            ));
    }
}

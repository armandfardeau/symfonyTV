<?php

namespace SfWebApp\MainBundle\Controller;

use SfWebApp\MainBundle\Entity\Videos;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Video controller.
 *
 * @Route("videos")
 */
class VideosController extends Controller
{
    /**
     * Lists all video entities.
     *
     * @Route("/", name="videos_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $videos = $em->getRepository('SfWebAppMainBundle:Videos')->findAll();

        return $this->render('videos/index.html.twig', array(
            'videos' => $videos,
        ));
    }

    /**
     * Creates a new video entity.
     *
     * @Route("/new", name="videos_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $video = new Video();
        $form = $this->createForm('SfWebApp\MainBundle\Form\VideosType', $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush($video);

            return $this->redirectToRoute('videos_show', array('id' => $video->getId()));
        }

        return $this->render('videos/new.html.twig', array(
            'video' => $video,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a video entity.
     *
     * @Route("/{id}", name="videos_show")
     * @Method("GET")
     */
    public function showAction(Videos $video)
    {
        $deleteForm = $this->createDeleteForm($video);

        return $this->render('videos/show.html.twig', array(
            'video' => $video,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing video entity.
     *
     * @Route("/{id}/edit", name="videos_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Videos $video)
    {
        $deleteForm = $this->createDeleteForm($video);
        $editForm = $this->createForm('SfWebApp\MainBundle\Form\VideosType', $video);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('videos_edit', array('id' => $video->getId()));
        }

        return $this->render('videos/edit.html.twig', array(
            'video' => $video,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a video entity.
     *
     * @Route("/{id}", name="videos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Videos $video)
    {
        $form = $this->createDeleteForm($video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($video);
            $em->flush($video);
        }

        return $this->redirectToRoute('videos_index');
    }

    /**
     * Creates a form to delete a video entity.
     *
     * @param Videos $video The video entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Videos $video)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('videos_delete', array('id' => $video->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

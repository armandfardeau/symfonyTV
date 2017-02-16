<?php

namespace SfWebApp\MainBundle\Controller;

use SfWebApp\MainBundle\Entity\Channels;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Channel controller.
 *
 * @Route("channels")
 */
class ChannelsController extends Controller
{
    /**
     * Lists all channel entities.
     *
     * @Route("/", name="channels_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $channels = $em->getRepository('SfWebAppMainBundle:Channels')->findAll();

        return $this->render('channels/index.html.twig', array(
            'channels' => $channels,
        ));
    }

    /**
     * Creates a new channel entity.
     *
     * @Route("/new", name="channels_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $channel = new Channels();
        $form = $this->createForm('SfWebApp\MainBundle\Form\ChannelsType', $channel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($channel);
            $em->flush($channel);

            return $this->redirectToRoute('channels_show', array('id' => $channel->getId()));
        }

        return $this->render('channels/new.html.twig', array(
            'channel' => $channel,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a channel entity.
     *
     * @Route("/{id}", name="channels_show")
     * @Method("GET")
     */
    public function showAction(Channels $channel)
    {
        $deleteForm = $this->createDeleteForm($channel);

        return $this->render('channels/show.html.twig', array(
            'channel' => $channel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing channel entity.
     *
     * @Route("/{id}/edit", name="channels_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Channels $channel)
    {
        $deleteForm = $this->createDeleteForm($channel);
        $editForm = $this->createForm('SfWebApp\MainBundle\Form\ChannelsType', $channel);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('channels_edit', array('id' => $channel->getId()));
        }

        return $this->render('channels/edit.html.twig', array(
            'channel' => $channel,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a channel entity.
     *
     * @Route("/{id}", name="channels_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Channels $channel)
    {
        $form = $this->createDeleteForm($channel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($channel);
            $em->flush($channel);
        }

        return $this->redirectToRoute('channels_index');
    }

    /**
     * Creates a form to delete a channel entity.
     *
     * @param Channels $channel The channel entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Channels $channel)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('channels_delete', array('id' => $channel->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace SfWebApp\MainBundle\Controller;

use SfWebApp\MainBundle\Entity\FavsId;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Favsid controller.
 *
 * @Route("favsid")
 */
class FavsIdController extends Controller
{
    /**
     * Lists all favsId entities.
     *
     * @Route("/", name="favsid_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $favsIds = $em->getRepository('SfWebAppMainBundle:FavsId')->findAll();

        return $this->render('SfWebAppMainBundle:favsid:index.html.twig', array(
            'favsIds' => $favsIds,
        ));
    }

    /**
     * Creates a new favsId entity.
     *
     * @Route("/new", name="favsid_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $favsId = new Favsid();
        $form = $this->createForm('SfWebApp\MainBundle\Form\FavsIdType', $favsId);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($favsId);
            $em->flush($favsId);

            return $this->redirectToRoute('favsid_show', array('id' => $favsId->getId()));
        }

        return $this->render('SfWebAppMainBundle:favsid:new.html.twig', array(
            'favsId' => $favsId,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a favsId entity.
     *
     * @Route("/{id}", name="favsid_show")
     * @Method("GET")
     */
    public function showAction(FavsId $favsId)
    {
        $deleteForm = $this->createDeleteForm($favsId);

        return $this->render('SfWebAppMainBundle:favsid:show.html.twig', array(
            'favsId' => $favsId,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing favsId entity.
     *
     * @Route("/{id}/edit", name="favsid_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, FavsId $favsId)
    {
        $deleteForm = $this->createDeleteForm($favsId);
        $editForm = $this->createForm('SfWebApp\MainBundle\Form\FavsIdType', $favsId);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('favsid_edit', array('id' => $favsId->getId()));
        }

        return $this->render('SfWebAppMainBundle:favsid:edit.html.twig', array(
            'favsId' => $favsId,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a favsId entity.
     *
     * @Route("/{id}", name="favsid_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, FavsId $favsId)
    {
        $form = $this->createDeleteForm($favsId);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($favsId);
            $em->flush($favsId);
        }

        return $this->redirectToRoute('favsid_index');
    }

    /**
     * Creates a form to delete a favsId entity.
     *
     * @param FavsId $favsId The favsId entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FavsId $favsId)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('favsid_delete', array('id' => $favsId->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

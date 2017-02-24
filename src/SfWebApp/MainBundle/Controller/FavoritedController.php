<?php

namespace SfWebApp\MainBundle\Controller;

use SfWebApp\MainBundle\Entity\Favorited;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Favorited controller.
 *
 * @Route("/favorited")
 */
class FavoritedController extends Controller
{
    /**
     * Lists all favorited entities.
     *
     * @Route("/", name="admin_favorited_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $favoriteds = $em->getRepository('SfWebAppMainBundle:Favorited')->findAll();

        return $this->render('SfWebAppMainBundle:favorited:index.html.twig', array(
            'favoriteds' => $favoriteds,
        ));
    }

    /**
     * Creates a new favorited entity.
     *
     * @Route("/new", name="admin_favorited_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $favorited = new Favorited();
        $form = $this->createForm('SfWebApp\MainBundle\Form\FavoritedType', $favorited);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($favorited);
            $em->flush($favorited);

            return $this->redirectToRoute('admin_favorited_show', array('id' => $favorited->getId()));
        }

        return $this->render('SfWebAppMainBundle:favorited/new.html.twig', array(
            'favorited' => $favorited,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a favorited entity.
     *
     * @Route("/{id}", name="admin_favorited_show")
     * @Method("GET")
     */
    public function showAction(Favorited $favorited)
    {
        $deleteForm = $this->createDeleteForm($favorited);

        return $this->render('SfWebAppMainBundle:favorited:show.html.twig', array(
            'favorited' => $favorited,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing favorited entity.
     *
     * @Route("/{id}/edit", name="admin_favorited_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Favorited $favorited)
    {
        $deleteForm = $this->createDeleteForm($favorited);
        $editForm = $this->createForm('SfWebApp\MainBundle\Form\FavoritedType', $favorited);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_favorited_edit', array('id' => $favorited->getId()));
        }

        return $this->render('SfWebAppMainBundle:favorited:edit.html.twig', array(
            'favorited' => $favorited,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a favorited entity.
     *
     * @Route("/{id}", name="admin_favorited_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Favorited $favorited)
    {
        $form = $this->createDeleteForm($favorited);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($favorited);
            $em->flush($favorited);
        }

        return $this->redirectToRoute('admin_favorited_index');
    }

    /**
     * Creates a form to delete a favorited entity.
     *
     * @param Favorited $favorited The favorited entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Favorited $favorited)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_favorited_delete', array('id' => $favorited->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }
}

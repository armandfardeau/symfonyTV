<?php
/**
 * Created by PhpStorm.
 * User: armandfardeau
 * Date: 15/02/2017
 * Time: 18:02
 */

namespace SfWebApp\FrontOfficeBundle\Controller;

use FOS\UserBundle\Controller\ProfileController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use FOS\UserBundle\Model\UserInterface;

class ProfileController extends BaseController
{

    protected $container;

    /**
     * @return ContainerInterface
     */
    public function getContainer()
    {
        return $this->container;
    }

    /**
     * Show the user
     */
    public function showAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Profile:show.html.'.$this->container->getParameter('fos_user.template.engine'), array('user' => $user));
    }

    /**
     * Edit the user
     */
    public function editAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        $request = $this->container->get('request');

        $form = $this->container->get('fos_user.profile.form');

        $data = $request->request->get('fos_user_profile_form');
        $userId = $user->getId();

        if ($request->getMethod() == 'POST') {

            $em = $this->getContainer()->get('doctrine.orm.entity_manager');
            $user = $em->getRepository('SfWebAppMainBundle:User')->find($userId);

            $user->setGender($data['gender']);
            $user->setFirstname($data['firstname']);
            $user->setLastname($data['lastname']);
            $user->setEmail($data['email']);
            $user->setEmailCanonical($data['email']);
            $user->setPhone($data['phone']);
            $user->setAddress($data['address']);
            $user->setZipCode($data['zip_code']);
            $user->setCity($data['city']);
            $user->setCountry($data['country']);
            $user->setPlainPassword($data['plainPassword']['first']);

            $em->persist($user);
            $em->flush();

            $this->setFlash('fos_user_success', 'profile.flash.updated');

            return new RedirectResponse($this->getRedirectionUrl($user));
        }

        return $this->container->get('templating')->renderResponse(
            'FOSUserBundle:Profile:edit.html.'.$this->container->getParameter('fos_user.template.engine'),
            array('form' => $form->createView())
        );
    }

    /**
     * Generate the redirection url when editing is completed.
     *
     * @param \FOS\UserBundle\Model\UserInterface $user
     *
     * @return string
     */
    protected function getRedirectionUrl(UserInterface $user)
    {
        return $this->container->get('router')->generate('fos_user_profile_show');
    }

    /**
     * @param string $action
     * @param string $value
     */
    protected function setFlash($action, $value)
    {
        $this->container->get('session')->getFlashBag()->set($action, $value);
    }
}
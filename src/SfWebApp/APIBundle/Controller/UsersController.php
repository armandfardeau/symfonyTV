<?php

namespace SfWebApp\APIBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use SfWebApp\MainBundle\Entity\User;


class UsersController extends Controller
{
    /**
     * @Route("/users", name="API_users")
     * @Method({"GET"})
     */
    public function usersAction(Request $request)
    {
        $users = $this->get('doctrine.orm.entity_manager')
            ->getRepository('SfWebAppMainBundle:User')
            ->findAll();
        /* @var $users User[] */

        if (empty($users)) {
            return new JsonResponse(['message' => 'Show not found'], Response::HTTP_NOT_FOUND);
        }

        $formatted = [];
        foreach ($users as $user) {
            $formatted[] = [
                'id' => $user->getId(),
                'Email' => $user->getEmail(),
                'Username' => $user->getUsername(),

            ];
        }

        return new JsonResponse($formatted);
    }


    /**
     * @Route("/user/{user_id}", name="API_user")
     * @Method({"GET"})
     */
    public function userAction(Request $request)
    {
        $user = $this->get('doctrine.orm.entity_manager')
            ->getRepository('SfWebAppMainBundle:User')
            ->find($request->get('user_id'));
        /* @var $user User */

        if (empty($user)) {
            return new JsonResponse(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
        $formatted[] = [
            'id' => $user->getId(),
            'Email' => $user->getEmail(),
            'Username' => $user->getUsername(),
        ];

        return new JsonResponse($formatted);
    }
}

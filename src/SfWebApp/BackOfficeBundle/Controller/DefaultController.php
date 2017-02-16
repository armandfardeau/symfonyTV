<?php

namespace SfWebApp\BackOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use SfWebApp\MainBundle\Entity\Videos;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SfWebAppBackOfficeBundle:Default:index.html.twig');
    }

    public function addAction(Request $request)
    {
        {
            // On crée un objet Advert
            $videos = new Videos();

            // On crée le FormBuilder grâce au service form factory
            $formBuilder = $this->get('form.factory')->createBuilder('form', $videos);

            // On ajoute les champs de l'entité que l'on veut à notre formulaire
            $formBuilder
                ->add('date', 'date')
                ->add('title', 'text')
                ->add('content', 'textarea')
                ->add('author', 'text')
                ->add('published', 'checkbox')
                ->add('save', 'submit');

            // À partir du formBuilder, on génère le formulaire
            $form = $formBuilder->getForm();

            // On passe la méthode createView() du formulaire à la vue
            // afin qu'elle puisse afficher le formulaire toute seule
            return $this->render('@SfWebAppBackOffice/Default/add.html.twig', array(
                'form' => $form->createView(),
            ));
        }

    }
}

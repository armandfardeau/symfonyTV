<?php
/**
 * Created by PhpStorm.
 * User: armandfardeau
 * Date: 15/02/2017
 * Time: 17:16
 */

namespace SfWebApp\FrontOfficeBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Form\Type\RegistrationFormType;

class RegisterType extends RegistrationFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('gender', 'text', array(
                'label' => 'profile.fields.gender',
                'translation_domain' => 'forms'
            ))
            ->add('firstname', 'text', array(
                'label' => 'profile.fields.firstname',
                'translation_domain' => 'forms'
            ))
            ->add('lastname', 'text', array(
                'label' => 'profile.fields.lastname',
                'translation_domain' => 'forms'
            ))
            ->add('address', 'text', array(
                'label' => 'profile.fields.address',
                'translation_domain' => 'forms'
            ))
            ->add('zip_code', 'text', array(
                'label' => 'profile.fields.zip_code',
                'translation_domain' => 'forms'
            ))
            ->add('city', 'text', array(
                'label' => 'profile.fields.city',
                'translation_domain' => 'forms'
            ))
            ->add('country', 'text', array(
                'label' => 'profile.fields.country',
                'translation_domain' => 'forms'
            ))
            ->add('phone', 'text', array(
                'label' => 'profile.fields.phone',
                'translation_domain' => 'forms'
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SfWebApp\MainBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'sf_web_app_fos_user_register';
    }
}
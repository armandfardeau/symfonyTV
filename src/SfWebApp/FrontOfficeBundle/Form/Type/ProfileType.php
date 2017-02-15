<?php
/**
 * Created by PhpStorm.
 * User: armandfardeau
 * Date: 15/02/2017
 * Time: 17:13
 */
namespace SfWebApp\FrontOfficeBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use FOS\UserBundle\Form\Type\ProfileFormType;

class ProfileType extends ProfileFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', 'choice', array(
                'label' => 'profile.fields.gender',
                'translation_domain' => 'forms',
                'choices' => array(
                    'm' => 'M.',
                    'f' => 'Mme'
                ),
                'required' => false
            ))
            ->add('firstname', 'text', array(
                'label' => 'profile.fields.firstname',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('lastname', 'text', array(
                'label' => 'profile.fields.lastname',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('address', 'textarea', array(
                'label' => 'profile.fields.address',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('zip_code', 'text', array(
                'label' => 'profile.fields.zip_code',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('city', 'text', array(
                'label' => 'profile.fields.city',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('country', 'text', array(
                'label' => 'profile.fields.country',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('phone', 'text', array(
                'label' => 'profile.fields.phone',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('email', 'email', array(
                'label' => 'profile.fields.email',
                'translation_domain' => 'forms',
                'required' => false
            ))
            ->add('plainPassword', 'repeated', array(
                'first_options'  => array(
                    'label' => 'profile.fields.password_first',
                    'required' => false
                ),
                'second_options' => array(
                    'label' => 'profile.fields.password_second'
                ),
                'translation_domain' => 'forms',
                'required' => false
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'validation_groups' => array('Default', 'Account'),
            'data_class' => 'SfWebApp\MainBundle\Entity\User'
        ));
    }

    public function getName()
    {
        return 'sf_web_app_fos_user_profile';
    }
}
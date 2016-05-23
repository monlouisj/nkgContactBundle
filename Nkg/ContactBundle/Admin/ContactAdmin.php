<?php
namespace Nkg\ContactBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints as Assert;

class ContactAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('firstname', 'text', array('label' => 'Prenom'))
            ->add('lastname', 'text', array('label' => 'Nom'))
            ->add('country', 'text', array('label' => 'Country'))
            ->add('localisation', 'text', array('label' => 'Localisation'))
            ->add('profession', 'text', array('label' => 'Profession'))
            ->add('email', 'text', array('label' => 'email'))
            ->add('facebookUid', 'text', array('label' => 'FB id'))
            ->add('mobile', 'text', array('label' => 'Tel mobile'))
            ->add('optin', 'checkbox', array('label' => 'Recevoir nos offres','required'=>false))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstname')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('firstname')
            ->add('lastname')
            ->add('mobile')
            ->add('parrain', 'text', array('identifier ' => true))
        ;
    }

}

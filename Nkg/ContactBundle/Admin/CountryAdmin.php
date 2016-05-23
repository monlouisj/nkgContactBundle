<?php
namespace Nkg\ContactBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Validator\Constraints as Assert;

class CountryAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('label', 'text')
            ->add('slug', 'text')
            ->add('fuseau', 'text')
            ->add('numero', 'text')
            ->add('communes', 'sonata_type_collection', array(
                  'label'       => "Veuillez saisir les communes proposées:",
                  'by_reference'       => false,
                  'cascade_validation' => true,
              ), array(
                  'edit' => 'inline',
                  'inline' => 'table'
              ))
            ->add('active', 'checkbox',array('required'=>false))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('label')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('label')
            ->add('active')
        ;
    }

}

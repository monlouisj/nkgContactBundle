<?php

	namespace Nkg\ContactBundle\Form;

	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolverInterface;
	use Symfony\Component\Validator\Constraints\Collection;

	class ContactType extends AbstractType {
		public function __construct($communes, $departements, $age_min) {
			$this->communes = $communes;
			$this->departements = $departements;
			$this->age_min = $age_min;
		}
		/**
		 * @param FormBuilderInterface $builder
		 * @param array                $options
		 */
		public function buildForm(FormBuilderInterface $builder, array $options) {
			$builder->add('firstname', 'text');
			$builder->add('lastname', 'text');
			$builder->add('gender', 'text');
			// $builder->add('gender', 'choice',array(
      //   "choices" => array("","Mme/Melle","M.")
      // ));
			$builder->add('dateofbirth', 'birthday', array("years"=> range(date('Y') - $this->age_min, date('Y') - 100), "attr"=>array( "class"=>"selectiondate" ), "required" => false));
			$builder->add('email', 'email', array("required" => false));
			$builder->add('facebook_uid', 'hidden', array("required" => false));
			$builder->add('facebook_name', 'hidden', array("required" => false));
			$builder->add('twitter_uid', 'hidden', array("required" => false));
			$builder->add('twitter_name', 'hidden', array("required" => false));
			$builder->add('phone', 'number', array("required" => false));
			$builder->add('mobile', 'text', array("required" => true));
			$builder->add('country',  'entity', array(
			    'class' => 'NkgContactBundle:Country',
			    'choices' => $this->departements,
			));
			$builder->add('localisation',  'entity', array(
			    'class' => 'NkgContactBundle:Localisation',
			    'choices' => $this->communes,
			));
      $builder->add('description', 'textarea');

			$builder->add('optin', 'checkbox',
        array("label" =>"Recevoir nos offres","required" => false)
      );
			$builder->add('optinpartenr', 'checkbox',
        array("label" =>"Recevoir les offres de nos partenaires","required" => false)
      );
		}



		/**
		 * @param OptionsResolverInterface $resolver
		 */
		public function setDefaultOptions(OptionsResolverInterface $resolver) {
			$resolver->setDefaults(array(
				'data_class' => 'Nkg\ContactBundle\Entity\Contact',
			));
		}


		/**
		 * @return string
		 */
		public function getName() {
			return 'contactbundle_contact';
		}
	}

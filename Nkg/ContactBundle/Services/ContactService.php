<?php
namespace Nkg\ContactBundle\Services;
use Symfony\Component\HttpFoundation\Session\Session;
use Doctrine\ORM\EntityManager;
use Nkg\ContactBundle\Form\ContactType;
use Symfony\Component\PropertyAccess\PropertyAccess;

class ContactService
{
  protected $em;
  protected static $session_key = "registered";
  protected static $hydratables = array("gender","firstname","lastname","email","facebookUid");

  public function __construct(EntityManager $em, $session, $contactEntity, $contactRepository) {
      $this->em = $em;
      $this->session = $session;
      $this->contactEntity = $contactEntity;
      $this->contactRepository = $contactRepository;
  }

  public function createContact()
  {
    $contact = new $this->contactEntity();
    return $contact;
  }

  // get contact entity from contact_id stored in session[$session_key]
  public function getFromSession($session_key = null)
  {
    if(is_null($session_key)) $session_key = self::$session_key;
    $contact_id = $this->session->get($session_key);
    $contact = $this->findOne(array("id"=>$contact_id));
    return $contact;
  }

  // stores the id of $contact in session[$session_key]
  public function putInSession($contact,$session_key = null)
  {
    if(is_null($session_key)) $session_key = self::$session_key;
    $this->session->remove($session_key);
    $this->session->set($session_key, $contact->getId());
    return;
  }

  // resets session[$session_key]
  public function resetSession($session_key = null)
  {
    if(is_null($session_key)) $session_key = self::$session_key;
    return $this->session->remove($session_key);
  }

  //returns a ContactType
  public function createForm($age_min = 16, $localisation=null, $countries=null)
  {
    if(is_null($localisation)) $localisation = $this->getLocalisations();
    if(is_null($countries)) $countries = $this->getCounties();
    $form = new ContactType($localisation, $countries, $age_min);
    return $form;
  }

  public function findOne($findBy)
  {
    $contacts = $this->em
    ->getRepository($this->contactRepository)
    ->findBy($findBy);

    if(!isset($contacts[0])) return false;

    return $contacts[0];
  }

  //hydrate $contact with data stored in session[$session_key]
  public function hydrate($contact)
  {
    $inscrit = $this->session->get(self::$session_key);
    $accessor = PropertyAccess::createPropertyAccessor();

    if(!($inscrit instanceof $this->contactEntity)) return $contact;

    foreach (self::$hydratables as $hydratable) {
      $val = $accessor->getValue($inscrit, $hydratable);
      if(!is_null($val))
        $accessor->setValue($contact, $hydratable, $val);
    }

    return $contact;
  }

  //persists or merges
  public function saveContact($contact)
  {
    if(!is_null($contact->getId())){
      $this->em->merge($contact);
    }else{
      $this->em->persist($contact);
    }
    $this->em->flush();
    return $contact;
  }

  // is the contact known?
  // $criteria = [field => value]
  public function isKnown($contact, array $criteria)
  {
    $accessor = PropertyAccess::createPropertyAccessor();
    foreach ($criteria as $criterion) {
      if ($accessor->isReadable($contact, $criterion)) {
        $contact_value = $accessor->getValue($contact, $criterion);
        if(!is_null($contact_value)){
          $is_known = $this->findOne( array($criterion => $contact_value ) );
          if($is_known){
            return $is_known;
          }
        }
      }
    }
    return false;
  }

  //validate $contact as an entity
  public function isValid($contact)
  {
    return $contact instanceof $this->contactEntity;
  }

  //get active countries
  public function getCounties()
  {
    $countries = $this->em
    ->getRepository('NkgContactBundle:Country')
    ->findBy(array("active"=>true));

    return $countries;
  }

  //get active localisations
  public function getLocalisations()
  {
    $countries = $this->getCountry();
    $localisationRepo = $this->em
    ->getRepository('NkgContactBundle:Localisation');
    $localisations = array();
    foreach ($countries as $country) {
      if($country->getLabel())
        $localisations [$country->getLabel()] = $localisationRepo->findBy(array("country"=>$country), array("label"=>"ASC"));
    }

    return $localisations;
  }

  //get localisations of a country
  public function getLocalisationOf($country_id)
  {
    $country = $this->em
    ->getRepository('NkgContactBundle:Country')
    ->find($country_id);

    if(empty($country)) return false;

    $localisations = $this->em
    ->getRepository('NkgContactBundle:Localisation')
    ->findBy(array("country"=>$country), array("label"=>"ASC"));

    return $localisations;
  }

  // test success or number of participations or else
  public function canPlay($contact)
  {
      // return true !== $contact->getSucces();
      return !(intval($contact->getParticipations()) >= 1 );
  }
}

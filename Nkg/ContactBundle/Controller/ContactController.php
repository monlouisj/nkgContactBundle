<?php

namespace Nkg\ContactBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

class ContactController extends Controller
{
  
  /**
  * @Route("/communes/{departement_id}", defaults={"departement_id" = ""}, name="_communesParDepartmt")
  */
  public function getLocalisationAction($departement_id)
  {
    $communes = $this->prospect->getLocalisationDe($departement_id);
		$html = '';
		$html = $html . sprintf("<option value=\"%d\">%s</option>", null, 'Sélectionnez votre commune');

		if($communes) {
      foreach ($communes as $commune) {
    		$html = $html . sprintf("<option value=\"%d\">%s</option>", $commune->getId(), $commune->getLabel());
    	}
		}

		return new Response($html);
  }
}

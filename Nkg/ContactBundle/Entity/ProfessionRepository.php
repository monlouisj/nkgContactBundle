<?php

namespace Nkg\ContactBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ProfessionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProfessionRepository extends EntityRepository {

	public function findProfessions() {
		return $this->findBy(array("active"=>true),array("label"=>"ASC"));
	}
}

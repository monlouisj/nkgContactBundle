<?php

namespace Nkg\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Localisation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nkg\ContactBundle\Entity\LocalisationRepository")
 */
class Localisation {


	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id;

	/**
	 * @ORM\Column(name="label", type="string", length=64)
	 */
	protected $label;

	/**
	 * @ORM\Column(name="slug", type="string", length=64, unique=true, nullable=true)
	 */
	protected $slug;

	/**
	 * @ORM\Column(name="active", type="boolean")
	 */
	protected $active = true;

	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set active
	 *
	 * @param boolean $active
	 * @return Publish
	 */
	public function setActive($active) {
		$this->active = $active;

		return $this;
	}

	/**
	 * Get active
	 *
	 * @return boolean
	 */
	public function getActive() {
		return $this->active;
	}

	/**
	 * Set label
	 *
	 * @param string $label
	 * @return MenuItem
	 */
	public function setLabel($label) {
		$this->label = $label;

		return $this;
	}

	/**
	 * Get label
	 *
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}

	/**
	 * Set slug
	 *
	 * @param string $slug
	 * @return MenuItem
	 */
	public function setSlug($slug) {
		$this->slug = $slug;

		return $this;
	}

	/**
	 * Get slug
	 *
	 * @return string
	 */
	public function getSlug() {
		return $this->slug;
	}

	public function __toString() {
		return $this->label;
	}


	/**
	 * @ORM\ManyToOne(targetEntity="Country", inversedBy="communes", cascade={"persist"})
	 * @ORM\JoinColumn(name="departement_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
	 */
	protected $departement;

	/**
	 * Set departement
	 *
	 * @param \Nkg\ContactBundle\Entity\Country $departement
	 * @return Game
	 */
	public function setCountry(\Nkg\ContactBundle\Entity\Country $departement = null) {
		$this->departement = $departement;

		return $this;
	}

	/**
	 * Get departement
	 *
	 * @return \Nkg\ContactBundle\Entity\Country
	 */
	public function getCountry() {
		return $this->departement;
	}

	public function __toArray()
	{
		$array = array();

		$array['id']  = $this->id;
		$array['label']  = $this->label;
		$array['slug']  = $this->slug;
		$array['active']  = $this->active;
		$array['departement']  = $this->departement;

		return $array;
	}

}

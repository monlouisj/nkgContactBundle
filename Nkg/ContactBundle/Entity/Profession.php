<?php


namespace Nkg\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profession
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nkg\ContactBundle\Entity\ProfessionRepository")
 */
class Profession {

	/**
	 * @var integer
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @ORM\Column(name="label", type="string", length=64)
	 */
	protected $label;

	/**
	 * @ORM\Column(name="active", type="boolean")
	 */
	protected $active = true;

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
	 * Get id
	 *
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	public function __toString() {
		return $this->label;
	}

}

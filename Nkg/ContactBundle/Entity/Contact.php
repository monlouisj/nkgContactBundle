<?php
namespace Nkg\ContactBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Nkg\ContactBundle\Entity\ContactRepository")
 * @UniqueEntity(fields="email", message="Cette adresse email a déja été enregistrée", groups={"registration"})
 * @UniqueEntity(fields="phone", message="Ce numéro de téléphone a déja été enregistré", groups={"registration"})
 */
class Contact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @var string
     * @Assert\Length(
		 *      min = "2",
		 *      max = "50",
		 *      minMessage = "Votre prénom doit faire au moins {{ limit }} caractères",
		 *      maxMessage = "Votre prénom ne peut pas être plus long que {{ limit }} caractères"
		 * )
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     * @Assert\Length(
		 *      min = "2",
		 *      max = "50",
		 *      minMessage = "Votre nom doit faire au moins {{ limit }} caractères",
		 *      maxMessage = "Votre nom ne peut pas être plus long que {{ limit }} caractères"
		 * )
     * @ORM\Column(name="lastname", type="string", length=255)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\Email(
		 *     message = "'{{ value }}' n'est pas un email valide.",
		 *     checkMX = false
		 * )
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_uid", type="string", length=255, nullable=true)
     */
    private $facebookUid;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook_name", type="string", length=255, nullable=true)
     */
    private $facebookName;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_uid", type="string", length=255, nullable=true)
     */
    private $twitterUid;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter_name", type="string", length=255, nullable=true)
     */
    private $twitterName;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=20, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=20, nullable=true)
     */
    private $mobile;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gender", type="boolean", nullable=true)
     * @Assert\NotNull()
     */
    private $gender;

    /**
     * @var boolean
     *
     * @ORM\Column(name="optin", type="boolean", nullable=true)
     */
    private $optin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="optinpartenr", type="boolean", nullable=true)
     */
    private $optinpartenr;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateofbirth", type="datetime", nullable=true)
     * @Assert\Date()
     */
    private $dateofbirth;

    /**
     * @var \DateTime
     * @ORM\Column(name="createdat", type="datetime", nullable=true)
     */
    private $createdat;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", nullable=true)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="sponsor", type="integer", nullable=true)
     */

     /**
 		 * @ORM\ManyToOne(targetEntity="Contact")
 		 * @ORM\JoinColumn(name="sponsor_id", referencedColumnName="id", nullable=true)
 		 */
     private $sponsor;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255, nullable=true)
     */
    private $localisation;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="participations", type="integer", nullable=true)
     */
    private $participations;

    /**
     * @var boolean
     *
     * @ORM\Column(name="succes", type="boolean", nullable=true)
     */
    private $succes;

    /**
		 * @ORM\ManyToOne(targetEntity="Nkg\ContactBundle\Entity\Profession", cascade={"persist"})
		 * @ORM\JoinColumn(name="profession_id", referencedColumnName="id", nullable=true)
		 * @Assert\NotNull()
		 */
		protected $profession;

    /**
		 * @ORM\ManyToMany(targetEntity="Nkg\ContactBundle\Entity\Interest", cascade={"persist"})
		 */
		private $interests;

    public function __construct() {
			$this->interests = new ArrayCollection();
		}

    public function __toString() {
			return $this->firstname . " " . $this->lastname;
		}

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return Contact
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return Contact
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set facebookUid
     *
     * @param string $facebookUid
     * @return Contact
     */
    public function setFacebookUid($facebookUid)
    {
        $this->facebookUid = $facebookUid;

        return $this;
    }

    /**
     * Get facebookUid
     *
     * @return string
     */
    public function getFacebookUid()
    {
        return $this->facebookUid;
    }

    /**
     * Set facebookName
     *
     * @param string $facebookName
     * @return Contact
     */
    public function setFacebookName($facebookName)
    {
        $this->facebookName = $facebookName;

        return $this;
    }

    /**
     * Get facebookName
     *
     * @return string
     */
    public function getFacebookName()
    {
        return $this->facebookName;
    }

    /**
     * Set twitterUid
     *
     * @param string $twitterUid
     * @return Contact
     */
    public function setTwitterUid($twitterUid)
    {
        $this->twitterUid = $twitterUid;

        return $this;
    }

    /**
     * Get twitterUid
     *
     * @return string
     */
    public function getTwitterUid()
    {
        return $this->twitterUid;
    }

    /**
     * Set twitterName
     *
     * @param string $twitterName
     * @return Contact
     */
    public function setTwitterName($twitterName)
    {
        $this->twitterName = $twitterName;

        return $this;
    }

    /**
     * Get twitterName
     *
     * @return string
     */
    public function getTwitterName()
    {
        return $this->twitterName;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Contact
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return Contact
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return string
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set gender
     *
     * @param boolean $gender
     * @return Contact
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     * @return boolean
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set optin
     *
     * @param boolean $optin
     * @return Contact
     */
    public function setOptin($optin)
    {
        $this->optin = $optin;

        return $this;
    }

    /**
     * Get optin
     *
     * @return boolean
     */
    public function getOptin()
    {
        return $this->optin;
    }

    /**
     * Set optinpartenr
     *
     * @param boolean $optinpartenr
     * @return Contact
     */
    public function setOptinpartenr($optinpartenr)
    {
        $this->optinpartenr = $optinpartenr;

        return $this;
    }

    /**
     * Get optinpartenr
     *
     * @return boolean
     */
    public function getOptinpartenr()
    {
        return $this->optinpartenr;
    }

    /**
     * Set dateofbirth
     *
     * @param \DateTime $dateofbirth
     * @return Contact
     */
    public function setDateofbirth($dateofbirth)
    {
        $this->dateofbirth = $dateofbirth;

        return $this;
    }

    /**
     * Get dateofbirth
     *
     * @return \DateTime
     */
    public function getDateofbirth()
    {
        return $this->dateofbirth;
    }

    /**
     * Set createdat
     *
     * @param \DateTime $createdat
     * @return Contact
     */
    public function setCreatedat($createdat)
    {
        $this->createdat = $createdat;

        return $this;
    }

    /**
     * Get createdat
     *
     * @return \DateTime
     */
    public function getCreatedat()
    {
        return $this->createdat;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Contact
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     * @return Contact
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Contact
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set participations
     *
     * @param integer $participations
     * @return Contact
     */
    public function setParticipations($participations)
    {
        $this->participations = $participations;

        return $this;
    }

    /**
     * Get participations
     *
     * @return integer
     */
    public function getParticipations()
    {
        return $this->participations;
    }

    /**
     * Set succes
     *
     * @param boolean $succes
     * @return Contact
     */
    public function setSucces($succes)
    {
        $this->succes = $succes;

        return $this;
    }

    /**
     * Get succes
     *
     * @return boolean
     */
    public function getSucces()
    {
        return $this->succes;
    }

    /**
     * Set sponsor
     *
     * @param \Nkg\ContactBundle\Entity\Contact $sponsor
     * @return Contact
     */
    public function setSponsor(\Nkg\ContactBundle\Entity\Contact $sponsor = null)
    {
        $this->sponsor = $sponsor;

        return $this;
    }

    /**
     * Get sponsor
     *
     * @return \Nkg\ContactBundle\Entity\Contact
     */
    public function getSponsor()
    {
        return $this->sponsor;
    }

    /**
     * Set profession
     *
     * @param \Nkg\ContactBundle\Entity\Profession $profession
     * @return Contact
     */
    public function setProfession(\Nkg\ContactBundle\Entity\Profession $profession)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return \Nkg\ContactBundle\Entity\Profession
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Add interests
     *
     * @param \Nkg\ContactBundle\Entity\Interest $interests
     * @return Contact
     */
    public function addInterest(\Nkg\ContactBundle\Entity\Interest $interests)
    {
        $this->interests[] = $interests;

        return $this;
    }

    /**
     * Remove interests
     *
     * @param \Nkg\ContactBundle\Entity\Interest $interests
     */
    public function removeInterest(\Nkg\ContactBundle\Entity\Interest $interests)
    {
        $this->interests->removeElement($interests);
    }

    /**
     * Get interests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInterests()
    {
        return $this->interests;
    }
}

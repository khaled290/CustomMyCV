<?php

namespace ResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints\Collection;


/**
 * Resume
 *
 * @ORM\Table(name="resume")
 * @ORM\Entity(repositoryClass="ResumeBundle\Repository\ResumeRepository")
 */
class Resume
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string")
     * @Assert\NotBlank()
     *
     */

    private $titre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     *
     */

    private $dateCreation;


    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     *
     */

    private $description;


    /**
     * @var Education
     *
     * @ORM\OneToMany(targetEntity="Education", mappedBy="educations")
     */
    protected $educations;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->educations = new ArrayCollection();
        $this->date = new \DateTime();

    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Resume
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     *
     * @return Resume
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Resume
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


    public function __toString()
    {
        return $this->titre;
    }













    /**
     * Add education
     *
     * @param \ResumeBundle\Entity\Education $education
     *
     * @return Resume
     */
    public function addEducation(\ResumeBundle\Entity\Education $education)
    {
        $this->educations[] = $education;

        return $this;
    }

    /**
     * Remove education
     *
     * @param \ResumeBundle\Entity\Education $education
     */
    public function removeEducation(\ResumeBundle\Entity\Education $education)
    {
        $this->educations->removeElement($education);
    }

    /**
     * Get educations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEducations()
    {
        return $this->educations;
    }
}

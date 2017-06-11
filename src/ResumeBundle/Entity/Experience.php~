<?php

namespace ResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="ResumeBundle\Repository\ExperienceRepository")
 */
class Experience
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
     * @ORM\Column(name="nom_poste", type="string", nullable=false)
     * @Assert\NotBlank()
     *
     */

    private $nomPoste;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="date")
     * @Assert\NotBlank()
     * @Assert\Date()
     *
     */

    private $dateDebut;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fin", type="date")
     * @Assert\Date()
     *
     */

    private $dateFin;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string")
     * @Assert\NotBlank()
     *
     */

    private $lieu;

    /**
     * @var string
     *
     * @ORM\Column(name="entreprise", type="string")
     * @Assert\NotBlank()
     *
     */

    private $entreprise;

    /**
     * @var text
     *
     * @ORM\Column(name="missions", type="text")
     *
     */

    private $missions;


    /**
     * @ORM\ManyToOne(targetEntity="Resume")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    private $resume;





    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomPoste
     *
     * @param string $nomPoste
     *
     * @return Experience
     */
    public function setNomPoste($nomPoste)
    {
        $this->nomPoste = $nomPoste;

        return $this;
    }

    /**
     * Get nomPoste
     *
     * @return string
     */
    public function getNomPoste()
    {
        return $this->nomPoste;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Experience
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     *
     * @return Experience
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Experience
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     *
     * @return Experience
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set missions
     *
     * @param string $missions
     *
     * @return Experience
     */
    public function setMissions($missions)
    {
        $this->missions = $missions;

        return $this;
    }

    /**
     * Get missions
     *
     * @return string
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * Set resume
     *
     * @param \ResumeBundle\Entity\Resume $resume
     *
     * @return Experience
     */
    public function setResume(\ResumeBundle\Entity\Resume $resume = null)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume
     *
     * @return \ResumeBundle\Entity\Resume
     */
    public function getResume()
    {
        return $this->resume;
    }

    public function __toString()
    {
        return (string) $this->getResume();
    }
}

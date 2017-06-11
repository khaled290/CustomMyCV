<?php

namespace ResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Skill
 *
 * @ORM\Table(name="skill")
 * @ORM\Entity(repositoryClass="ResumeBundle\Repository\SkillRepository")
 */
class Skill
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
     * @ORM\Column(name="categorie", type="string", nullable=false)
     * @Assert\NotBlank()
     *
     */

    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string")
     * @Assert\NotBlank()
     *
     */

    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string")
     * @Assert\NotBlank()
     *
     */

    private $niveau;

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
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Skill
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Skill
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Skill
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set resume
     *
     * @param \ResumeBundle\Entity\Resume $resume
     *
     * @return Skill
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

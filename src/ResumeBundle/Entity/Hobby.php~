<?php

namespace ResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Hobby
 *
 * @ORM\Table(name="hobby")
 * @ORM\Entity(repositoryClass="ResumeBundle\Repository\HobbyRepository")
 */
class Hobby
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
     * @ORM\Column(name="libelle", type="string", nullable=false)
     * @Assert\NotBlank()
     *
     */

    private $libelle;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Hobby
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
     * Set resume
     *
     * @param \ResumeBundle\Entity\Resume $resume
     *
     * @return Hobby
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

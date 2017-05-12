<?php

namespace ResumeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDetails
 *
 * @ORM\Table(name="user_details")
 * @ORM\Entity(repositoryClass="ResumeBundle\Repository\UserDetailsRepository")
 */
class UserDetails
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
     * @ORM\Column(name="nom", type="string")
     *
     */

    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string")
     *
     */

    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string")
     *
     */

    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer")
     *
     */

    private $code_postal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string")
     *
     */

    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="pays", type="string")
     *
     */

    private $pays;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string")
     *
     */

    private $email;



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
     * Set nom
     *
     * @param string $nom
     *
     * @return UserDetails
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return UserDetails
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return UserDetails
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set codePostal
     *
     * @param integer $codePostal
     *
     * @return UserDetails
     */
    public function setCodePostal($codePostal)
    {
        $this->code_postal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer
     */
    public function getCodePostal()
    {
        return $this->code_postal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return UserDetails
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return UserDetails
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return UserDetails
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
}

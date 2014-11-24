<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteUtilisateur
 *
 * @ORM\Table(name="securite_utilisateur", indexes={@ORM\Index(name="FK_SECURITE_UTILISATEUR_SECURI", columns={"CODENIVEHIER"}), @ORM\Index(name="FK_SECURITE_UTILISATEUR_SECURITE_PROFIL", columns={"CodeProf", "CODEGROUUTIL"})})
 * @ORM\Entity
 */
class SecuriteUtilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODEUTIL", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeutil;

    /**
     * @var string
     *
     * @ORM\Column(name="MOTPASSUTIL", type="string", length=250, nullable=false)
     */
    private $motpassutil;

    /**
     * @var string
     *
     * @ORM\Column(name="MATR", type="string", length=100, nullable=false)
     */
    private $matr;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMPRENUTIL", type="string", length=100, nullable=false)
     */
    private $nomprenutil;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeProf", type="string", length=50, nullable=false)
     */
    private $codeprof;

    /**
     * @var string
     *
     * @ORM\Column(name="CODEGROUUTIL", type="string", length=100, nullable=false)
     */
    private $codegrouutil;

    /**
     * @var string
     *
     * @ORM\Column(name="CODENIVEHIER", type="string", length=100, nullable=false)
     */
    private $codenivehier;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEMAJ", type="datetime", nullable=true)
     */
    private $datemaj;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=true)
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=true)
     */
    private $codetypeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCircRegi", type="string", length=50, nullable=true)
     */
    private $codecircregi;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeDele", type="string", length=50, nullable=true)
     */
    private $codedele;



    /**
     * Get codeutil
     *
     * @return string 
     */
    public function getCodeutil()
    {
        return $this->codeutil;
    }

    /**
     * Set motpassutil
     *
     * @param string $motpassutil
     * @return SecuriteUtilisateur
     */
    public function setMotpassutil($motpassutil)
    {
        $this->motpassutil = $motpassutil;

        return $this;
    }

    /**
     * Get motpassutil
     *
     * @return string 
     */
    public function getMotpassutil()
    {
        return $this->motpassutil;
    }

    /**
     * Set matr
     *
     * @param string $matr
     * @return SecuriteUtilisateur
     */
    public function setMatr($matr)
    {
        $this->matr = $matr;

        return $this;
    }

    /**
     * Get matr
     *
     * @return string 
     */
    public function getMatr()
    {
        return $this->matr;
    }

    /**
     * Set nomprenutil
     *
     * @param string $nomprenutil
     * @return SecuriteUtilisateur
     */
    public function setNomprenutil($nomprenutil)
    {
        $this->nomprenutil = $nomprenutil;

        return $this;
    }

    /**
     * Get nomprenutil
     *
     * @return string 
     */
    public function getNomprenutil()
    {
        return $this->nomprenutil;
    }

    /**
     * Set codeprof
     *
     * @param string $codeprof
     * @return SecuriteUtilisateur
     */
    public function setCodeprof($codeprof)
    {
        $this->codeprof = $codeprof;

        return $this;
    }

    /**
     * Get codeprof
     *
     * @return string 
     */
    public function getCodeprof()
    {
        return $this->codeprof;
    }

    /**
     * Set codegrouutil
     *
     * @param string $codegrouutil
     * @return SecuriteUtilisateur
     */
    public function setCodegrouutil($codegrouutil)
    {
        $this->codegrouutil = $codegrouutil;

        return $this;
    }

    /**
     * Get codegrouutil
     *
     * @return string 
     */
    public function getCodegrouutil()
    {
        return $this->codegrouutil;
    }

    /**
     * Set codenivehier
     *
     * @param string $codenivehier
     * @return SecuriteUtilisateur
     */
    public function setCodenivehier($codenivehier)
    {
        $this->codenivehier = $codenivehier;

        return $this;
    }

    /**
     * Get codenivehier
     *
     * @return string 
     */
    public function getCodenivehier()
    {
        return $this->codenivehier;
    }

    /**
     * Set datemaj
     *
     * @param \DateTime $datemaj
     * @return SecuriteUtilisateur
     */
    public function setDatemaj($datemaj)
    {
        $this->datemaj = $datemaj;

        return $this;
    }

    /**
     * Get datemaj
     *
     * @return \DateTime 
     */
    public function getDatemaj()
    {
        return $this->datemaj;
    }

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return SecuriteUtilisateur
     */
    public function setCodeetab($codeetab)
    {
        $this->codeetab = $codeetab;

        return $this;
    }

    /**
     * Get codeetab
     *
     * @return string 
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * Set codetypeetab
     *
     * @param string $codetypeetab
     * @return SecuriteUtilisateur
     */
    public function setCodetypeetab($codetypeetab)
    {
        $this->codetypeetab = $codetypeetab;

        return $this;
    }

    /**
     * Get codetypeetab
     *
     * @return string 
     */
    public function getCodetypeetab()
    {
        return $this->codetypeetab;
    }

    /**
     * Set codecircregi
     *
     * @param string $codecircregi
     * @return SecuriteUtilisateur
     */
    public function setCodecircregi($codecircregi)
    {
        $this->codecircregi = $codecircregi;

        return $this;
    }

    /**
     * Get codecircregi
     *
     * @return string 
     */
    public function getCodecircregi()
    {
        return $this->codecircregi;
    }

    /**
     * Set codedele
     *
     * @param string $codedele
     * @return SecuriteUtilisateur
     */
    public function setCodedele($codedele)
    {
        $this->codedele = $codedele;

        return $this;
    }

    /**
     * Get codedele
     *
     * @return string 
     */
    public function getCodedele()
    {
        return $this->codedele;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteProfil
 *
 * @ORM\Table(name="securite_profil", indexes={@ORM\Index(name="FK_SECURITE_PROFIL_SECURITE_GROUPEUTILISATEUR", columns={"CODEGROUUTIL"})})
 * @ORM\Entity
 */
class SecuriteProfil
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeProf", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeprof;

    /**
     * @var string
     *
     * @ORM\Column(name="CODEGROUUTIL", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codegrouutil;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeProfFR", type="string", length=250, nullable=true)
     */
    private $libeproffr;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeProfAr", type="string", length=250, nullable=true)
     */
    private $libeprofar;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="string", length=500, nullable=true)
     */
    private $obse;



    /**
     * Set codeprof
     *
     * @param string $codeprof
     * @return SecuriteProfil
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
     * @return SecuriteProfil
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
     * Set libeproffr
     *
     * @param string $libeproffr
     * @return SecuriteProfil
     */
    public function setLibeproffr($libeproffr)
    {
        $this->libeproffr = $libeproffr;

        return $this;
    }

    /**
     * Get libeproffr
     *
     * @return string 
     */
    public function getLibeproffr()
    {
        return $this->libeproffr;
    }

    /**
     * Set libeprofar
     *
     * @param string $libeprofar
     * @return SecuriteProfil
     */
    public function setLibeprofar($libeprofar)
    {
        $this->libeprofar = $libeprofar;

        return $this;
    }

    /**
     * Get libeprofar
     *
     * @return string 
     */
    public function getLibeprofar()
    {
        return $this->libeprofar;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return SecuriteProfil
     */
    public function setObse($obse)
    {
        $this->obse = $obse;

        return $this;
    }

    /**
     * Get obse
     *
     * @return string 
     */
    public function getObse()
    {
        return $this->obse;
    }
}

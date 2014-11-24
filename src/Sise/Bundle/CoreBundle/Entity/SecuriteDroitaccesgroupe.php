<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteDroitaccesgroupe
 *
 * @ORM\Table(name="securite_droitaccesgroupe", indexes={@ORM\Index(name="FK_SECURITE_DROITACCESGROUPE_S", columns={"CODEENTI"})})
 * @ORM\Entity
 */
class SecuriteDroitaccesgroupe
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
     * @ORM\Column(name="CODEENTI", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeenti;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROISELE", type="smallint", nullable=false)
     */
    private $droisele;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIINSE", type="smallint", nullable=false)
     */
    private $droiinse;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIUPDA", type="smallint", nullable=false)
     */
    private $droiupda;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIDELE", type="smallint", nullable=false)
     */
    private $droidele;



    /**
     * Set codeprof
     *
     * @param string $codeprof
     * @return SecuriteDroitaccesgroupe
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
     * @return SecuriteDroitaccesgroupe
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
     * Set codeenti
     *
     * @param string $codeenti
     * @return SecuriteDroitaccesgroupe
     */
    public function setCodeenti($codeenti)
    {
        $this->codeenti = $codeenti;

        return $this;
    }

    /**
     * Get codeenti
     *
     * @return string 
     */
    public function getCodeenti()
    {
        return $this->codeenti;
    }

    /**
     * Set droisele
     *
     * @param integer $droisele
     * @return SecuriteDroitaccesgroupe
     */
    public function setDroisele($droisele)
    {
        $this->droisele = $droisele;

        return $this;
    }

    /**
     * Get droisele
     *
     * @return integer 
     */
    public function getDroisele()
    {
        return $this->droisele;
    }

    /**
     * Set droiinse
     *
     * @param integer $droiinse
     * @return SecuriteDroitaccesgroupe
     */
    public function setDroiinse($droiinse)
    {
        $this->droiinse = $droiinse;

        return $this;
    }

    /**
     * Get droiinse
     *
     * @return integer 
     */
    public function getDroiinse()
    {
        return $this->droiinse;
    }

    /**
     * Set droiupda
     *
     * @param integer $droiupda
     * @return SecuriteDroitaccesgroupe
     */
    public function setDroiupda($droiupda)
    {
        $this->droiupda = $droiupda;

        return $this;
    }

    /**
     * Get droiupda
     *
     * @return integer 
     */
    public function getDroiupda()
    {
        return $this->droiupda;
    }

    /**
     * Set droidele
     *
     * @param integer $droidele
     * @return SecuriteDroitaccesgroupe
     */
    public function setDroidele($droidele)
    {
        $this->droidele = $droidele;

        return $this;
    }

    /**
     * Get droidele
     *
     * @return integer 
     */
    public function getDroidele()
    {
        return $this->droidele;
    }
}

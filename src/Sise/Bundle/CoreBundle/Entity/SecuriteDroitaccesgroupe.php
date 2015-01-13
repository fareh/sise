<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteDroitaccesgroupe
 *
 * @ORM\Table(name="securite_droitaccesgroupe", indexes={@ORM\Index(name="FK_SECURITE_DROITACCESGROUPE_S", columns={"CODEENTI"})})
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\SecuriteDroitaccesgroupeRepository")
 */
class SecuriteDroitaccesgroupe
{

    /**
     * @var SecuriteProfil
     * @ORM\ManyToOne(targetEntity="SecuriteProfil", inversedBy="droitaccesgroupe")
     * @ORM\JoinColumn(name="CodeProf", referencedColumnName="CodeProf")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * */
    protected $codeprof;



    /**
     * @var SecuriteEntite
     * @ORM\ManyToOne(targetEntity="SecuriteEntite", inversedBy="droitaccesgroupe")
     * @ORM\JoinColumn(name="CODEENTI", referencedColumnName="CODEENTI")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * */
    protected $codeenti;



    /**
     * @var integer
     *
     * @ORM\Column(name="DROISELE", type="boolean",options={"default":0})
     */
    private $droisele;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIINSE", type="boolean",options={"default":0})
     */
    private $droiinse;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIUPDA", type="boolean",options={"default":0})
     */
    private $droiupda;

    /**
     * @var integer
     *
     * @ORM\Column(name="DROIDELE", type="boolean",options={"default":0})
     */
    private $droidele;

    function __construct($codeenti = null, $codeprof=null)
    {
        $this->codeenti = $codeenti;
        $this->codeprof = $codeprof;
    }

    public function __toString(){

        return ($this->getCodeenti() && $this->getCodeenti()->getCodepack())? $this->getCodeenti()->getCodepack()->getLibepackar().' '.$this->getCodeenti()->getLibeentiar():"";
    }

    /**
     * Set droisele
     *
     * @param boolean $droisele
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
     * @return boolean 
     */
    public function getDroisele()
    {
        return $this->droisele;
    }

    /**
     * Set droiinse
     *
     * @param boolean $droiinse
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
     * @return boolean 
     */
    public function getDroiinse()
    {
        return $this->droiinse;
    }

    /**
     * Set droiupda
     *
     * @param boolean $droiupda
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
     * @return boolean 
     */
    public function getDroiupda()
    {
        return $this->droiupda;
    }

    /**
     * Set droidele
     *
     * @param boolean $droidele
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
     * @return boolean 
     */
    public function getDroidele()
    {
        return $this->droidele;
    }

    /**
     * Set codeprof
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof
     * @return SecuriteDroitaccesgroupe
     */
    public function setCodeprof(\Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof)
    {
        $this->codeprof = $codeprof;

        return $this;
    }

    /**
     * Get codeprof
     *
     * @return \Sise\Bundle\CoreBundle\Entity\SecuriteProfil 
     */
    public function getCodeprof()
    {
        return $this->codeprof;
    }

    /**
     * Set codeenti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteEntite $codeenti
     * @return SecuriteDroitaccesgroupe
     */
    public function setCodeenti(\Sise\Bundle\CoreBundle\Entity\SecuriteEntite $codeenti)
    {
        $this->codeenti = $codeenti;

        return $this;
    }

    /**
     * Get codeenti
     *
     * @return \Sise\Bundle\CoreBundle\Entity\SecuriteEntite 
     */
    public function getCodeenti()
    {
        return $this->codeenti;
    }
}

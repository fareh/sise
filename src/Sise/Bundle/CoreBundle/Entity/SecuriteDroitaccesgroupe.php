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
     * @ORM\Id
     * @ORM\Column(name="droitaccesgroupe", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @var integer $id
     */
    protected $id;

    /**
     * @var SecuriteProfil
     * @ORM\ManyToOne(targetEntity="SecuriteProfil", inversedBy="droitaccesgroupe")
     * @ORM\JoinColumn(name="CodeProf", referencedColumnName="CodeProf")
     * */
    protected $codeprof;



    /**
     * @var SecuriteEntite
     * @ORM\ManyToOne(targetEntity="SecuriteEntite", inversedBy="droitaccesgroupe")
     * @ORM\JoinColumn(name="CODEENTI", referencedColumnName="CODEENTI")
     * */
    protected $codeenti;



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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
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

    /**
     * Set codeprof
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof
     * @return SecuriteDroitaccesgroupe
     */
    public function setCodeprof(\Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof = null)
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
    public function setCodeenti(\Sise\Bundle\CoreBundle\Entity\SecuriteEntite $codeenti = null)
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

    public function __toString(){

        return ($this->getCodeenti()->getLibeentiar())?$this->getCodeenti()->getLibeentiar():"";
    }
}

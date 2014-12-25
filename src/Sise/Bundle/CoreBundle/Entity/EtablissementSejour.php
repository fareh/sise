<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;
/**
 * EtablissementSejour
 *
 * @ORM\Table(name="etablissement_sejour")
 * @ORM\Entity
 */
class EtablissementSejour
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeetab;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneScol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderece;

  /**
     * @var boolean
     *
     * @ORM\Column(name="ElevEtab", type="boolean", nullable=true)
     * @ORM\Id
     */
    private $elevetab;

 /**
     * @var boolean
     *
     * @ORM\Column(name="PensComp", type="boolean", nullable=true)
     * @ORM\Id
     */
    private $penscomp;

   
    /**
     * @var integer
     *
     * @ORM\Column(name="NumeSequ", type="integer", nullable=true)
     * @ORM\Id
     */
    private $numesequ;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtabSejo", type="string", length=50, nullable=false)
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeetabsejo;

    /**
     * @return string
     */
    public function getCodeetabsejo()
    {
        return $this->codeetabsejo;
    }

    /**
     * @param string $codeetabsejo
     */
    public function setCodeetabsejo($codeetabsejo)
    {
        $this->codeetabsejo = $codeetabsejo;
    }

   /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMasc", type="integer", nullable=true)
     */
    private $nombelevmasc;

  /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemi", type="integer", nullable=true)
     */
    private $nombelevfemi;

    public function __toString()
    {
        if(is_null($this->codeetab)) {
            return 'NULL';
        }
        return $this->codeetab;
    }

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EtablissementSejour
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
     * @return EtablissementSejour
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
     * Set annescol
     *
     * @param integer $annescol
     * @return EtablissementSejour
     */
    public function setAnnescol($annescol)
    {
        $this->annescol = $annescol;

        return $this;
    }

    /**
     * Get annescol
     *
     * @return integer 
     */
    public function getAnnescol()
    {
        return $this->annescol;
    }

    /**
     * Set coderece
     *
     * @param string $coderece
     * @return EtablissementSejour
     */
    public function setCoderece($coderece)
    {
        $this->coderece = $coderece;

        return $this;
    }

    /**
     * Get coderece
     *
     * @return string 
     */
    public function getCoderece()
    {
        return $this->coderece;
    }

    /**
     * Set elevetab
     *
     * @param boolean $elevetab
     * @return EtablissementSejour
     */
    public function setElevetab($elevetab)
    {
        $this->elevetab = $elevetab;

        return $this;
    }

    /**
     * Get elevetab
     *
     * @return boolean 
     */
    public function getElevetab()
    {
        return $this->elevetab;
    }

    /**
     * Set penscomp
     *
     * @param boolean $penscomp
     * @return EtablissementSejour
     */
    public function setPenscomp($penscomp)
    {
        $this->penscomp = $penscomp;

        return $this;
    }

    /**
     * Get penscomp
     *
     * @return boolean 
     */
    public function getPenscomp()
    {
        return $this->penscomp;
    }

    /**
     * Set numesequ
     *
     * @param integer $numesequ
     * @return EtablissementSejour
     */
    public function setNumesequ($numesequ)
    {
        $this->numesequ = $numesequ;

        return $this;
    }

    /**
     * Get numesequ
     *
     * @return integer 
     */
    public function getNumesequ()
    {
        return $this->numesequ;
    }

    /**
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return EtablissementSejour
     */
    public function setNombelevmasc($nombelevmasc)
    {
        $this->nombelevmasc = $nombelevmasc;

        return $this;
    }

    /**
     * Get nombelevmasc
     *
     * @return integer 
     */
    public function getNombelevmasc()
    {
        return $this->nombelevmasc;
    }

    /**
     * Set nombelevfemi
     *
     * @param integer $nombelevfemi
     * @return EtablissementSejour
     */
    public function setNombelevfemi($nombelevfemi)
    {
        $this->nombelevfemi = $nombelevfemi;

        return $this;
    }

    /**
     * Get nombelevfemi
     *
     * @return integer 
     */
    public function getNombelevfemi()
    {
        return $this->nombelevfemi;
    }
    /**
     * @var \EtablissementFicheetablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="EtablissementFicheetablissement",inversedBy="sejo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab"),
     *   @ORM\JoinColumn(name="AnneScol", referencedColumnName="AnneScol"),
     *   @ORM\JoinColumn(name="CodeRece", referencedColumnName="CodeRece"),
     * })
     */
    private $fichetabsejo;

    /**
     * @return \EtablissementFicheetablissement
     */
    public function getFichetabsejo()
    {
        return $this->fichetabsejo;
    }

    /**
     * @param \EtablissementFicheetablissement $fichetabsejo
     */
    public function setFichetabsejo($fichetabsejo)
    {
        $this->fichetabsejo = $fichetabsejo;
    }
}

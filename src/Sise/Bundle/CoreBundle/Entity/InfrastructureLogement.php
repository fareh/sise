<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfrastructureLogement
 *
 * @ORM\Table(name="infrastructure_logement", indexes={@ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_ProprieteBatiment", columns={"CodePropBati"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_SituationCompteurEauEl28", columns={"CodeSituCompEau"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_SituationCompteurEauEl29", columns={"CodeSituCompElec"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_StatusHabitant", columns={"CodeStatHabi"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_TypeLogement", columns={"CodeTypeLoge"})})
 * @ORM\Entity
 */
class InfrastructureLogement
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
     * @var integer
     *
     * @ORM\Column(name="NumeLoge", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeloge;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeLoge", type="string", length=50, nullable=false)
     */
    private $codetypeloge;

    /**
     * @var float
     *
     * @ORM\Column(name="SurfCouv", type="float", precision=10, scale=0, nullable=true)
     */
    private $surfcouv;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePropBati", type="string", length=50, nullable=false)
     */
    private $codepropbati;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="text", nullable=true)
     */
    private $obse;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenHabi", type="string", length=200, nullable=true)
     */
    private $nomprenhabi;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeStatHabi", type="string", length=50, nullable=false)
     */
    private $codestathabi;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeSituCompEau", type="string", length=50, nullable=false)
     */
    private $codesitucompeau;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeSituCompElec", type="string", length=50, nullable=false)
     */
    private $codesitucompelec;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return InfrastructureLogement
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
     * @return InfrastructureLogement
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
     * @return InfrastructureLogement
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
     * @return InfrastructureLogement
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
     * Set numeloge
     *
     * @param integer $numeloge
     * @return InfrastructureLogement
     */
    public function setNumeloge($numeloge)
    {
        $this->numeloge = $numeloge;

        return $this;
    }

    /**
     * Get numeloge
     *
     * @return integer 
     */
    public function getNumeloge()
    {
        return $this->numeloge;
    }

    /**
     * Set codetypeloge
     *
     * @param string $codetypeloge
     * @return InfrastructureLogement
     */
    public function setCodetypeloge($codetypeloge)
    {
        $this->codetypeloge = $codetypeloge;

        return $this;
    }

    /**
     * Get codetypeloge
     *
     * @return string 
     */
    public function getCodetypeloge()
    {
        return $this->codetypeloge;
    }

    /**
     * Set surfcouv
     *
     * @param float $surfcouv
     * @return InfrastructureLogement
     */
    public function setSurfcouv($surfcouv)
    {
        $this->surfcouv = $surfcouv;

        return $this;
    }

    /**
     * Get surfcouv
     *
     * @return float 
     */
    public function getSurfcouv()
    {
        return $this->surfcouv;
    }

    /**
     * Set codepropbati
     *
     * @param string $codepropbati
     * @return InfrastructureLogement
     */
    public function setCodepropbati($codepropbati)
    {
        $this->codepropbati = $codepropbati;

        return $this;
    }

    /**
     * Get codepropbati
     *
     * @return string 
     */
    public function getCodepropbati()
    {
        return $this->codepropbati;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return InfrastructureLogement
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

    /**
     * Set nomprenhabi
     *
     * @param string $nomprenhabi
     * @return InfrastructureLogement
     */
    public function setNomprenhabi($nomprenhabi)
    {
        $this->nomprenhabi = $nomprenhabi;

        return $this;
    }

    /**
     * Get nomprenhabi
     *
     * @return string 
     */
    public function getNomprenhabi()
    {
        return $this->nomprenhabi;
    }

    /**
     * Set codestathabi
     *
     * @param string $codestathabi
     * @return InfrastructureLogement
     */
    public function setCodestathabi($codestathabi)
    {
        $this->codestathabi = $codestathabi;

        return $this;
    }

    /**
     * Get codestathabi
     *
     * @return string 
     */
    public function getCodestathabi()
    {
        return $this->codestathabi;
    }

    /**
     * Set codesitucompeau
     *
     * @param string $codesitucompeau
     * @return InfrastructureLogement
     */
    public function setCodesitucompeau($codesitucompeau)
    {
        $this->codesitucompeau = $codesitucompeau;

        return $this;
    }

    /**
     * Get codesitucompeau
     *
     * @return string 
     */
    public function getCodesitucompeau()
    {
        return $this->codesitucompeau;
    }

    /**
     * Set codesitucompelec
     *
     * @param string $codesitucompelec
     * @return InfrastructureLogement
     */
    public function setCodesitucompelec($codesitucompelec)
    {
        $this->codesitucompelec = $codesitucompelec;

        return $this;
    }

    /**
     * Get codesitucompelec
     *
     * @return string 
     */
    public function getCodesitucompelec()
    {
        return $this->codesitucompelec;
    }
}

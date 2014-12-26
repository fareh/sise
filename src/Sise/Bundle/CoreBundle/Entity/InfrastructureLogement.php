<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfrastructureLogement
 *
 * @ORM\Table(name="infrastructure_logement", indexes={@ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_ProprieteBatiment", columns={"CodePropBati"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_SituationCompteurEauEl28", columns={"CodeSituCompEau"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_SituationCompteurEauEl29", columns={"CodeSituCompElec"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_StatusHabitant", columns={"CodeStatHabi"}), @ORM\Index(name="FK_Infrastructure_Logement_Nomenclature_TypeLogement", columns={"CodeTypeLoge"})})
 *@ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\InfrastructureLogementRepository")
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
     * @ORM\ManyToOne(targetEntity="NomenclatureTypelogement")
     * @ORM\JoinColumn(name="CodeTypeLoge", referencedColumnName="CodeTypeLoge")
     */
    private $codetypeloge;

    /**
     * @var float
     *
     * @ORM\Column(name="SurfCouv", type="float", precision=10, scale=0, nullable=true)
     */
    private $surfcouv;

    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureProprietebatiment")
     * @ORM\JoinColumn(name="CodePropBati", referencedColumnName="CodePropBati")
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
     * @ORM\ManyToOne(targetEntity="NomenclatureStatushabitant")
     * @ORM\JoinColumn(name="CodeStatHabi", referencedColumnName="CodeStatHabi")
     */
    private $codestathabi;

    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureSituationcompteureauelectricite")
     * @ORM\JoinColumn(name="CodeSituCompEau", referencedColumnName="CodeSituComp")
     */
    private $codesitucompeau;


    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureSituationcompteureauelectricite")
     * @ORM\JoinColumn(name="CodeSituCompElec", referencedColumnName="CodeSituComp")
     */
    private $codesitucompelec;


     private $maCle ;

    /**
     * @return mixed
     */
    public function getMaCle()
    {
        return $this->codeetab."|".$this->codetypeetab."|".$this->annescol."|".$this->coderece."|".$this->numeloge;
    }


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
     * Set codetypeloge
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypelogement $codetypeloge
     * @return InfrastructureLogement
     */
    public function setCodetypeloge(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypelogement $codetypeloge = null)
    {
        $this->codetypeloge = $codetypeloge;

        return $this;
    }

    /**
     * Get codetypeloge
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureTypelogement 
     */
    public function getCodetypeloge()
    {
        return $this->codetypeloge;
    }

    /**
     * Set codepropbati
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureProprietebatiment $codepropbati
     * @return InfrastructureLogement
     */
    public function setCodepropbati(\Sise\Bundle\CoreBundle\Entity\NomenclatureProprietebatiment $codepropbati = null)
    {
        $this->codepropbati = $codepropbati;

        return $this;
    }

    /**
     * Get codepropbati
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureProprietebatiment 
     */
    public function getCodepropbati()
    {
        return $this->codepropbati;
    }

    /**
     * Set codestathabi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureStatushabitant $codestathabi
     * @return InfrastructureLogement
     */
    public function setCodestathabi(\Sise\Bundle\CoreBundle\Entity\NomenclatureStatushabitant $codestathabi = null)
    {
        $this->codestathabi = $codestathabi;

        return $this;
    }

    /**
     * Get codestathabi
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureStatushabitant 
     */
    public function getCodestathabi()
    {
        return $this->codestathabi;
    }

    /**
     * Set codesitucompeau
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureSituationcompteureauelectricite $codesitucompeau
     * @return InfrastructureLogement
     */
    public function setCodesitucompeau(\Sise\Bundle\CoreBundle\Entity\NomenclatureSituationcompteureauelectricite $codesitucompeau = null)
    {
        $this->codesitucompeau = $codesitucompeau;

        return $this;
    }

    /**
     * Get codesitucompeau
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureSituationcompteureauelectricite 
     */
    public function getCodesitucompeau()
    {
        return $this->codesitucompeau;
    }

    /**
     * Set codesitucompelec
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureSituationcompteureauelectricite $codesitucompelec
     * @return InfrastructureLogement
     */
    public function setCodesitucompelec(\Sise\Bundle\CoreBundle\Entity\NomenclatureSituationcompteureauelectricite $codesitucompelec = null)
    {
        $this->codesitucompelec = $codesitucompelec;

        return $this;
    }

    /**
     * Get codesitucompelec
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureSituationcompteureauelectricite 
     */
    public function getCodesitucompelec()
    {
        return $this->codesitucompelec;
    }
}

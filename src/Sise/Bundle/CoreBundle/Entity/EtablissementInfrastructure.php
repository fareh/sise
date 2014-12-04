<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EtablissementInfrastructure
 *
 * @ORM\Table(name="etablissement_infrastructure", indexes={@ORM\Index(name="FK_Etablissement_Infrastructure_Nomenclature_SituationReseauEl69", columns={"CodeSituElecAtel"}), @ORM\Index(name="FK_Etablissement_Infrastructure_Nomenclature_TypeCloture", columns={"CodeTypeClot"}), @ORM\Index(name="FK_Etablissement_Infrastructure_Nomenclature_TypeConnxionInter70", columns={"CodeTypeConnInte"}), @ORM\Index(name="FK_Etablissement_Infrastructure_Nomenclature_Zone", columns={"CodeZone"})})
 * @ORM\Entity
 */
class EtablissementInfrastructure
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
     * @var \NomenclatureProprietebatiment
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureProprietebatiment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodePropBati", referencedColumnName="CodePropBati")
     * })
     */
    private $codesitufonc;

    /**
     * @var float
     *
     * @ORM\Column(name="SurfTotaTerr", type="float", precision=10, scale=0, nullable=true)
     */
    private $surftotaterr;

    /**
     * @var float
     *
     * @ORM\Column(name="SurfCons", type="float", precision=10, scale=0, nullable=true)
     */
    private $surfcons;

    /**
     * @var float
     *
     * @ORM\Column(name="SurfCouv", type="float", precision=10, scale=0, nullable=true)
     */
    private $surfcouv;

    /**
     * @var float
     *
     * @ORM\Column(name="DistRoutGoud", type="float", precision=10, scale=0, nullable=true)
     */
    private $distroutgoud;

    /**
     * @var float
     *
     * @ORM\Column(name="DistDele", type="float", precision=10, scale=0, nullable=true)
     */
    private $distdele;

    /**
     * @var \NomenclatureZone
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureZone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeZone", referencedColumnName="CodeZone")
     * })
     */
    private $codezone;

    /**
     * @var boolean
     *
     * @ORM\Column(name="PossExteEtab", type="boolean", nullable=true)
     */
    private $possexteetab;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombSallExte", type="integer", nullable=true)
     */
    private $nombsallexte;

    /**
     * @var \NomenclatureTypecloture
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureTypecloture")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeClot", referencedColumnName="CodeTypeClot")
     * })
     */
    private $codetypeclot;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="text", nullable=true)
     */
    private $obse;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ExisConnInte", type="boolean", nullable=true)
     */
    private $exisconninte;

    /**
     * @var \NomenclatureTypeconnxioninternet
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeconnxioninternet")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeConnInte", referencedColumnName="CodeTypeConnInte")
     * })
     */
    private $codetypeconninte;

    /**
     * @var \NomenclatureSituationreseauelectriqueatelier
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureSituationreseauelectriqueatelier")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeSituElecAtel", referencedColumnName="CodeSituElecAtel")
     * })
     */
    private $codesituelecatel;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EtablissementInfrastructure
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
     * @return EtablissementInfrastructure
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
     * @return EtablissementInfrastructure
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
     * @return EtablissementInfrastructure
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
     * Set codesitufonc
     *
     * @param string $codesitufonc
     * @return EtablissementInfrastructure
     */
    public function setCodesitufonc($codesitufonc)
    {
        $this->codesitufonc = $codesitufonc;

        return $this;
    }

    /**
     * Get codesitufonc
     *
     * @return string 
     */
    public function getCodesitufonc()
    {
        return $this->codesitufonc;
    }

    /**
     * Set surftotaterr
     *
     * @param float $surftotaterr
     * @return EtablissementInfrastructure
     */
    public function setSurftotaterr($surftotaterr)
    {
        $this->surftotaterr = $surftotaterr;

        return $this;
    }

    /**
     * Get surftotaterr
     *
     * @return float 
     */
    public function getSurftotaterr()
    {
        return $this->surftotaterr;
    }

    /**
     * Set surfcons
     *
     * @param float $surfcons
     * @return EtablissementInfrastructure
     */
    public function setSurfcons($surfcons)
    {
        $this->surfcons = $surfcons;

        return $this;
    }

    /**
     * Get surfcons
     *
     * @return float 
     */
    public function getSurfcons()
    {
        return $this->surfcons;
    }

    /**
     * Set surfcouv
     *
     * @param float $surfcouv
     * @return EtablissementInfrastructure
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
     * Set distroutgoud
     *
     * @param float $distroutgoud
     * @return EtablissementInfrastructure
     */
    public function setDistroutgoud($distroutgoud)
    {
        $this->distroutgoud = $distroutgoud;

        return $this;
    }

    /**
     * Get distroutgoud
     *
     * @return float 
     */
    public function getDistroutgoud()
    {
        return $this->distroutgoud;
    }

    /**
     * Set distdele
     *
     * @param float $distdele
     * @return EtablissementInfrastructure
     */
    public function setDistdele($distdele)
    {
        $this->distdele = $distdele;

        return $this;
    }

    /**
     * Get distdele
     *
     * @return float 
     */
    public function getDistdele()
    {
        return $this->distdele;
    }

    /**
     * Set codezone
     *
     * @param string $codezone
     * @return EtablissementInfrastructure
     */
    public function setCodezone($codezone)
    {
        $this->codezone = $codezone;

        return $this;
    }

    /**
     * Get codezone
     *
     * @return string 
     */
    public function getCodezone()
    {
        return $this->codezone;
    }

    /**
     * Set possexteetab
     *
     * @param boolean $possexteetab
     * @return EtablissementInfrastructure
     */
    public function setPossexteetab($possexteetab)
    {
        $this->possexteetab = $possexteetab;

        return $this;
    }

    /**
     * Get possexteetab
     *
     * @return boolean 
     */
    public function getPossexteetab()
    {
        return $this->possexteetab;
    }

    /**
     * Set nombsallexte
     *
     * @param integer $nombsallexte
     * @return EtablissementInfrastructure
     */
    public function setNombsallexte($nombsallexte)
    {
        $this->nombsallexte = $nombsallexte;

        return $this;
    }

    /**
     * Get nombsallexte
     *
     * @return integer 
     */
    public function getNombsallexte()
    {
        return $this->nombsallexte;
    }

    /**
     * Set codetypeclot
     *
     * @param string $codetypeclot
     * @return EtablissementInfrastructure
     */
    public function setCodetypeclot($codetypeclot)
    {
        $this->codetypeclot = $codetypeclot;

        return $this;
    }

    /**
     * Get codetypeclot
     *
     * @return string 
     */
    public function getCodetypeclot()
    {
        return $this->codetypeclot;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return EtablissementInfrastructure
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
     * Set exisconninte
     *
     * @param boolean $exisconninte
     * @return EtablissementInfrastructure
     */
    public function setExisconninte($exisconninte)
    {
        $this->exisconninte = $exisconninte;

        return $this;
    }

    /**
     * Get exisconninte
     *
     * @return boolean 
     */
    public function getExisconninte()
    {
        return $this->exisconninte;
    }

    /**
     * Set codetypeconninte
     *
     * @param string $codetypeconninte
     * @return EtablissementInfrastructure
     */
    public function setCodetypeconninte($codetypeconninte)
    {
        $this->codetypeconninte = $codetypeconninte;

        return $this;
    }

    /**
     * Get codetypeconninte
     *
     * @return string 
     */
    public function getCodetypeconninte()
    {
        return $this->codetypeconninte;
    }

    /**
     * Set codesituelecatel
     *
     * @param string $codesituelecatel
     * @return EtablissementInfrastructure
     */
    public function setCodesituelecatel($codesituelecatel)
    {
        $this->codesituelecatel = $codesituelecatel;

        return $this;
    }

    /**
     * Get codesituelecatel
     *
     * @return string 
     */
    public function getCodesituelecatel()
    {
        return $this->codesituelecatel;
    }
    /**
     * @var \EtablissementFicheetablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="EtablissementFicheetablissement",inversedBy="infr")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab"),
     * })
     */
    private $fichetabinfr;

    /**
     * @return \EtablissementFicheetablissement
     */
    public function getFichetabinfr()
    {
        return $this->fichetabinfr;
    }

    /**
     * @param \EtablissementFicheetablissement $fichetabinfr
     */
    public function setFichetabinfr($fichetabinfr)
    {
        $this->fichetabinfr = $fichetabinfr;
    }



    public function __toString()
    {
        return $this->codeetab;
    }
}

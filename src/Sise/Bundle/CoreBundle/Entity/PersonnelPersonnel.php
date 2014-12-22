<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * PersonnelPersonnel
 *
 * @ORM\Table(name="personnel_personnel")
 * @ORM\Entity
 */
class PersonnelPersonnel
{
    /**
     * @var string
     *
     * @ORM\Column(name="IdenUniq", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $idenuniq;

    /**
     * @param string $idenuniq
     */
    public function setIdenuniq($idenuniq)
    {
        $this->idenuniq = $idenuniq;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="Pren", type="string", length=50, nullable=false)
     */
    private $pren;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=50, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="NomJeunFille", type="string", length=50, nullable=true)
     */
    private $nomjeunfille;

    /**
     * @var \NomenclatureGenre
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureGenre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGenr", referencedColumnName="CodeGenr")
     * })
     */
    private $codegenr;

    /**
     * @return \NomenclatureGenre
     */
    public function getCodegenr()
    {
        return $this->codegenr;
    }

    /**
     * @param \NomenclatureGenre $codegenr
     */
    public function setCodegenr($codegenr)
    {
        $this->codegenr = $codegenr;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateNais", type="datetime", nullable=true)
     */
    private $datenais;

    /**
     * @var string
     *
     * @ORM\Column(name="LieuNais", type="string", length=50, nullable=true)
     */
    private $lieunais;

    /**
     * @var string
     *
     * @ORM\Column(name="NumeCIN", type="string", length=10, nullable=true)
     */
    private $numecin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCIN", type="datetime", nullable=true)
     */
    private $datecin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="NatiTuni", type="boolean", nullable=true)
     */
    private $natituni;


    /**
     * @var \NomenclatureNationalite
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureNationalite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeNati", referencedColumnName="CodeNati")
     * })
     */
    private $codenati;

    /**
     * @var string
     *
     * @ORM\Column(name="Adre", type="string", length=250, nullable=true)
     */
    private $adre;

    /**
     * @var string
     *
     * @ORM\Column(name="CompAdre", type="string", length=250, nullable=true)
     */
    private $compadre;

    /**
     * @var string
     *
     * @ORM\Column(name="Ville", type="string", length=50, nullable=true)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePost", type="string", length=50, nullable=true)
     */
    private $codepost;

    /**
     * @var string
     *
     * @ORM\Column(name="AdreSeco", type="string", length=250, nullable=true)
     */
    private $adreseco;

    /**
     * @var string
     *
     * @ORM\Column(name="CompAdreSeco", type="string", length=250, nullable=true)
     */
    private $compadreseco;

    /**
     * @var string
     *
     * @ORM\Column(name="VilleSeco", type="string", length=50, nullable=true)
     */
    private $villeseco;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePostSeco", type="string", length=50, nullable=true)
     */
    private $codepostseco;

    /**
     * @var string
     *
     * @ORM\Column(name="TeleFixe", type="string", length=50, nullable=true)
     */
    private $telefixe;

    /**
     * @var string
     *
     * @ORM\Column(name="TeleMobi", type="string", length=50, nullable=true)
     */
    private $telemobi;

    /**
     * @var string
     *
     * @ORM\Column(name="AdreElec", type="string", length=100, nullable=true)
     */
    private $adreelec;

    /**
     * @var \NomenclatureSituationfamiliale
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureSituationfamiliale")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeSituFami", referencedColumnName="CodeSituFami")
     * })
     */
    private $codesitufami;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnfa", type="integer", nullable=true)
     */
    private $nombenfa;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnfaChar", type="integer", nullable=true)
     */
    private $nombenfachar;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnfaBesoSpec", type="integer", nullable=true)
     */
    private $nombenfabesospec;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenConj", type="string", length=200, nullable=true)
     */
    private $nomprenconj;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ConjTravME", type="boolean", nullable=true)
     */
    private $conjtravme;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ConjTravFP", type="boolean", nullable=true)
     */
    private $conjtravfp;

    /**
     * @var string
     *
     * @ORM\Column(name="IdenUniqConj", type="string", length=50, nullable=true)
     */
    private $idenuniqconj;


    /**
     * @var \NomenclatureProfession
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureProfession")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeProfConj", referencedColumnName="CodeProf")
     * })
     */
    private $codeprofconj;

    /**
     * @var \NomenclatureCorps
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureCorps")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeCorp", referencedColumnName="CodeCorp")
     * })
     */
    private $codecorp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateEntrFoncPubl", type="datetime", nullable=true)
     */
    private $dateentrfoncpubl;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateRecrME", type="datetime", nullable=true)
     */
    private $daterecrme;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateTitu", type="datetime", nullable=true)
     */
    private $datetitu;

    /**
     * @var \NomenclatureEtablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureEtablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codeetab;

    /**
     * @var \NomenclatureTypeetablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeetablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codetypeetab;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateAffeEtabActu", type="datetime", nullable=true)
     */
    private $dateaffeetabactu;

    /**
     * @var \NomenclatureTypeaffectation
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeaffectation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeAffe", referencedColumnName="CodeTypeAffe")
     * })
     */
    private $codetypeaffe;

    /**
     * @var \NomenclatureGrade
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureGrade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGrad", referencedColumnName="CodeGrad")
     * })
     */
    private $codegrad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateGradActu", type="datetime", nullable=true)
     */
    private $dategradactu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateConfGradActu", type="datetime", nullable=true)
     */
    private $dateconfgradactu;

    /**
     * @var \NomenclatureFonction
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureFonction")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeFonc", referencedColumnName="CodeFonc")
     * })
     */
    private $codefonc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFonc", type="datetime", nullable=true)
     */
    private $datefonc;

    /**
     * @var \NomenclatureQualite
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureQualite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeQual", referencedColumnName="CodeQual")
     * })
     */
    private $codequal;

    /**
     * @var \NomenclatureSoussituationadministrative
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureSoussituationadministrative")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeSousSituAdmi", referencedColumnName="CodeSousSituAdmi")
     * })
     */
    private $codesoussituadmi;

    /**
     * @return \NomenclatureSoussituationadministrative
     */
    public function getCodesoussituadmi()
    {
        return $this->codesoussituadmi;
    }

    /**
     * @param \NomenclatureSoussituationadministrative $codesoussituadmi
     */
    public function setCodesoussituadmi($codesoussituadmi)
    {
        $this->codesoussituadmi = $codesoussituadmi;
    }


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateSituAdmi", type="datetime", nullable=true)
     */
    private $datesituadmi;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateSousSituAdmi", type="datetime", nullable=true)
     */
    private $datesoussituadmi;

    /**
     * @var \NomenclatureTache
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureTache")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTach", referencedColumnName="CodeTach")
     * })
     */
    private $codetach;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Roul", type="boolean", nullable=true)
     */
    private $roul;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebuRoul", type="datetime", nullable=true)
     */
    private $datedeburoul;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFinRoul", type="datetime", nullable=true)
     */
    private $datefinroul;

    /**
     * @var \NomenclatureNiveauetude
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureNiveauetude")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeNiveEtud", referencedColumnName="CodeNiveEtud")
     * })
     */
    private $codeniveetud;

    /**
     * @var \NomenclatureDiplome
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureDiplome")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeDipl", referencedColumnName="CodeDipl")
     * })
     */
    private $codedipl;

    /**
     * @var \NomenclatureSpecialite
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureSpecialite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeSpec", referencedColumnName="CodeSpec")
     * })
     */
    private $codespec;

    /**
     * @var boolean
     *
     * @ORM\Column(name="DiplTuni", type="boolean", nullable=true)
     */
    private $dipltuni;

    /**
     * @var \NomenclatureDiscipline
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureDiscipline")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeDisci", referencedColumnName="CodeDisci")
     * })
     */
    private $codedisci;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Spec", type="boolean", nullable=true)
     */
    private $spec;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EnseCourPriv", type="boolean", nullable=true)
     */
    private $ensecourpriv;

    /**
     * @var float
     *
     * @ORM\Column(name="CharHoraCourPriv", type="float", precision=10, scale=0, nullable=true)
     */
    private $charhoracourpriv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EnseCourPart", type="boolean", nullable=true)
     */
    private $ensecourpart;

    /**
     * @var \NomenclatureLangueenseignement
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureLangueenseignement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeLangEnse", referencedColumnName="CodeLangEnse")
     * })
     */
    private $codelangense;

    /**
     * @var float
     *
     * @ORM\Column(name="AnciAdmi", type="float", precision=10, scale=0, nullable=true)
     */
    private $anciadmi;

    /**
     * @var float
     *
     * @ORM\Column(name="AnciEnse", type="float", precision=10, scale=0, nullable=true)
     */
    private $anciense;

    /**
     * @var float
     *
     * @ORM\Column(name="AnciCentActu", type="float", precision=10, scale=0, nullable=true)
     */
    private $ancicentactu;

    /**
     * @var float
     *
     * @ORM\Column(name="NombHeurEnseReel", type="float", precision=10, scale=0, nullable=true)
     */
    private $nombheurensereel;

    /**
     * @var float
     *
     * @ORM\Column(name="NombHeurEnseRequ", type="float", precision=10, scale=0, nullable=true)
     */
    private $nombheurenserequ;

    /**
     * @var float
     *
     * @ORM\Column(name="NombHeurEnseSupp", type="float", precision=10, scale=0, nullable=true)
     */
    private $nombheurensesupp;

    /**
     * @var float
     *
     * @ORM\Column(name="NombHeurEnseComp", type="float", precision=10, scale=0, nullable=true)
     */
    private $nombheurensecomp;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Cont", type="boolean", nullable=true)
     */
    private $cont;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateDebuCont", type="datetime", nullable=true)
     */
    private $datedebucont;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateFinCont", type="datetime", nullable=true)
     */
    private $datefincont;

    /**
     * Set pren
     *
     * @param string $pren
     * @return PersonnelPersonnel
     */
    public function setPren($pren)
    {
        $this->pren = $pren;

        return $this;
    }

    /**
     * Get pren
     *
     * @return string 
     */
    public function getPren()
    {
        return $this->pren;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return PersonnelPersonnel
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
     * Set nomjeunfille
     *
     * @param string $nomjeunfille
     * @return PersonnelPersonnel
     */
    public function setNomjeunfille($nomjeunfille)
    {
        $this->nomjeunfille = $nomjeunfille;

        return $this;
    }

    /**
     * Get nomjeunfille
     *
     * @return string 
     */
    public function getNomjeunfille()
    {
        return $this->nomjeunfille;
    }

    /**
     * Set datenais
     *
     * @param \DateTime $datenais
     * @return PersonnelPersonnel
     */
    public function setDatenais($datenais)
    {
        $this->datenais = $datenais;

        return $this;
    }

    /**
     * Get datenais
     *
     * @return \DateTime 
     */
    public function getDatenais()
    {
        return $this->datenais;
    }

    /**
     * Set lieunais
     *
     * @param string $lieunais
     * @return PersonnelPersonnel
     */
    public function setLieunais($lieunais)
    {
        $this->lieunais = $lieunais;

        return $this;
    }

    /**
     * Get lieunais
     *
     * @return string 
     */
    public function getLieunais()
    {
        return $this->lieunais;
    }

    /**
     * Set numecin
     *
     * @param string $numecin
     * @return PersonnelPersonnel
     */
    public function setNumecin($numecin)
    {
        $this->numecin = $numecin;

        return $this;
    }

    /**
     * Get numecin
     *
     * @return string 
     */
    public function getNumecin()
    {
        return $this->numecin;
    }

    /**
     * Set datecin
     *
     * @param \DateTime $datecin
     * @return PersonnelPersonnel
     */
    public function setDatecin($datecin)
    {
        $this->datecin = $datecin;

        return $this;
    }

    /**
     * Get datecin
     *
     * @return \DateTime 
     */
    public function getDatecin()
    {
        return $this->datecin;
    }

    /**
     * Set natituni
     *
     * @param boolean $natituni
     * @return PersonnelPersonnel
     */
    public function setNatituni($natituni)
    {
        $this->natituni = $natituni;

        return $this;
    }

    /**
     * Get natituni
     *
     * @return boolean 
     */
    public function getNatituni()
    {
        return $this->natituni;
    }

    /**
     * Set codenati
     *
     * @param string $codenati
     * @return PersonnelPersonnel
     */
    public function setCodenati($codenati)
    {
        $this->codenati = $codenati;

        return $this;
    }

    /**
     * Get codenati
     *
     * @return string 
     */
    public function getCodenati()
    {
        return $this->codenati;
    }

    /**
     * Set adre
     *
     * @param string $adre
     * @return PersonnelPersonnel
     */
    public function setAdre($adre)
    {
        $this->adre = $adre;

        return $this;
    }

    /**
     * Get adre
     *
     * @return string 
     */
    public function getAdre()
    {
        return $this->adre;
    }

    /**
     * Set compadre
     *
     * @param string $compadre
     * @return PersonnelPersonnel
     */
    public function setCompadre($compadre)
    {
        $this->compadre = $compadre;

        return $this;
    }

    /**
     * Get compadre
     *
     * @return string 
     */
    public function getCompadre()
    {
        return $this->compadre;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return PersonnelPersonnel
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
     * Set codepost
     *
     * @param string $codepost
     * @return PersonnelPersonnel
     */
    public function setCodepost($codepost)
    {
        $this->codepost = $codepost;

        return $this;
    }

    /**
     * Get codepost
     *
     * @return string 
     */
    public function getCodepost()
    {
        return $this->codepost;
    }

    /**
     * Set adreseco
     *
     * @param string $adreseco
     * @return PersonnelPersonnel
     */
    public function setAdreseco($adreseco)
    {
        $this->adreseco = $adreseco;

        return $this;
    }

    /**
     * Get adreseco
     *
     * @return string 
     */
    public function getAdreseco()
    {
        return $this->adreseco;
    }

    /**
     * Set compadreseco
     *
     * @param string $compadreseco
     * @return PersonnelPersonnel
     */
    public function setCompadreseco($compadreseco)
    {
        $this->compadreseco = $compadreseco;

        return $this;
    }

    /**
     * Get compadreseco
     *
     * @return string 
     */
    public function getCompadreseco()
    {
        return $this->compadreseco;
    }

    /**
     * Set villeseco
     *
     * @param string $villeseco
     * @return PersonnelPersonnel
     */
    public function setVilleseco($villeseco)
    {
        $this->villeseco = $villeseco;

        return $this;
    }

    /**
     * Get villeseco
     *
     * @return string 
     */
    public function getVilleseco()
    {
        return $this->villeseco;
    }

    /**
     * Set codepostseco
     *
     * @param string $codepostseco
     * @return PersonnelPersonnel
     */
    public function setCodepostseco($codepostseco)
    {
        $this->codepostseco = $codepostseco;

        return $this;
    }

    /**
     * Get codepostseco
     *
     * @return string 
     */
    public function getCodepostseco()
    {
        return $this->codepostseco;
    }

    /**
     * Set telefixe
     *
     * @param string $telefixe
     * @return PersonnelPersonnel
     */
    public function setTelefixe($telefixe)
    {
        $this->telefixe = $telefixe;

        return $this;
    }

    /**
     * Get telefixe
     *
     * @return string 
     */
    public function getTelefixe()
    {
        return $this->telefixe;
    }

    /**
     * Set telemobi
     *
     * @param string $telemobi
     * @return PersonnelPersonnel
     */
    public function setTelemobi($telemobi)
    {
        $this->telemobi = $telemobi;

        return $this;
    }

    /**
     * Get telemobi
     *
     * @return string 
     */
    public function getTelemobi()
    {
        return $this->telemobi;
    }

    /**
     * Set adreelec
     *
     * @param string $adreelec
     * @return PersonnelPersonnel
     */
    public function setAdreelec($adreelec)
    {
        $this->adreelec = $adreelec;

        return $this;
    }

    /**
     * Get adreelec
     *
     * @return string 
     */
    public function getAdreelec()
    {
        return $this->adreelec;
    }

    /**
     * Set codesitufami
     *
     * @param string $codesitufami
     * @return PersonnelPersonnel
     */
    public function setCodesitufami($codesitufami)
    {
        $this->codesitufami = $codesitufami;

        return $this;
    }

    /**
     * Get codesitufami
     *
     * @return string 
     */
    public function getCodesitufami()
    {
        return $this->codesitufami;
    }

    /**
     * Set nombenfa
     *
     * @param integer $nombenfa
     * @return PersonnelPersonnel
     */
    public function setNombenfa($nombenfa)
    {
        $this->nombenfa = $nombenfa;

        return $this;
    }

    /**
     * Get nombenfa
     *
     * @return integer 
     */
    public function getNombenfa()
    {
        return $this->nombenfa;
    }

    /**
     * Set nombenfachar
     *
     * @param integer $nombenfachar
     * @return PersonnelPersonnel
     */
    public function setNombenfachar($nombenfachar)
    {
        $this->nombenfachar = $nombenfachar;

        return $this;
    }

    /**
     * Get nombenfachar
     *
     * @return integer 
     */
    public function getNombenfachar()
    {
        return $this->nombenfachar;
    }

    /**
     * Set nombenfabesospec
     *
     * @param integer $nombenfabesospec
     * @return PersonnelPersonnel
     */
    public function setNombenfabesospec($nombenfabesospec)
    {
        $this->nombenfabesospec = $nombenfabesospec;

        return $this;
    }

    /**
     * Get nombenfabesospec
     *
     * @return integer 
     */
    public function getNombenfabesospec()
    {
        return $this->nombenfabesospec;
    }

    /**
     * Set nomprenconj
     *
     * @param string $nomprenconj
     * @return PersonnelPersonnel
     */
    public function setNomprenconj($nomprenconj)
    {
        $this->nomprenconj = $nomprenconj;

        return $this;
    }

    /**
     * Get nomprenconj
     *
     * @return string 
     */
    public function getNomprenconj()
    {
        return $this->nomprenconj;
    }

    /**
     * Set conjtravme
     *
     * @param boolean $conjtravme
     * @return PersonnelPersonnel
     */
    public function setConjtravme($conjtravme)
    {
        $this->conjtravme = $conjtravme;

        return $this;
    }

    /**
     * Get conjtravme
     *
     * @return boolean 
     */
    public function getConjtravme()
    {
        return $this->conjtravme;
    }

    /**
     * Set conjtravfp
     *
     * @param boolean $conjtravfp
     * @return PersonnelPersonnel
     */
    public function setConjtravfp($conjtravfp)
    {
        $this->conjtravfp = $conjtravfp;

        return $this;
    }

    /**
     * Get conjtravfp
     *
     * @return boolean 
     */
    public function getConjtravfp()
    {
        return $this->conjtravfp;
    }

    /**
     * Set idenuniqconj
     *
     * @param string $idenuniqconj
     * @return PersonnelPersonnel
     */
    public function setIdenuniqconj($idenuniqconj)
    {
        $this->idenuniqconj = $idenuniqconj;

        return $this;
    }

    /**
     * Get idenuniqconj
     *
     * @return string 
     */
    public function getIdenuniqconj()
    {
        return $this->idenuniqconj;
    }

    /**
     * Set codeprofconj
     *
     * @param string $codeprofconj
     * @return PersonnelPersonnel
     */
    public function setCodeprofconj($codeprofconj)
    {
        $this->codeprofconj = $codeprofconj;

        return $this;
    }

    /**
     * Get codeprofconj
     *
     * @return string 
     */
    public function getCodeprofconj()
    {
        return $this->codeprofconj;
    }

    /**
     * Set codecorp
     *
     * @param string $codecorp
     * @return PersonnelPersonnel
     */
    public function setCodecorp($codecorp)
    {
        $this->codecorp = $codecorp;

        return $this;
    }

    /**
     * Get codecorp
     *
     * @return string 
     */
    public function getCodecorp()
    {
        return $this->codecorp;
    }

    /**
     * Set dateentrfoncpubl
     *
     * @param \DateTime $dateentrfoncpubl
     * @return PersonnelPersonnel
     */
    public function setDateentrfoncpubl($dateentrfoncpubl)
    {
        $this->dateentrfoncpubl = $dateentrfoncpubl;

        return $this;
    }

    /**
     * Get dateentrfoncpubl
     *
     * @return \DateTime 
     */
    public function getDateentrfoncpubl()
    {
        return $this->dateentrfoncpubl;
    }

    /**
     * Set daterecrme
     *
     * @param \DateTime $daterecrme
     * @return PersonnelPersonnel
     */
    public function setDaterecrme($daterecrme)
    {
        $this->daterecrme = $daterecrme;

        return $this;
    }

    /**
     * Get daterecrme
     *
     * @return \DateTime 
     */
    public function getDaterecrme()
    {
        return $this->daterecrme;
    }

    /**
     * Set datetitu
     *
     * @param string $datetitu
     * @return PersonnelPersonnel
     */
    public function setDatetitu($datetitu)
    {
        $this->datetitu = $datetitu;

        return $this;
    }

    /**
     * Get datetitu
     *
     * @return string 
     */
    public function getDatetitu()
    {
        return $this->datetitu;
    }

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return PersonnelPersonnel
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
     * @return PersonnelPersonnel
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
     * Set dateaffeetabactu
     *
     * @param \DateTime $dateaffeetabactu
     * @return PersonnelPersonnel
     */
    public function setDateaffeetabactu($dateaffeetabactu)
    {
        $this->dateaffeetabactu = $dateaffeetabactu;

        return $this;
    }

    /**
     * Get dateaffeetabactu
     *
     * @return \DateTime 
     */
    public function getDateaffeetabactu()
    {
        return $this->dateaffeetabactu;
    }

    /**
     * Set codetypeaffe
     *
     * @param string $codetypeaffe
     * @return PersonnelPersonnel
     */
    public function setCodetypeaffe($codetypeaffe)
    {
        $this->codetypeaffe = $codetypeaffe;

        return $this;
    }

    /**
     * Get codetypeaffe
     *
     * @return string 
     */
    public function getCodetypeaffe()
    {
        return $this->codetypeaffe;
    }

    /**
     * Set codegrad
     *
     * @param string $codegrad
     * @return PersonnelPersonnel
     */
    public function setCodegrad($codegrad)
    {
        $this->codegrad = $codegrad;

        return $this;
    }

    /**
     * Get codegrad
     *
     * @return string 
     */
    public function getCodegrad()
    {
        return $this->codegrad;
    }

    /**
     * Set dategradactu
     *
     * @param \DateTime $dategradactu
     * @return PersonnelPersonnel
     */
    public function setDategradactu($dategradactu)
    {
        $this->dategradactu = $dategradactu;

        return $this;
    }

    /**
     * Get dategradactu
     *
     * @return \DateTime 
     */
    public function getDategradactu()
    {
        return $this->dategradactu;
    }

    /**
     * Set dateconfgradactu
     *
     * @param \DateTime $dateconfgradactu
     * @return PersonnelPersonnel
     */
    public function setDateconfgradactu($dateconfgradactu)
    {
        $this->dateconfgradactu = $dateconfgradactu;

        return $this;
    }

    /**
     * Get dateconfgradactu
     *
     * @return \DateTime 
     */
    public function getDateconfgradactu()
    {
        return $this->dateconfgradactu;
    }

    /**
     * Set codefonc
     *
     * @param string $codefonc
     * @return PersonnelPersonnel
     */
    public function setCodefonc($codefonc)
    {
        $this->codefonc = $codefonc;

        return $this;
    }

    /**
     * Get codefonc
     *
     * @return string 
     */
    public function getCodefonc()
    {
        return $this->codefonc;
    }

    /**
     * Set datefonc
     *
     * @param string $datefonc
     * @return PersonnelPersonnel
     */
    public function setDatefonc($datefonc)
    {
        $this->datefonc = $datefonc;

        return $this;
    }

    /**
     * Get datefonc
     *
     * @return string 
     */
    public function getDatefonc()
    {
        return $this->datefonc;
    }

    /**
     * Set codequal
     *
     * @param string $codequal
     * @return PersonnelPersonnel
     */
    public function setCodequal($codequal)
    {
        $this->codequal = $codequal;

        return $this;
    }

    /**
     * Get codequal
     *
     * @return string 
     */
    public function getCodequal()
    {
        return $this->codequal;
    }

    /**
     * Set datesituadmi
     *
     * @param \DateTime $datesituadmi
     * @return PersonnelPersonnel
     */
    public function setDatesituadmi($datesituadmi)
    {
        $this->datesituadmi = $datesituadmi;

        return $this;
    }

    /**
     * Get datesituadmi
     *
     * @return \DateTime 
     */
    public function getDatesituadmi()
    {
        return $this->datesituadmi;
    }

    /**
     * Set datesoussituadmi
     *
     * @param \DateTime $datesoussituadmi
     * @return PersonnelPersonnel
     */
    public function setDatesoussituadmi($datesoussituadmi)
    {
        $this->datesoussituadmi = $datesoussituadmi;

        return $this;
    }

    /**
     * Get datesoussituadmi
     *
     * @return \DateTime 
     */
    public function getDatesoussituadmi()
    {
        return $this->datesoussituadmi;
    }

    /**
     * Set codetach
     *
     * @param string $codetach
     * @return PersonnelPersonnel
     */
    public function setCodetach($codetach)
    {
        $this->codetach = $codetach;

        return $this;
    }

    /**
     * Get codetach
     *
     * @return string 
     */
    public function getCodetach()
    {
        return $this->codetach;
    }

    /**
     * Set roul
     *
     * @param boolean $roul
     * @return PersonnelPersonnel
     */
    public function setRoul($roul)
    {
        $this->roul = $roul;

        return $this;
    }

    /**
     * Get roul
     *
     * @return boolean 
     */
    public function getRoul()
    {
        return $this->roul;
    }

    /**
     * Set datedeburoul
     *
     * @param \DateTime $datedeburoul
     * @return PersonnelPersonnel
     */
    public function setDatedeburoul($datedeburoul)
    {
        $this->datedeburoul = $datedeburoul;

        return $this;
    }

    /**
     * Get datedeburoul
     *
     * @return \DateTime 
     */
    public function getDatedeburoul()
    {
        return $this->datedeburoul;
    }

    /**
     * Set datefinroul
     *
     * @param \DateTime $datefinroul
     * @return PersonnelPersonnel
     */
    public function setDatefinroul($datefinroul)
    {
        $this->datefinroul = $datefinroul;

        return $this;
    }

    /**
     * Get datefinroul
     *
     * @return \DateTime 
     */
    public function getDatefinroul()
    {
        return $this->datefinroul;
    }

    /**
     * Set codeniveetud
     *
     * @param string $codeniveetud
     * @return PersonnelPersonnel
     */
    public function setCodeniveetud($codeniveetud)
    {
        $this->codeniveetud = $codeniveetud;

        return $this;
    }

    /**
     * Get codeniveetud
     *
     * @return string 
     */
    public function getCodeniveetud()
    {
        return $this->codeniveetud;
    }

    /**
     * Set codedipl
     *
     * @param string $codedipl
     * @return PersonnelPersonnel
     */
    public function setCodedipl($codedipl)
    {
        $this->codedipl = $codedipl;

        return $this;
    }

    /**
     * Get codedipl
     *
     * @return string 
     */
    public function getCodedipl()
    {
        return $this->codedipl;
    }

    /**
     * Set codespec
     *
     * @param string $codespec
     * @return PersonnelPersonnel
     */
    public function setCodespec($codespec)
    {
        $this->codespec = $codespec;

        return $this;
    }

    /**
     * Get codespec
     *
     * @return string 
     */
    public function getCodespec()
    {
        return $this->codespec;
    }

    /**
     * Set dipltuni
     *
     * @param boolean $dipltuni
     * @return PersonnelPersonnel
     */
    public function setDipltuni($dipltuni)
    {
        $this->dipltuni = $dipltuni;

        return $this;
    }

    /**
     * Get dipltuni
     *
     * @return boolean 
     */
    public function getDipltuni()
    {
        return $this->dipltuni;
    }

    /**
     * Set codedisci
     *
     * @param string $codedisci
     * @return PersonnelPersonnel
     */
    public function setCodedisci($codedisci)
    {
        $this->codedisci = $codedisci;

        return $this;
    }

    /**
     * Get codedisci
     *
     * @return string 
     */
    public function getCodedisci()
    {
        return $this->codedisci;
    }

    /**
     * Set spec
     *
     * @param boolean $spec
     * @return PersonnelPersonnel
     */
    public function setSpec($spec)
    {
        $this->spec = $spec;

        return $this;
    }

    /**
     * Get spec
     *
     * @return boolean 
     */
    public function getSpec()
    {
        return $this->spec;
    }

    /**
     * Set ensecourpriv
     *
     * @param boolean $ensecourpriv
     * @return PersonnelPersonnel
     */
    public function setEnsecourpriv($ensecourpriv)
    {
        $this->ensecourpriv = $ensecourpriv;

        return $this;
    }

    /**
     * Get ensecourpriv
     *
     * @return boolean 
     */
    public function getEnsecourpriv()
    {
        return $this->ensecourpriv;
    }

    /**
     * Set charhoracourpriv
     *
     * @param float $charhoracourpriv
     * @return PersonnelPersonnel
     */
    public function setCharhoracourpriv($charhoracourpriv)
    {
        $this->charhoracourpriv = $charhoracourpriv;

        return $this;
    }

    /**
     * Get charhoracourpriv
     *
     * @return float 
     */
    public function getCharhoracourpriv()
    {
        return $this->charhoracourpriv;
    }

    /**
     * Set ensecourpart
     *
     * @param boolean $ensecourpart
     * @return PersonnelPersonnel
     */
    public function setEnsecourpart($ensecourpart)
    {
        $this->ensecourpart = $ensecourpart;

        return $this;
    }

    /**
     * Get ensecourpart
     *
     * @return boolean 
     */
    public function getEnsecourpart()
    {
        return $this->ensecourpart;
    }

    /**
     * Set codelangense
     *
     * @param string $codelangense
     * @return PersonnelPersonnel
     */
    public function setCodelangense($codelangense)
    {
        $this->codelangense = $codelangense;

        return $this;
    }

    /**
     * Get codelangense
     *
     * @return string 
     */
    public function getCodelangense()
    {
        return $this->codelangense;
    }

    /**
     * Set anciadmi
     *
     * @param float $anciadmi
     * @return PersonnelPersonnel
     */
    public function setAnciadmi($anciadmi)
    {
        $this->anciadmi = $anciadmi;

        return $this;
    }

    /**
     * Get anciadmi
     *
     * @return float 
     */
    public function getAnciadmi()
    {
        return $this->anciadmi;
    }

    /**
     * Set anciense
     *
     * @param float $anciense
     * @return PersonnelPersonnel
     */
    public function setAnciense($anciense)
    {
        $this->anciense = $anciense;

        return $this;
    }

    /**
     * Get anciense
     *
     * @return float 
     */
    public function getAnciense()
    {
        return $this->anciense;
    }

    /**
     * Set ancicentactu
     *
     * @param float $ancicentactu
     * @return PersonnelPersonnel
     */
    public function setAncicentactu($ancicentactu)
    {
        $this->ancicentactu = $ancicentactu;

        return $this;
    }

    /**
     * Get ancicentactu
     *
     * @return float 
     */
    public function getAncicentactu()
    {
        return $this->ancicentactu;
    }

    /**
     * Set nombheurensereel
     *
     * @param float $nombheurensereel
     * @return PersonnelPersonnel
     */
    public function setNombheurensereel($nombheurensereel)
    {
        $this->nombheurensereel = $nombheurensereel;

        return $this;
    }

    /**
     * Get nombheurensereel
     *
     * @return float 
     */
    public function getNombheurensereel()
    {
        return $this->nombheurensereel;
    }

    /**
     * Set nombheurenserequ
     *
     * @param float $nombheurenserequ
     * @return PersonnelPersonnel
     */
    public function setNombheurenserequ($nombheurenserequ)
    {
        $this->nombheurenserequ = $nombheurenserequ;

        return $this;
    }

    /**
     * Get nombheurenserequ
     *
     * @return float 
     */
    public function getNombheurenserequ()
    {
        return $this->nombheurenserequ;
    }

    /**
     * Set nombheurensesupp
     *
     * @param float $nombheurensesupp
     * @return PersonnelPersonnel
     */
    public function setNombheurensesupp($nombheurensesupp)
    {
        $this->nombheurensesupp = $nombheurensesupp;

        return $this;
    }

    /**
     * Get nombheurensesupp
     *
     * @return float 
     */
    public function getNombheurensesupp()
    {
        return $this->nombheurensesupp;
    }

    /**
     * Set nombheurensecomp
     *
     * @param float $nombheurensecomp
     * @return PersonnelPersonnel
     */
    public function setNombheurensecomp($nombheurensecomp)
    {
        $this->nombheurensecomp = $nombheurensecomp;

        return $this;
    }

    /**
     * Get nombheurensecomp
     *
     * @return float 
     */
    public function getNombheurensecomp()
    {
        return $this->nombheurensecomp;
    }

    /**
     * Set cont
     *
     * @param boolean $cont
     * @return PersonnelPersonnel
     */
    public function setCont($cont)
    {
        $this->cont = $cont;

        return $this;
    }

    /**
     * Get cont
     *
     * @return boolean 
     */
    public function getCont()
    {
        return $this->cont;
    }

    /**
     * Set datedebucont
     *
     * @param \DateTime $datedebucont
     * @return PersonnelPersonnel
     */
    public function setDatedebucont($datedebucont)
    {
        $this->datedebucont = $datedebucont;

        return $this;
    }

    /**
     * Get datedebucont
     *
     * @return \DateTime 
     */
    public function getDatedebucont()
    {
        return $this->datedebucont;
    }

    /**
     * Set datefincont
     *
     * @param \DateTime $datefincont
     * @return PersonnelPersonnel
     */
    public function setDatefincont($datefincont)
    {
        $this->datefincont = $datefincont;

        return $this;
    }

    /**
     * Get datefincont
     *
     * @return \DateTime 
     */
    public function getDatefincont()
    {
        return $this->datefincont;
    }

    public function __construct()
    {
        $this->datenais = new \DateTime();
        $this->datecin = new \DateTime();
        $this->dateentrfoncpubl = new \DateTime();
        $this->daterecrme = new \DateTime();
        $this->datetitu = new \DateTime();
        $this->dategradactu = new \DateTime();
        $this->dateconfgradactu = new \DateTime();
        $this->datefonc = new \DateTime();
        $this->datedeburoul = new \DateTime();
        $this->datefinroul = new \DateTime();
        $this->datedebucont = new \DateTime();
        $this->datefincont = new \DateTime();
        $this->dateaffeetabactu = new \DateTime();
    }
    public function __toString()
    {
        return $this->idenuniq;
    }
//    /**
//     * @var \NomenclatureSoussituationadministrative
//     *
//     * @ORM\ManyToOne(targetEntity="NomenclatureSoussituationadministrative",cascade={"persist"})
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="CodeSousSituAdmi", referencedColumnName="CodeSousSituAdmi")
//     * })
//     */
//    private $codesituadmi;
//
//    /**
//     * @return \NomenclatureSoussituationadministrative
//     */
//    public function getCodesituadmi()
//    {
//        return $this->codesituadmi;
//    }
//
//    /**
//     * @param \NomenclatureSoussituationadministrative $codesituadmi
//     */
//    public function setCodesituadmi($codesituadmi)
//    {
//        $this->codesituadmi = $codesituadmi;
//    }
//    /**
//     *
//     * @ORM\PrePersist
//     * @ORM\PreUpdate
//     */
//    public function updatedTimestamps()
//    {
//        $date = new \DateTime('now');
//        if ($date instanceof \DateTime) {
//            if ($this->getDatecreabd() == null) {
//                $this->setDatecreabd($date);
//            }
//        }
//    }

    /**
     * Get idenuniq
     *
     * @return string 
     */
    public function getIdenuniq()
    {
        return $this->idenuniq;
    }
}

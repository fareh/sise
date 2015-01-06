<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentListeenseignenteducationsportif
 *
 * @ORM\Table(name="effectiveenseignent_listeenseignenteducationsportif", indexes={@ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignentEducationSportif_Nomencl74", columns={"CodeGrad"}), @ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignentEducationSportif_Nomencl75", columns={"CodeGenr"}), @ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignentEducationSportif_Nomencl76", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectiveenseignentListeenseignenteducationsportif
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
     * @ORM\Column(name="NumeEnse", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeense;

    public function __construct($codeetab=null, $codetypeetab=null, $annescol=null, $coderece=null, $numeense=null)
    {
        $this->codeetab = $codeetab;
        $this->codetypeetab = $codetypeetab;
        $this->annescol = $annescol;
        $this->coderece = $coderece;
        $this->numeense = $numeense;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="NomPren", type="string", length=200, nullable=false)
     */
    private $nompren;

    /**
     * @var NomenclatureGrade
     *
     * @ORM\OneToOne(targetEntity="NomenclatureGrade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGrad", referencedColumnName="CodeGrad")
     * })
     */
    private $codegrad;

    /**
     * @var NomenclatureGenre
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureGenre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGenr", referencedColumnName="CodeGenr")
     * })
     */
    private $codegenr;

    /**
     * @var float
     *
     * @ORM\Column(name="NombHeurSema", type="float", precision=10, scale=0, nullable=true)
     */
    private $nombheursema;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="text", nullable=true)
     */
    private $obse;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveenseignentListeenseignenteducationsportif
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
     * @return EffectiveenseignentListeenseignenteducationsportif
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
     * @return EffectiveenseignentListeenseignenteducationsportif
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
     * @return EffectiveenseignentListeenseignenteducationsportif
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
     * Set numeense
     *
     * @param integer $numeense
     * @return EffectiveenseignentListeenseignenteducationsportif
     */
    public function setNumeense($numeense)
    {
        $this->numeense = $numeense;

        return $this;
    }

    /**
     * Get numeense
     *
     * @return integer 
     */
    public function getNumeense()
    {
        return $this->numeense;
    }

    /**
     * Set nompren
     *
     * @param string $nompren
     * @return EffectiveenseignentListeenseignenteducationsportif
     */
    public function setNompren($nompren)
    {
        $this->nompren = $nompren;

        return $this;
    }

    /**
     * Get nompren
     *
     * @return string 
     */
    public function getNompren()
    {
        return $this->nompren;
    }

    /**
     * Set nombheursema
     *
     * @param float $nombheursema
     * @return EffectiveenseignentListeenseignenteducationsportif
     */
    public function setNombheursema($nombheursema)
    {
        $this->nombheursema = $nombheursema;

        return $this;
    }

    /**
     * Get nombheursema
     *
     * @return float 
     */
    public function getNombheursema()
    {
        return $this->nombheursema;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return EffectiveenseignentListeenseignenteducationsportif
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
     * Set codegrad
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureGrade $codegrad
     * @return EffectiveenseignentListeenseignenteducationsportif
     */
    public function setCodegrad(\Sise\Bundle\CoreBundle\Entity\NomenclatureGrade $codegrad = null)
    {
        $this->codegrad = $codegrad;

        return $this;
    }

    /**
     * Get codegrad
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureGrade 
     */
    public function getCodegrad()
    {
        return $this->codegrad;
    }

    /**
     * Set codegenr
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureGenre $codegenr
     * @return EffectiveenseignentListeenseignenteducationsportif
     */
    public function setCodegenr(\Sise\Bundle\CoreBundle\Entity\NomenclatureGenre $codegenr = null)
    {
        $this->codegenr = $codegenr;

        return $this;
    }

    /**
     * Get codegenr
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureGenre 
     */
    public function getCodegenr()
    {
        return $this->codegenr;
    }
}

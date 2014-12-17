<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentListeenseignentEducationtechnique
 *
 * @ORM\Table(name="effectiveenseignent_listeenseignent_educationtechnique", indexes={@ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignent_EducationTechnique_Nome49", columns={"CodeDipl"}), @ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignent_EducationTechnique_Nome50", columns={"CodeGenr"}), @ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignent_EducationTechnique_Nome51", columns={"CodeRece"}), @ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignent_EducationTechnique_Nome52", columns={"CodeSpec"}), @ORM\Index(name="FK_EffectiveEnseignent_ListeEnseignent_EducationTechnique_Nome53", columns={"CodeTypeTrav"})})
 * @ORM\Entity
 */
class EffectiveenseignentListeenseignentEducationtechnique
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

    /**
     * @var string
     *
     * @ORM\Column(name="NomPren", type="string", length=50, nullable=false)
     */
    private $nompren;

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
     * @ORM\Column(name="GradActu", type="boolean", nullable=true)
     */
    private $gradactu;

    /**
     * @var \NomenclatureTypetravail
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureTypetravail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeTrav", referencedColumnName="CodeTypeTrav")
     * })
     */
    private $codetypetrav;

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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * Set codegenr
     *
     * @param string $codegenr
     * @return EffectiveenseignentListeenseignentEducationtechnique
     */
    public function setCodegenr($codegenr)
    {
        $this->codegenr = $codegenr;

        return $this;
    }

    /**
     * Get codegenr
     *
     * @return string 
     */
    public function getCodegenr()
    {
        return $this->codegenr;
    }

    /**
     * Set codedipl
     *
     * @param string $codedipl
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * Set gradactu
     *
     * @param boolean $gradactu
     * @return EffectiveenseignentListeenseignentEducationtechnique
     */
    public function setGradactu($gradactu)
    {
        $this->gradactu = $gradactu;

        return $this;
    }

    /**
     * Get gradactu
     *
     * @return boolean 
     */
    public function getGradactu()
    {
        return $this->gradactu;
    }

    /**
     * Set codetypetrav
     *
     * @param string $codetypetrav
     * @return EffectiveenseignentListeenseignentEducationtechnique
     */
    public function setCodetypetrav($codetypetrav)
    {
        $this->codetypetrav = $codetypetrav;

        return $this;
    }

    /**
     * Get codetypetrav
     *
     * @return string 
     */
    public function getCodetypetrav()
    {
        return $this->codetypetrav;
    }

    /**
     * Set nombheursema
     *
     * @param float $nombheursema
     * @return EffectiveenseignentListeenseignentEducationtechnique
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
     * @return EffectiveenseignentListeenseignentEducationtechnique
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

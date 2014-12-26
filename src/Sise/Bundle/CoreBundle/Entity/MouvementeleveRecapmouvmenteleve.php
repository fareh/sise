<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MouvementeleveRecapmouvmenteleve
 *
 * @ORM\Table(name="mouvementeleve_recapmouvmenteleve", indexes={@ORM\Index(name="FK_MouvementEleve_RecapMouvmentEleve_Nomenclature_Filiere", columns={"CodeFili"}), @ORM\Index(name="FK_MouvementEleve_RecapMouvmentEleve_Nomenclature_Genre", columns={"CodeGenr"}), @ORM\Index(name="FK_MouvementEleve_RecapMouvmentEleve_Nomenclature_NiveauScolaire", columns={"CodeNiveScol"}), @ORM\Index(name="FK_MouvementEleve_RecapMouvmentEleve_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class MouvementeleveRecapmouvmenteleve
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
     * @var \NomenclatureFiliere
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureFiliere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeFili", referencedColumnName="CodeFili")
     * })
     */
    private $codefili;

    /**
     * @var \NomenclatureNiveauscolaire
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureNiveauscolaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")
     * })
     */
    private $codenivescol;

    /**
     * @var \NomenclatureGenre
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureGenre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGenr", referencedColumnName="CodeGenr")
     * })
     */
    private $codegenr;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElev16Octobre", type="integer", nullable=true)
     */
    private $nombelev16octobre;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevVenaAutrEtab", type="integer", nullable=true)
     */
    private $nombelevvenaautretab;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevDeplAutrEtab", type="integer", nullable=true)
     */
    private $nombelevdeplautretab;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevSepa", type="integer", nullable=true)
     */
    private $nombelevsepa;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevExcl", type="integer", nullable=true)
     */
    private $nombelevexcl;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElev30Juin", type="integer", nullable=true)
     */
    private $nombelev30juin;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevReus", type="integer", nullable=true)
     */
    private $nombelevreus;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevRedo", type="integer", nullable=true)
     */
    private $nombelevredo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevExcl30Juin", type="integer", nullable=true)
     */
    private $nombelevexcl30juin;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElev", type="integer", nullable=true)
     */
    private $nombtotaelev;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return MouvementeleveRecapmouvmenteleve
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
     * @return MouvementeleveRecapmouvmenteleve
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
     * @return MouvementeleveRecapmouvmenteleve
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
     * @return MouvementeleveRecapmouvmenteleve
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
     * Set codefili
     *
     * @param string $codefili
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setCodefili($codefili)
    {
        $this->codefili = $codefili;

        return $this;
    }

    /**
     * Get codefili
     *
     * @return string
     */
    public function getCodefili()
    {
        return $this->codefili;
    }

    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setCodenivescol($codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return string
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }

    /**
     * Set codegenr
     *
     * @param string $codegenr
     * @return MouvementeleveRecapmouvmenteleve
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
     * Set nombelev16octobre
     *
     * @param integer $nombelev16octobre
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelev16octobre($nombelev16octobre)
    {
        $this->nombelev16octobre = $nombelev16octobre;

        return $this;
    }

    /**
     * Get nombelev16octobre
     *
     * @return integer
     */
    public function getNombelev16octobre()
    {
        return $this->nombelev16octobre;
    }

    /**
     * Set nombelevvenaautretab
     *
     * @param integer $nombelevvenaautretab
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelevvenaautretab($nombelevvenaautretab)
    {
        $this->nombelevvenaautretab = $nombelevvenaautretab;

        return $this;
    }

    /**
     * Get nombelevvenaautretab
     *
     * @return integer
     */
    public function getNombelevvenaautretab()
    {
        return $this->nombelevvenaautretab;
    }

    /**
     * Set nombelevdeplautretab
     *
     * @param integer $nombelevdeplautretab
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelevdeplautretab($nombelevdeplautretab)
    {
        $this->nombelevdeplautretab = $nombelevdeplautretab;

        return $this;
    }

    /**
     * Get nombelevdeplautretab
     *
     * @return integer
     */
    public function getNombelevdeplautretab()
    {
        return $this->nombelevdeplautretab;
    }

    /**
     * Set nombelevsepa
     *
     * @param integer $nombelevsepa
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelevsepa($nombelevsepa)
    {
        $this->nombelevsepa = $nombelevsepa;

        return $this;
    }

    /**
     * Get nombelevsepa
     *
     * @return integer
     */
    public function getNombelevsepa()
    {
        return $this->nombelevsepa;
    }

    /**
     * Set nombelevexcl
     *
     * @param integer $nombelevexcl
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelevexcl($nombelevexcl)
    {
        $this->nombelevexcl = $nombelevexcl;

        return $this;
    }

    /**
     * Get nombelevexcl
     *
     * @return integer
     */
    public function getNombelevexcl()
    {
        return $this->nombelevexcl;
    }

    /**
     * Set nombelev30juin
     *
     * @param integer $nombelev30juin
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelev30juin($nombelev30juin)
    {
        $this->nombelev30juin = $nombelev30juin;

        return $this;
    }

    /**
     * Get nombelev30juin
     *
     * @return integer
     */
    public function getNombelev30juin()
    {
        return $this->nombelev30juin;
    }

    /**
     * Set nombelevreus
     *
     * @param integer $nombelevreus
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelevreus($nombelevreus)
    {
        $this->nombelevreus = $nombelevreus;

        return $this;
    }

    /**
     * Get nombelevreus
     *
     * @return integer
     */
    public function getNombelevreus()
    {
        return $this->nombelevreus;
    }

    /**
     * Set nombelevredo
     *
     * @param integer $nombelevredo
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelevredo($nombelevredo)
    {
        $this->nombelevredo = $nombelevredo;

        return $this;
    }

    /**
     * Get nombelevredo
     *
     * @return integer
     */
    public function getNombelevredo()
    {
        return $this->nombelevredo;
    }

    /**
     * Set nombelevexcl30juin
     *
     * @param integer $nombelevexcl30juin
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombelevexcl30juin($nombelevexcl30juin)
    {
        $this->nombelevexcl30juin = $nombelevexcl30juin;

        return $this;
    }

    /**
     * Get nombelevexcl30juin
     *
     * @return integer
     */
    public function getNombelevexcl30juin()
    {
        return $this->nombelevexcl30juin;
    }

    /**
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return MouvementeleveRecapmouvmenteleve
     */
    public function setNombtotaelev($nombtotaelev)
    {
        $this->nombtotaelev = $nombtotaelev;

        return $this;
    }

    /**
     * Get nombtotaelev
     *
     * @return integer
     */
    public function getNombtotaelev()
    {
        return $this->nombtotaelev;
    }
}

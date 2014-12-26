<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MouvementeleveListeelevessepareavantconseilclasse
 *
 * @ORM\Table(name="mouvementeleve_listeelevessepareavantconseilclasse", indexes={@ORM\Index(name="FK_MouvementEleve_ListeElevesSepareAvantConseilClasse_Nomencla35", columns={"CodeFili"}), @ORM\Index(name="FK_MouvementEleve_ListeElevesSepareAvantConseilClasse_Nomencla36", columns={"CodeGenr"}), @ORM\Index(name="FK_MouvementEleve_ListeElevesSepareAvantConseilClasse_Nomencla37", columns={"CodeRece"}), @ORM\Index(name="FK_MouvementEleve_ListeElevesSepareAvantConseilClasse_Nomencla38", columns={"CodeTypeSepa"})})
 * @ORM\Entity
 */
class MouvementeleveListeelevessepareavantconseilclasse
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
     * @ORM\Column(name="NumeElev", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $numeleve;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenElev", type="string", length=50, nullable=false)
     */
    private $nomprenelev;
    /**
     * @var \NomenclatureGenre
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureGenre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGenr", referencedColumnName="CodeGenr")
     * })
     */
    private $codegenr;

    /**
     * @var string
     *
     * @ORM\Column(name="DateSepa", type="string", length=50, nullable=true)
     */
    private $datesepa;

    /**
     * @var \NomenclatureTypeseparation
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeseparation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeSepa", referencedColumnName="CodeTypeSepa")
     * })
     */
    private $codetypesepa;

    /**
     * @var \NomenclatureNiveauscolaire
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureNiveauscolaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")
     * })
     */
    private $codenivescol;

    /**
     * @var \NomenclatureFiliere
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureFiliere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeFili", referencedColumnName="CodeFili")
     * })
     */
    private $codefili;

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return MouvementeleveListeelevessepareavantconseilclasse
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
     * @return MouvementeleveListeelevessepareavantconseilclasse
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
     * @return MouvementeleveListeelevessepareavantconseilclasse
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
     * @return MouvementeleveListeelevessepareavantconseilclasse
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
     * Set nomprenelev
     *
     * @param string $nomprenelev
     * @return MouvementeleveListeelevessepareavantconseilclasse
     */
    public function setNomprenelev($nomprenelev)
    {
        $this->nomprenelev = $nomprenelev;

        return $this;
    }

    /**
     * Get nomprenelev
     *
     * @return string
     */
    public function getNomprenelev()
    {
        return $this->nomprenelev;
    }

    /**
     * Set codegenr
     *
     * @param string $codegenr
     * @return MouvementeleveListeelevessepareavantconseilclasse
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
     * Set datesepa
     *
     * @param string $datesepa
     * @return MouvementeleveListeelevessepareavantconseilclasse
     */
    public function setDatesepa($datesepa)
    {
        $this->datesepa = $datesepa;

        return $this;
    }

    /**
     * Get datesepa
     *
     * @return string
     */
    public function getDatesepa()
    {
        return $this->datesepa;
    }

    /**
     * Set codetypesepa
     *
     * @param string $codetypesepa
     * @return MouvementeleveListeelevessepareavantconseilclasse
     */
    public function setCodetypesepa($codetypesepa)
    {
        $this->codetypesepa = $codetypesepa;

        return $this;
    }

    /**
     * Get codetypesepa
     *
     * @return string
     */
    public function getCodetypesepa()
    {
        return $this->codetypesepa;
    }

    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return MouvementeleveListeelevessepareavantconseilclasse
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
     * Set codefili
     *
     * @param string $codefili
     * @return MouvementeleveListeelevessepareavantconseilclasse
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
     * Set numeleve
     *
     * @param integer $numeleve
     * @return MouvementeleveListeelevessepareavantconseilclasse
     */
    public function setNumeleve($numeleve)
    {
        $this->numeleve = $numeleve;

        return $this;
    }

    /**
     * Get numeleve
     *
     * @return integer
     */
    public function getNumeleve()
    {
        return $this->numeleve;
    }
}

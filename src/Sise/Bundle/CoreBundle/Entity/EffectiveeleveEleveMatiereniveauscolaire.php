<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveEleveMatiereniveauscolaire
 *
 * @ORM\Table(name="effectiveeleve_eleve_matiereniveauscolaire", indexes={@ORM\Index(name="FK_EffectiveEleve_Eleve_MatiereNiveauScolaire_Nomenclature_Mat47", columns={"CodeMatiOpti"}), @ORM\Index(name="FK_EffectiveEleve_Eleve_MatiereNiveauScolaire_Nomenclature_Rec48", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectiveeleveEleveMatiereniveauscolaire
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
     * @var string
     *
     * @ORM\Column(name="CodeMatiOpti", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codematiopti;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombGrou", type="integer", nullable=true)
     */
    private $nombgrou;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElev", type="integer", nullable=true)
     */
    private $nombtotaelev;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMascNouv", type="integer", nullable=true)
     */
    private $nombelevmascnouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMascRedo", type="integer", nullable=true)
     */
    private $nombelevmascredo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiNouv", type="integer", nullable=true)
     */
    private $nombelevfeminouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiRedo", type="integer", nullable=true)
     */
    private $nombelevfemiredo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevNouv", type="integer", nullable=true)
     */
    private $nombtotaelevnouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevRedo", type="integer", nullable=true)
     */
    private $nombtotaelevredo;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveEleveMatiereniveauscolaire
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
     * @return EffectiveeleveEleveMatiereniveauscolaire
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
     * @return EffectiveeleveEleveMatiereniveauscolaire
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
     * @return EffectiveeleveEleveMatiereniveauscolaire
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
     * Set codematiopti
     *
     * @param string $codematiopti
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setCodematiopti($codematiopti)
    {
        $this->codematiopti = $codematiopti;

        return $this;
    }

    /**
     * Get codematiopti
     *
     * @return string
     */
    public function getCodematiopti()
    {
        return $this->codematiopti;
    }

    /**
     * Set nombgrou
     *
     * @param integer $nombgrou
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setNombgrou($nombgrou)
    {
        $this->nombgrou = $nombgrou;

        return $this;
    }

    /**
     * Get nombgrou
     *
     * @return integer
     */
    public function getNombgrou()
    {
        return $this->nombgrou;
    }

    /**
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return EffectiveeleveEleveMatiereniveauscolaire
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

    /**
     * Set nombelevmascnouv
     *
     * @param integer $nombelevmascnouv
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setNombelevmascnouv($nombelevmascnouv)
    {
        $this->nombelevmascnouv = $nombelevmascnouv;

        return $this;
    }

    /**
     * Get nombelevmascnouv
     *
     * @return integer
     */
    public function getNombelevmascnouv()
    {
        return $this->nombelevmascnouv;
    }

    /**
     * Set nombelevmascredo
     *
     * @param integer $nombelevmascredo
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setNombelevmascredo($nombelevmascredo)
    {
        $this->nombelevmascredo = $nombelevmascredo;

        return $this;
    }

    /**
     * Get nombelevmascredo
     *
     * @return integer
     */
    public function getNombelevmascredo()
    {
        return $this->nombelevmascredo;
    }

    /**
     * Set nombelevfeminouv
     *
     * @param integer $nombelevfeminouv
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setNombelevfeminouv($nombelevfeminouv)
    {
        $this->nombelevfeminouv = $nombelevfeminouv;

        return $this;
    }

    /**
     * Get nombelevfeminouv
     *
     * @return integer
     */
    public function getNombelevfeminouv()
    {
        return $this->nombelevfeminouv;
    }

    /**
     * Set nombelevfemiredo
     *
     * @param integer $nombelevfemiredo
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setNombelevfemiredo($nombelevfemiredo)
    {
        $this->nombelevfemiredo = $nombelevfemiredo;

        return $this;
    }

    /**
     * Get nombelevfemiredo
     *
     * @return integer
     */
    public function getNombelevfemiredo()
    {
        return $this->nombelevfemiredo;
    }

    /**
     * Set nombtotaelevnouv
     *
     * @param integer $nombtotaelevnouv
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setNombtotaelevnouv($nombtotaelevnouv)
    {
        $this->nombtotaelevnouv = $nombtotaelevnouv;

        return $this;
    }

    /**
     * Get nombtotaelevnouv
     *
     * @return integer
     */
    public function getNombtotaelevnouv()
    {
        return $this->nombtotaelevnouv;
    }

    /**
     * Set nombtotaelevredo
     *
     * @param integer $nombtotaelevredo
     * @return EffectiveeleveEleveMatiereniveauscolaire
     */
    public function setNombtotaelevredo($nombtotaelevredo)
    {
        $this->nombtotaelevredo = $nombtotaelevredo;

        return $this;
    }

    /**
     * Get nombtotaelevredo
     *
     * @return integer
     */
    public function getNombtotaelevredo()
    {
        return $this->nombtotaelevredo;
    }
}

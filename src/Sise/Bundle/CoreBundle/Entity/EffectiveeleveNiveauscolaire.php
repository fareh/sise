<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveNiveauscolaire
 *
 * @ORM\Table(name="effectiveeleve_niveauscolaire", indexes={@ORM\Index(name="FK_EffectiveEleve_NiveauScolaire_Nomenclature_FiliereNiveauSco43", columns={"CodeFili", "CodeNiveScol"}), @ORM\Index(name="FK_EffectiveEleve_NiveauScolaire_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectiveeleveNiveauscolaire
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
     * @ORM\Column(name="CodeFili", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefili;
    /**
     * @ORM\OneToOne(targetEntity="NomenclatureNiveauscolaire")
     * @ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
       private $codenivescol;


    /**
     * @var integer
     *
     * @ORM\Column(name="NombClassElev", type="integer", nullable=false)
     */
    private $nombclasselev;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMascNouv", type="integer", nullable=false)
     */
    private $nombelevmascnouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiNouv", type="integer", nullable=false)
     */
    private $nombelevfeminouv;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMascRedo", type="integer", nullable=false)
     */
    private $nombelevmascredo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemiRedo", type="integer", nullable=false)
     */
    private $nombelevfemiredo;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevMasc", type="integer", nullable=true)
     */
    private $nombtotaelevmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaElevFemi", type="integer", nullable=true)
     */
    private $nombtotaelevfemi;

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
     * @return EffectiveeleveNiveauscolaire
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
     * @return EffectiveeleveNiveauscolaire
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
     * @return EffectiveeleveNiveauscolaire
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
     * @return EffectiveeleveNiveauscolaire
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
     * @return EffectiveeleveNiveauscolaire
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
     * Set nombclasselev
     *
     * @param integer $nombclasselev
     * @return EffectiveeleveNiveauscolaire
     */
    public function setNombclasselev($nombclasselev)
    {
        $this->nombclasselev = $nombclasselev;

        return $this;
    }

    /**
     * Get nombclasselev
     *
     * @return integer 
     */
    public function getNombclasselev()
    {
        return $this->nombclasselev;
    }

    /**
     * Set nombelevmascnouv
     *
     * @param integer $nombelevmascnouv
     * @return EffectiveeleveNiveauscolaire
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
     * Set nombelevfeminouv
     *
     * @param integer $nombelevfeminouv
     * @return EffectiveeleveNiveauscolaire
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
     * Set nombelevmascredo
     *
     * @param integer $nombelevmascredo
     * @return EffectiveeleveNiveauscolaire
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
     * Set nombelevfemiredo
     *
     * @param integer $nombelevfemiredo
     * @return EffectiveeleveNiveauscolaire
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
     * Set nombtotaelevmasc
     *
     * @param integer $nombtotaelevmasc
     * @return EffectiveeleveNiveauscolaire
     */
    public function setNombtotaelevmasc($nombtotaelevmasc)
    {
        $this->nombtotaelevmasc = $nombtotaelevmasc;

        return $this;
    }

    /**
     * Get nombtotaelevmasc
     *
     * @return integer 
     */
    public function getNombtotaelevmasc()
    {
        return $this->nombtotaelevmasc;
    }

    /**
     * Set nombtotaelevfemi
     *
     * @param integer $nombtotaelevfemi
     * @return EffectiveeleveNiveauscolaire
     */
    public function setNombtotaelevfemi($nombtotaelevfemi)
    {
        $this->nombtotaelevfemi = $nombtotaelevfemi;

        return $this;
    }

    /**
     * Get nombtotaelevfemi
     *
     * @return integer 
     */
    public function getNombtotaelevfemi()
    {
        return $this->nombtotaelevfemi;
    }

    /**
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return EffectiveeleveNiveauscolaire
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
     * Set codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return EffectiveeleveNiveauscolaire
     */
    public function setCodenivescol(\Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }
}

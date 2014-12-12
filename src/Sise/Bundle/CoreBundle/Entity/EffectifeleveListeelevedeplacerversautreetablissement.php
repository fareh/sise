<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveListeelevedeplacerversautreetablissement
 *
 * @ORM\Table(name="effectifeleve_listeelevedeplacerversautreetablissement")
 * @ORM\Entity
 */
class EffectifeleveListeelevedeplacerversautreetablissement
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
    private $numeelev;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenElev", type="string", length=100, nullable=false)
     */
    private $nomprenelev;

    /**
     * @var \NomenclatureGenre
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NomenclatureGenre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGenr", referencedColumnName="CodeGenr")
     * })
     */
    private $codegenr;

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
     * @ORM\OneToOne(targetEntity="NomenclatureFiliere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeFili", referencedColumnName="CodeFili")
     * })
     */
    private $codefili;
    /**
     * @var \NomenclatureEtablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NomenclatureEtablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtabAutr", referencedColumnName="CodeEtab"),
     *   @ORM\JoinColumn(name="CodeTypeEtabAutr", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codeetabautr;
    /**
     * @var \NomenclatureTypeetablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NomenclatureTypeetablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeEtabAutr", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codetypeetabautr;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * Set numeelev
     *
     * @param integer $numeelev
     * @return EffectifeleveListeelevedeplacerversautreetablissement
     */
    public function setNumeelev($numeelev)
    {
        $this->numeelev = $numeelev;

        return $this;
    }

    /**
     * Get numeelev
     *
     * @return integer 
     */
    public function getNumeelev()
    {
        return $this->numeelev;
    }

    /**
     * Set nomprenelev
     *
     * @param string $nomprenelev
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * @return EffectifeleveListeelevedeplacerversautreetablissement
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
     * Set codeetabautr
     *
     * @param string $codeetabautr
     * @return EffectifeleveListeelevedeplacerversautreetablissement
     */
    public function setCodeetabautr($codeetabautr)
    {
        $this->codeetabautr = $codeetabautr;

        return $this;
    }

    /**
     * Get codeetabautr
     *
     * @return string 
     */
    public function getCodeetabautr()
    {
        return $this->codeetabautr;
    }

    /**
     * Set codetypeetabautr
     *
     * @param string $codetypeetabautr
     * @return EffectifeleveListeelevedeplacerversautreetablissement
     */
    public function setCodetypeetabautr($codetypeetabautr)
    {
        $this->codetypeetabautr = $codetypeetabautr;

        return $this;
    }

    /**
     * Get codetypeetabautr
     *
     * @return string 
     */
    public function getCodetypeetabautr()
    {
        return $this->codetypeetabautr;
    }
}

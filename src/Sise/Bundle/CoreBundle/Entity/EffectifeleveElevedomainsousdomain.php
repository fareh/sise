<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveElevedomainsousdomain
 *
 * @ORM\Table(name="effectifeleve_elevedomainsousdomain", indexes={@ORM\Index(name="FK_EffectifEleve_EleveDomainSousDomain_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectifEleve_EleveDomainSousDomain_Nomenclature_SousDomaine", columns={"CodeSousDoma"})})
 * @ORM\Entity
 */
class EffectifeleveElevedomainsousdomain
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
     * @ORM\Column(name="CodeSousDoma", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codesousdoma;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombClass", type="integer", nullable=true)
     */
    private $nombclass;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombGrou", type="integer", nullable=true)
     */
    private $nombgrou;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMasc", type="integer", nullable=true)
     */
    private $nombelevmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemi", type="integer", nullable=true)
     */
    private $nombelevfemi;

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
     * @return EffectifeleveElevedomainsousdomain
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
     * @return EffectifeleveElevedomainsousdomain
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
     * @return EffectifeleveElevedomainsousdomain
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
     * @return EffectifeleveElevedomainsousdomain
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
     * Set codesousdoma
     *
     * @param string $codesousdoma
     * @return EffectifeleveElevedomainsousdomain
     */
    public function setCodesousdoma($codesousdoma)
    {
        $this->codesousdoma = $codesousdoma;

        return $this;
    }

    /**
     * Get codesousdoma
     *
     * @return string 
     */
    public function getCodesousdoma()
    {
        return $this->codesousdoma;
    }

    /**
     * Set nombclass
     *
     * @param integer $nombclass
     * @return EffectifeleveElevedomainsousdomain
     */
    public function setNombclass($nombclass)
    {
        $this->nombclass = $nombclass;

        return $this;
    }

    /**
     * Get nombclass
     *
     * @return integer 
     */
    public function getNombclass()
    {
        return $this->nombclass;
    }

    /**
     * Set nombgrou
     *
     * @param integer $nombgrou
     * @return EffectifeleveElevedomainsousdomain
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
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return EffectifeleveElevedomainsousdomain
     */
    public function setNombelevmasc($nombelevmasc)
    {
        $this->nombelevmasc = $nombelevmasc;

        return $this;
    }

    /**
     * Get nombelevmasc
     *
     * @return integer 
     */
    public function getNombelevmasc()
    {
        return $this->nombelevmasc;
    }

    /**
     * Set nombelevfemi
     *
     * @param integer $nombelevfemi
     * @return EffectifeleveElevedomainsousdomain
     */
    public function setNombelevfemi($nombelevfemi)
    {
        $this->nombelevfemi = $nombelevfemi;

        return $this;
    }

    /**
     * Get nombelevfemi
     *
     * @return integer 
     */
    public function getNombelevfemi()
    {
        return $this->nombelevfemi;
    }

    /**
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return EffectifeleveElevedomainsousdomain
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

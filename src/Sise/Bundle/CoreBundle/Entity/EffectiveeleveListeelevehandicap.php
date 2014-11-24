<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveListeelevehandicap
 *
 * @ORM\Table(name="effectiveeleve_listeelevehandicap", indexes={@ORM\Index(name="FK_EffectiveEleve_ListeEleveHandicap_Nomenclature_DegreHandicap", columns={"CodeDegrHand"}), @ORM\Index(name="FK_EffectiveEleve_ListeEleveHandicap_Nomenclature_NiveauScolaire", columns={"CodeNiveScol"}), @ORM\Index(name="FK_EffectiveEleve_ListeEleveHandicap_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectiveEleve_ListeEleveHandicap_Nomenclature_TypeHandicap", columns={"CodeTypeHand"})})
 * @ORM\Entity
 */
class EffectiveeleveListeelevehandicap
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
     * @ORM\Column(name="NomPren", type="string", length=100, nullable=true)
     */
    private $nompren;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeGenr", type="string", length=50, nullable=true)
     */
    private $codegenr;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneNais", type="integer", nullable=true)
     */
    private $annenais;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=true)
     */
    private $codenivescol;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Redo", type="boolean", nullable=true)
     */
    private $redo;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeHand", type="string", length=50, nullable=true)
     */
    private $codetypehand;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeDegrHand", type="string", length=50, nullable=true)
     */
    private $codedegrhand;

    /**
     * @var boolean
     *
     * @ORM\Column(name="InteFaci", type="boolean", nullable=true)
     */
    private $intefaci;

    /**
     * @var boolean
     *
     * @ORM\Column(name="InteDefi", type="boolean", nullable=true)
     */
    private $intedefi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="SuivCentSpec", type="boolean", nullable=true)
     */
    private $suivcentspec;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveListeelevehandicap
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
     * @return EffectiveeleveListeelevehandicap
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
     * @return EffectiveeleveListeelevehandicap
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
     * @return EffectiveeleveListeelevehandicap
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
     * @return EffectiveeleveListeelevehandicap
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
     * Set nompren
     *
     * @param string $nompren
     * @return EffectiveeleveListeelevehandicap
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
     * @return EffectiveeleveListeelevehandicap
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
     * Set annenais
     *
     * @param integer $annenais
     * @return EffectiveeleveListeelevehandicap
     */
    public function setAnnenais($annenais)
    {
        $this->annenais = $annenais;

        return $this;
    }

    /**
     * Get annenais
     *
     * @return integer 
     */
    public function getAnnenais()
    {
        return $this->annenais;
    }

    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return EffectiveeleveListeelevehandicap
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
     * Set redo
     *
     * @param boolean $redo
     * @return EffectiveeleveListeelevehandicap
     */
    public function setRedo($redo)
    {
        $this->redo = $redo;

        return $this;
    }

    /**
     * Get redo
     *
     * @return boolean 
     */
    public function getRedo()
    {
        return $this->redo;
    }

    /**
     * Set codetypehand
     *
     * @param string $codetypehand
     * @return EffectiveeleveListeelevehandicap
     */
    public function setCodetypehand($codetypehand)
    {
        $this->codetypehand = $codetypehand;

        return $this;
    }

    /**
     * Get codetypehand
     *
     * @return string 
     */
    public function getCodetypehand()
    {
        return $this->codetypehand;
    }

    /**
     * Set codedegrhand
     *
     * @param string $codedegrhand
     * @return EffectiveeleveListeelevehandicap
     */
    public function setCodedegrhand($codedegrhand)
    {
        $this->codedegrhand = $codedegrhand;

        return $this;
    }

    /**
     * Get codedegrhand
     *
     * @return string 
     */
    public function getCodedegrhand()
    {
        return $this->codedegrhand;
    }

    /**
     * Set intefaci
     *
     * @param boolean $intefaci
     * @return EffectiveeleveListeelevehandicap
     */
    public function setIntefaci($intefaci)
    {
        $this->intefaci = $intefaci;

        return $this;
    }

    /**
     * Get intefaci
     *
     * @return boolean 
     */
    public function getIntefaci()
    {
        return $this->intefaci;
    }

    /**
     * Set intedefi
     *
     * @param boolean $intedefi
     * @return EffectiveeleveListeelevehandicap
     */
    public function setIntedefi($intedefi)
    {
        $this->intedefi = $intedefi;

        return $this;
    }

    /**
     * Get intedefi
     *
     * @return boolean 
     */
    public function getIntedefi()
    {
        return $this->intedefi;
    }

    /**
     * Set suivcentspec
     *
     * @param boolean $suivcentspec
     * @return EffectiveeleveListeelevehandicap
     */
    public function setSuivcentspec($suivcentspec)
    {
        $this->suivcentspec = $suivcentspec;

        return $this;
    }

    /**
     * Get suivcentspec
     *
     * @return boolean 
     */
    public function getSuivcentspec()
    {
        return $this->suivcentspec;
    }
}

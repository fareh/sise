<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveListeelevehandicap
 *
 * @ORM\Table(name="effectiveeleve_listeelevehandicap")
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


    public function __construct($codeetab=null, $codetypeetab=null, $annescol=null, $coderece=null, $numeelev=null)
    {
        $this->codeetab = $codeetab;
        $this->codetypeetab = $codetypeetab;
        $this->annescol = $annescol;
        $this->coderece = $coderece;
        $this->numeelev = $numeelev;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="NomPren", type="string", length=100, nullable=true)
     */
    private $nompren;


    /**
     * @var NomenclatureGenre
     * @ORM\ManyToOne(targetEntity="NomenclatureGenre")
     * @ORM\JoinColumn(name="CodeGenr", referencedColumnName="CodeGenr")
     */
    private $codegenr;

    /**
     * @var NomenclatureAnneenaissance
     * @ORM\ManyToOne(targetEntity="NomenclatureAnneenaissance")
     * @ORM\JoinColumn(name="CodeAnneNais", referencedColumnName="CodeAnneNais")
     */
    private $annenais;

    /**
     * @var NomenclatureNiveauscolaire
     * @ORM\ManyToOne(targetEntity="NomenclatureNiveauscolaire")
     * @ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")
     */
    private $codenivescol;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Redo", type="boolean", nullable=true)
     */
    private $redo;


    /**
     * @var NomenclatureTypehandicap
     * @ORM\ManyToOne(targetEntity="NomenclatureTypehandicap")
     * @ORM\JoinColumn(name="CodeTypeHand", referencedColumnName="CodeTypeHand")
     */
    private $codetypehand;


    /**
     * @var NomenclatureDegrehandicap
     * @ORM\ManyToOne(targetEntity="NomenclatureDegrehandicap")
     * @ORM\JoinColumn(name="CodeDegrHand", referencedColumnName="CodeDegrHand")
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

    /**
     * Set codegenr
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureGenre $codegenr
     * @return EffectiveeleveListeelevehandicap
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

    /**
     * Set annenais
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance $annenais
     * @return EffectiveeleveListeelevehandicap
     */
    public function setAnnenais(\Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance $annenais = null)
    {
        $this->annenais = $annenais;

        return $this;
    }

    /**
     * Get annenais
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureAnneenaissance
     */
    public function getAnnenais()
    {
        return $this->annenais;
    }

    /**
     * Set codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return EffectiveeleveListeelevehandicap
     */
    public function setCodenivescol(\Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol = null)
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

    /**
     * Set codetypehand
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypehandicap $codetypehand
     * @return EffectiveeleveListeelevehandicap
     */
    public function setCodetypehand(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypehandicap $codetypehand = null)
    {
        $this->codetypehand = $codetypehand;

        return $this;
    }

    /**
     * Get codetypehand
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureTypehandicap
     */
    public function getCodetypehand()
    {
        return $this->codetypehand;
    }

    /**
     * Set codedegrhand
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDegrehandicap $codedegrhand
     * @return EffectiveeleveListeelevehandicap
     */
    public function setCodedegrhand(\Sise\Bundle\CoreBundle\Entity\NomenclatureDegrehandicap $codedegrhand = null)
    {
        $this->codedegrhand = $codedegrhand;

        return $this;
    }

    /**
     * Get codedegrhand
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureDegrehandicap
     */
    public function getCodedegrhand()
    {
        return $this->codedegrhand;
    }

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
}

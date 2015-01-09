<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureQuestionnaire
 *
 * @ORM\Table(name="nomenclature_questionnaire")
 * @ORM\Entity
 */
class NomenclatureQuestionnaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeQues", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeques;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeQuesFr", type="string", length=500, nullable=true)
     */
    private $libequesfr;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeQuesAr", type="string", length=500, nullable=true)
     */
    private $libequesar;

    /**
     * @var string
     *
     * @ORM\Column(name="NameClass", type="string", length=500, nullable=true)
     */
    private $nameclass;

    /**
     * @var string
     *
     * @ORM\Column(name="routeclass", type="string", length=500, nullable=true)
     */
    private $routeclass;

    /**
     * @var string
     *
     * @ORM\Column(name="SP_Browse", type="string", length=250, nullable=true)
     */
    private $spBrowse;

    /**
     * @var string
     *
     * @ORM\Column(name="SP_Insert", type="string", length=250, nullable=true)
     */
    private $spInsert;

    /**
     * @var string
     *
     * @ORM\Column(name="SP_Edit", type="string", length=250, nullable=true)
     */
    private $spEdit;

    /**
     * @var string
     *
     * @ORM\Column(name="SP_Init", type="string", length=250, nullable=true)
     */
    private $spInit;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrExec", type="integer", nullable=true)
     */
    private $ordrexec;

    /**
     * @var string
     *
     * @ORM\Column(name="CodePack", type="string", length=50, nullable=true)
     */
    private $codepack;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Prep", type="boolean", nullable=false)
     */
    private $prep;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Prim", type="boolean", nullable=false)
     */
    private $prim;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CollGene", type="boolean", nullable=false)
     */
    private $collgene;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Lyce", type="boolean", nullable=false)
     */
    private $lyce;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CollTech", type="boolean", nullable=false)
     */
    private $colltech;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeEnti", type="string", length=100, nullable=true)
     */
    private $codeenti;

    /**
     * Get codeques
     *
     * @return string
     */
    public function getCodeques()
    {
        return $this->codeques;
    }

    /**
     * Set libequesfr
     *
     * @param string $libequesfr
     * @return NomenclatureQuestionnaire
     */
    public function setLibequesfr($libequesfr)
    {
        $this->libequesfr = $libequesfr;

        return $this;
    }

    /**
     * Get libequesfr
     *
     * @return string
     */
    public function getLibequesfr()
    {
        return $this->libequesfr;
    }

    /**
     * Set libequesar
     *
     * @param string $libequesar
     * @return NomenclatureQuestionnaire
     */
    public function setLibequesar($libequesar)
    {
        $this->libequesar = $libequesar;

        return $this;
    }

    /**
     * Get libequesar
     *
     * @return string
     */
    public function getLibequesar()
    {
        return $this->libequesar;
    }

    /**
     * Set nameclass
     *
     * @param string $nameclass
     * @return NomenclatureQuestionnaire
     */
    public function setNameclass($nameclass)
    {
        $this->nameclass = $nameclass;

        return $this;
    }

    /**
     * Get nameclass
     *
     * @return string
     */
    public function getNameclass()
    {
        return $this->nameclass;
    }

    /**
     * Set spBrowse
     *
     * @param string $spBrowse
     * @return NomenclatureQuestionnaire
     */
    public function setSpBrowse($spBrowse)
    {
        $this->spBrowse = $spBrowse;

        return $this;
    }

    /**
     * Get spBrowse
     *
     * @return string
     */
    public function getSpBrowse()
    {
        return $this->spBrowse;
    }

    /**
     * Set spInsert
     *
     * @param string $spInsert
     * @return NomenclatureQuestionnaire
     */
    public function setSpInsert($spInsert)
    {
        $this->spInsert = $spInsert;

        return $this;
    }

    /**
     * Get spInsert
     *
     * @return string
     */
    public function getSpInsert()
    {
        return $this->spInsert;
    }

    /**
     * Set spEdit
     *
     * @param string $spEdit
     * @return NomenclatureQuestionnaire
     */
    public function setSpEdit($spEdit)
    {
        $this->spEdit = $spEdit;

        return $this;
    }

    /**
     * Get spEdit
     *
     * @return string
     */
    public function getSpEdit()
    {
        return $this->spEdit;
    }

    /**
     * Set spInit
     *
     * @param string $spInit
     * @return NomenclatureQuestionnaire
     */
    public function setSpInit($spInit)
    {
        $this->spInit = $spInit;

        return $this;
    }

    /**
     * Get spInit
     *
     * @return string
     */
    public function getSpInit()
    {
        return $this->spInit;
    }

    /**
     * Set ordrexec
     *
     * @param integer $ordrexec
     * @return NomenclatureQuestionnaire
     */
    public function setOrdrexec($ordrexec)
    {
        $this->ordrexec = $ordrexec;

        return $this;
    }

    /**
     * Get ordrexec
     *
     * @return integer
     */
    public function getOrdrexec()
    {
        return $this->ordrexec;
    }

    /**
     * Set codepack
     *
     * @param string $codepack
     * @return NomenclatureQuestionnaire
     */
    public function setCodepack($codepack)
    {
        $this->codepack = $codepack;

        return $this;
    }

    /**
     * Get codepack
     *
     * @return string
     */
    public function getCodepack()
    {
        return $this->codepack;
    }

    /**
     * Set prep
     *
     * @param boolean $prep
     * @return NomenclatureQuestionnaire
     */
    public function setPrep($prep)
    {
        $this->prep = $prep;

        return $this;
    }

    /**
     * Get prep
     *
     * @return boolean
     */
    public function getPrep()
    {
        return $this->prep;
    }

    /**
     * Set prim
     *
     * @param boolean $prim
     * @return NomenclatureQuestionnaire
     */
    public function setPrim($prim)
    {
        $this->prim = $prim;

        return $this;
    }

    /**
     * Get prim
     *
     * @return boolean
     */
    public function getPrim()
    {
        return $this->prim;
    }

    /**
     * Set collgene
     *
     * @param boolean $collgene
     * @return NomenclatureQuestionnaire
     */
    public function setCollgene($collgene)
    {
        $this->collgene = $collgene;

        return $this;
    }

    /**
     * Get collgene
     *
     * @return boolean
     */
    public function getCollgene()
    {
        return $this->collgene;
    }

    /**
     * Set lyce
     *
     * @param boolean $lyce
     * @return NomenclatureQuestionnaire
     */
    public function setLyce($lyce)
    {
        $this->lyce = $lyce;

        return $this;
    }

    /**
     * Get lyce
     *
     * @return boolean
     */
    public function getLyce()
    {
        return $this->lyce;
    }

    /**
     * Set colltech
     *
     * @param boolean $colltech
     * @return NomenclatureQuestionnaire
     */
    public function setColltech($colltech)
    {
        $this->colltech = $colltech;

        return $this;
    }

    /**
     * Get colltech
     *
     * @return boolean
     */
    public function getColltech()
    {
        return $this->colltech;
    }

    /**
     * Set codeenti
     *
     * @param string $codeenti
     * @return NomenclatureQuestionnaire
     */
    public function setCodeenti($codeenti)
    {
        $this->codeenti = $codeenti;

        return $this;
    }

    /**
     * Get codeenti
     *
     * @return string
     */
    public function getCodeenti()
    {
        return $this->codeenti;
    }

    /**
     * Set routeclass
     *
     * @param string $routeclass
     * @return NomenclatureQuestionnaire
     */
    public function setRouteclass($routeclass)
    {
        $this->routeclass = $routeclass;

        return $this;
    }

    /**
     * Get routeclass
     *
     * @return string
     */
    public function getRouteclass()
    {
        return $this->routeclass;
    }
    public  function  __toString(){

        return ($this->getLibequesar())?$this->getLibequesar():"";
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureAnneenaissance
 *
 * @ORM\Table(name="nomenclature_anneenaissance")
 * @ORM\Entity
 */
class NomenclatureAnneenaissance
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeAnneNais", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeannenais;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeAnneNaisAr", type="string", length=50, nullable=true)
     */
    private $libeannenaisar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeAnneNaisFr", type="string", length=50, nullable=true)
     */
    private $libeannenaisfr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeAnneScol", type="string", length=50, nullable=true)
     */
    private $codeannescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCyclEnse", type="string", length=50, nullable=true)
     */
    private $codecyclense;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneNais", type="integer", nullable=true)
     */
    private $annenais;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrAffi", type="integer", nullable=true)
     */
    private $ordraffi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;

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
     * Set libeannenaisar
     *
     * @param string $libeannenaisar
     * @return NomenclatureAnneenaissance
     */
    public function setLibeannenaisar($libeannenaisar)
    {
        $this->libeannenaisar = $libeannenaisar;

        return $this;
    }

    /**
     * Get libeannenaisar
     *
     * @return string
     */
    public function getLibeannenaisar()
    {
        return $this->libeannenaisar;
    }

    /**
     * Set libeannenaisfr
     *
     * @param string $libeannenaisfr
     * @return NomenclatureAnneenaissance
     */
    public function setLibeannenaisfr($libeannenaisfr)
    {
        $this->libeannenaisfr = $libeannenaisfr;

        return $this;
    }

    /**
     * Get libeannenaisfr
     *
     * @return string
     */
    public function getLibeannenaisfr()
    {
        return $this->libeannenaisfr;
    }

    /**
     * Set codeannescol
     *
     * @param string $codeannescol
     * @return NomenclatureAnneenaissance
     */
    public function setCodeannescol($codeannescol)
    {
        $this->codeannescol = $codeannescol;

        return $this;
    }

    /**
     * Get codeannescol
     *
     * @return string
     */
    public function getCodeannescol()
    {
        return $this->codeannescol;
    }

    /**
     * Set codecyclense
     *
     * @param string $codecyclense
     * @return NomenclatureAnneenaissance
     */
    public function setCodecyclense($codecyclense)
    {
        $this->codecyclense = $codecyclense;

        return $this;
    }

    /**
     * Get codecyclense
     *
     * @return string
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }

    /**
     * Set annenais
     *
     * @param integer $annenais
     * @return NomenclatureAnneenaissance
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
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureAnneenaissance
     */
    public function setOrdraffi($ordraffi)
    {
        $this->ordraffi = $ordraffi;

        return $this;
    }

    /**
     * Get ordraffi
     *
     * @return integer
     */
    public function getOrdraffi()
    {
        return $this->ordraffi;
    }

    /**
     * Set acti
     *
     * @param boolean $acti
     * @return NomenclatureAnneenaissance
     */
    public function setActi($acti)
    {
        $this->acti = $acti;

        return $this;
    }

    /**
     * Get acti
     *
     * @return boolean
     */
    public function getActi()
    {
        return $this->acti;
    }

    /**
     * Set prep
     *
     * @param boolean $prep
     * @return NomenclatureAnneenaissance
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
     * @return NomenclatureAnneenaissance
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
     * @return NomenclatureAnneenaissance
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
     * @return NomenclatureAnneenaissance
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
     * @return NomenclatureAnneenaissance
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
     * Set effectiveeleve_niveauscolaire_anneenaissance
     *
     * @param \Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance $effectiveeleveNiveauscolaireAnneenaissance
     * @return NomenclatureAnneenaissance
     */
    public function setEffectiveeleveNiveauscolaireAnneenaissance(\Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance $effectiveeleveNiveauscolaireAnneenaissance = null)
    {
        $this->effectiveeleve_niveauscolaire_anneenaissance = $effectiveeleveNiveauscolaireAnneenaissance;

        return $this;
    }

    /**
     * Get effectiveeleve_niveauscolaire_anneenaissance
     *
     * @return \Sise\Bundle\CoreBundle\Entity\EffectiveeleveNiveauscolaireAnneenaissance
     */
    public function getEffectiveeleveNiveauscolaireAnneenaissance()
    {
        return $this->effectiveeleve_niveauscolaire_anneenaissance;
    }

    /**
     * Get codeannenais
     *
     * @return string
     */
    public function getCodeannenais()
    {
        return $this->codeannenais;
    }

    public function __toString(){


        return ($this->getLibeannenaisar())?$this->getLibeannenaisfr():"";
    }
}

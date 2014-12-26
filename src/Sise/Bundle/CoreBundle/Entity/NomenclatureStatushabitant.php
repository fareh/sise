<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureStatushabitant
 *
 * @ORM\Table(name="nomenclature_statushabitant")
 * @ORM\Entity
 */
class NomenclatureStatushabitant
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeStatHabi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codestathabi;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeStatHabiAr", type="string", length=50, nullable=true)
     */
    private $libestathabiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeStatHabiFr", type="string", length=50, nullable=true)
     */
    private $libestathabifr;

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
     * Get codestathabi
     *
     * @return string
     */
    public function getCodestathabi()
    {
        return $this->codestathabi;
    }

    /**
     * Set libestathabiar
     *
     * @param string $libestathabiar
     * @return NomenclatureStatushabitant
     */
    public function setLibestathabiar($libestathabiar)
    {
        $this->libestathabiar = $libestathabiar;

        return $this;
    }

    /**
     * Get libestathabiar
     *
     * @return string
     */
    public function getLibestathabiar()
    {
        return $this->libestathabiar;
    }

    /**
     * Set libestathabifr
     *
     * @param string $libestathabifr
     * @return NomenclatureStatushabitant
     */
    public function setLibestathabifr($libestathabifr)
    {
        $this->libestathabifr = $libestathabifr;

        return $this;
    }

    /**
     * Get libestathabifr
     *
     * @return string
     */
    public function getLibestathabifr()
    {
        return $this->libestathabifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureStatushabitant
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
     * @return NomenclatureStatushabitant
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
     * @return NomenclatureStatushabitant
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
     * @return NomenclatureStatushabitant
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
     * @return NomenclatureStatushabitant
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
     * @return NomenclatureStatushabitant
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
     * @return NomenclatureStatushabitant
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


    public function __toString()
    {


        return ($this->getLibestathabiar()) ? $this->getLibestathabiar() : "";
    }
}

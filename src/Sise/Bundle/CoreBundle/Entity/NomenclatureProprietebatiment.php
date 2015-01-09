<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureProprietebatiment
 *
 * @ORM\Table(name="nomenclature_proprietebatiment")
 * @ORM\Entity
 */
class NomenclatureProprietebatiment
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodePropBati", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codepropbati;

    /**
     * @var string
     *
     * @ORM\Column(name="LibePropBatiAr", type="string", length=50, nullable=true)
     */
    private $libepropbatiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibePropBatiFr", type="string", length=50, nullable=true)
     */
    private $libepropbatifr;

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
     * Get codepropbati
     *
     * @return string
     */
    public function getCodepropbati()
    {
        return $this->codepropbati;
    }

    /**
     * Set libepropbatiar
     *
     * @param string $libepropbatiar
     * @return NomenclatureProprietebatiment
     */
    public function setLibepropbatiar($libepropbatiar)
    {
        $this->libepropbatiar = $libepropbatiar;

        return $this;
    }

    /**
     * Get libepropbatiar
     *
     * @return string
     */
    public function getLibepropbatiar()
    {
        return $this->libepropbatiar;
    }

    /**
     * Set libepropbatifr
     *
     * @param string $libepropbatifr
     * @return NomenclatureProprietebatiment
     */
    public function setLibepropbatifr($libepropbatifr)
    {
        $this->libepropbatifr = $libepropbatifr;

        return $this;
    }

    /**
     * Get libepropbatifr
     *
     * @return string
     */
    public function getLibepropbatifr()
    {
        return $this->libepropbatifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureProprietebatiment
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
     * @return NomenclatureProprietebatiment
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
     * @return NomenclatureProprietebatiment
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
     * @return NomenclatureProprietebatiment
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
     * @return NomenclatureProprietebatiment
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
     * @return NomenclatureProprietebatiment
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
     * @return NomenclatureProprietebatiment
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
        return ($this->getLibepropbatiar())?$this->getLibepropbatiar():"";
    }
}

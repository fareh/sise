<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureTypeseparation
 *
 * @ORM\Table(name="nomenclature_typeseparation")
 * @ORM\Entity
 */
class NomenclatureTypeseparation
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeSepa", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypesepa;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeSepaAr", type="string", length=50, nullable=true)
     */
    private $libetypesepaar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeSepaFr", type="string", length=50, nullable=true)
     */
    private $libetypesepafr;

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
     * Get codetypesepa
     *
     * @return string
     */
    public function getCodetypesepa()
    {
        return $this->codetypesepa;
    }

    /**
     * Set libetypesepaar
     *
     * @param string $libetypesepaar
     * @return NomenclatureTypeseparation
     */
    public function setLibetypesepaar($libetypesepaar)
    {
        $this->libetypesepaar = $libetypesepaar;

        return $this;
    }

    /**
     * Get libetypesepaar
     *
     * @return string
     */
    public function getLibetypesepaar()
    {
        return $this->libetypesepaar;
    }

    /**
     * Set libetypesepafr
     *
     * @param string $libetypesepafr
     * @return NomenclatureTypeseparation
     */
    public function setLibetypesepafr($libetypesepafr)
    {
        $this->libetypesepafr = $libetypesepafr;

        return $this;
    }

    /**
     * Get libetypesepafr
     *
     * @return string
     */
    public function getLibetypesepafr()
    {
        return $this->libetypesepafr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypeseparation
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
     * @return NomenclatureTypeseparation
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
     * @return NomenclatureTypeseparation
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
     * @return NomenclatureTypeseparation
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
     * @return NomenclatureTypeseparation
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
     * @return NomenclatureTypeseparation
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
     * @return NomenclatureTypeseparation
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
        return $this->codetypesepa;
    }
}

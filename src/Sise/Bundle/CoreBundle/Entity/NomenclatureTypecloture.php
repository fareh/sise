<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureTypeclotureType;
/**
 * NomenclatureTypecloture
 *
 * @ORM\Table(name="nomenclature_typecloture")
 * @ORM\Entity
 */
class NomenclatureTypecloture
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeClot", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypeclot;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeClotAr", type="string", length=50, nullable=true)
     */
    private $libetypeclotar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeClotFr", type="string", length=50, nullable=true)
     */
    private $libetypeclotfr;

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
     * Get codetypeclot
     *
     * @return string
     */
    public function getCodetypeclot()
    {
        return $this->codetypeclot;
    }

    /**
     * Set libetypeclotar
     *
     * @param string $libetypeclotar
     * @return NomenclatureTypecloture
     */
    public function setLibetypeclotar($libetypeclotar)
    {
        $this->libetypeclotar = $libetypeclotar;

        return $this;
    }

    /**
     * Get libetypeclotar
     *
     * @return string
     */
    public function getLibetypeclotar()
    {
        return $this->libetypeclotar;
    }

    /**
     * Set libetypeclotfr
     *
     * @param string $libetypeclotfr
     * @return NomenclatureTypecloture
     */
    public function setLibetypeclotfr($libetypeclotfr)
    {
        $this->libetypeclotfr = $libetypeclotfr;

        return $this;
    }

    /**
     * Get libetypeclotfr
     *
     * @return string
     */
    public function getLibetypeclotfr()
    {
        return $this->libetypeclotfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypecloture
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
     * @return NomenclatureTypecloture
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
     * @return NomenclatureTypecloture
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
     * @return NomenclatureTypecloture
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
     * @return NomenclatureTypecloture
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
     * @return NomenclatureTypecloture
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
     * @return NomenclatureTypecloture
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
    public function iterateVisible() {
        //   echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            $indice[]=$key;
        }
        return $indice;
    }
    public function getinstanceType() {
        //   echo "MyClass::iterateVisible:\n";
        $instancetype=new NomenclatureTypeclotureType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codetypeclot;
    }
}

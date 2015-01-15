<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureTypehandicapType;
/**
 * NomenclatureTypehandicap
 *
 * @ORM\Table(name="nomenclature_typehandicap")
 * @ORM\Entity
 */
class NomenclatureTypehandicap
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeHand", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypehand;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeHandAr", type="string", length=50, nullable=true)
     */
    private $libetypehandar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeHandFr", type="string", length=50, nullable=true)
     */
    private $libetypehandfr;

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
     * Get codetypehand
     *
     * @return string
     */
    public function getCodetypehand()
    {
        return $this->codetypehand;
    }

    /**
     * Set libetypehandar
     *
     * @param string $libetypehandar
     * @return NomenclatureTypehandicap
     */
    public function setLibetypehandar($libetypehandar)
    {
        $this->libetypehandar = $libetypehandar;

        return $this;
    }

    /**
     * Get libetypehandar
     *
     * @return string
     */
    public function getLibetypehandar()
    {
        return $this->libetypehandar;
    }

    /**
     * Set libetypehandfr
     *
     * @param string $libetypehandfr
     * @return NomenclatureTypehandicap
     */
    public function setLibetypehandfr($libetypehandfr)
    {
        $this->libetypehandfr = $libetypehandfr;

        return $this;
    }

    /**
     * Get libetypehandfr
     *
     * @return string
     */
    public function getLibetypehandfr()
    {
        return $this->libetypehandfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypehandicap
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
     * @return NomenclatureTypehandicap
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
     * @return NomenclatureTypehandicap
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
     * @return NomenclatureTypehandicap
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
     * @return NomenclatureTypehandicap
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
     * @return NomenclatureTypehandicap
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
     * @return NomenclatureTypehandicap
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


    public  function  __toString(){


        return ($this->getLibetypehandar())?$this->getLibetypehandar():"";
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
        $instancetype=new NomenclatureTypehandicapType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codetypehand;
    }
}

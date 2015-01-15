<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureCategorienationaliteType;
/**
 * NomenclatureCategorienationalite
 *
 * @ORM\Table(name="nomenclature_categorienationalite")
 * @ORM\Entity
 */
class NomenclatureCategorienationalite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCateNati", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecatenati;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateNatiAr", type="string", length=50, nullable=true)
     */
    private $libecatenatiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateNatiFr", type="string", length=50, nullable=true)
     */
    private $libecatenatifr;

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
     * Get codecatenati
     *
     * @return string
     */
    public function getCodecatenati()
    {
        return $this->codecatenati;
    }

    /**
     * Set libecatenatiar
     *
     * @param string $libecatenatiar
     * @return NomenclatureCategorienationalite
     */
    public function setLibecatenatiar($libecatenatiar)
    {
        $this->libecatenatiar = $libecatenatiar;

        return $this;
    }

    /**
     * Get libecatenatiar
     *
     * @return string
     */
    public function getLibecatenatiar()
    {
        return $this->libecatenatiar;
    }

    /**
     * Set libecatenatifr
     *
     * @param string $libecatenatifr
     * @return NomenclatureCategorienationalite
     */
    public function setLibecatenatifr($libecatenatifr)
    {
        $this->libecatenatifr = $libecatenatifr;

        return $this;
    }

    /**
     * Get libecatenatifr
     *
     * @return string
     */
    public function getLibecatenatifr()
    {
        return $this->libecatenatifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCategorienationalite
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
     * @return NomenclatureCategorienationalite
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
     * @return NomenclatureCategorienationalite
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
     * @return NomenclatureCategorienationalite
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
     * @return NomenclatureCategorienationalite
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
     * @return NomenclatureCategorienationalite
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
     * @return NomenclatureCategorienationalite
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
        $instancetype=new NomenclatureCategorienationaliteType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codecatenati;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureBassinpedagogiqueType;
/**
 * NomenclatureBassinpedagogique
 *
 * @ORM\Table(name="nomenclature_bassinpedagogique", indexes={@ORM\Index(name="FK_Nomenclature_BassinPedagogique_Nomenclature_Delegation", columns={"CodeDele"})})
 * @ORM\Entity
 */
class NomenclatureBassinpedagogique
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeBassPeda", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codebasspeda;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeBassPedaAr", type="string", length=50, nullable=true)
     */
    private $libebasspedaar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeBassPedaFr", type="string", length=50, nullable=true)
     */
    private $libebasspedafr;

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
     * @var NomenclatureDelegation
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureDelegation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeDele", referencedColumnName="CodeDele")
     * })
     */
    private $codedele;

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
     * Get codebasspeda
     *
     * @return string
     */
    public function getCodebasspeda()
    {
        return $this->codebasspeda;
    }

    /**
     * Set libebasspedaar
     *
     * @param string $libebasspedaar
     * @return NomenclatureBassinpedagogique
     */
    public function setLibebasspedaar($libebasspedaar)
    {
        $this->libebasspedaar = $libebasspedaar;

        return $this;
    }

    /**
     * Get libebasspedaar
     *
     * @return string
     */
    public function getLibebasspedaar()
    {
        return $this->libebasspedaar;
    }

    /**
     * Set libebasspedafr
     *
     * @param string $libebasspedafr
     * @return NomenclatureBassinpedagogique
     */
    public function setLibebasspedafr($libebasspedafr)
    {
        $this->libebasspedafr = $libebasspedafr;

        return $this;
    }

    /**
     * Get libebasspedafr
     *
     * @return string
     */
    public function getLibebasspedafr()
    {
        return $this->libebasspedafr;
    }

    /**
     * Set codedele
     *
     * @param string $codedele
     * @return NomenclatureBassinpedagogique
     */
    public function setCodedele($codedele)
    {
        $this->codedele = $codedele;

        return $this;
    }

    /**
     * Get codedele
     *
     * @return string
     */
    public function getCodedele()
    {
        return $this->codedele;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureBassinpedagogique
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
     * @return NomenclatureBassinpedagogique
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
     * @return NomenclatureBassinpedagogique
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
     * @return NomenclatureBassinpedagogique
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
     * @return NomenclatureBassinpedagogique
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
     * @return NomenclatureBassinpedagogique
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
     * @return NomenclatureBassinpedagogique
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
        $instancetype=new NomenclatureBassinpedagogiqueType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codebasspeda;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureEquipementType;
/**
 * NomenclatureEquipement
 *
 * @ORM\Table(name="nomenclature_equipement", indexes={@ORM\Index(name="FK_Nomenclature_Equipement_Nomenclature_CategorieEquipement", columns={"CodeCateEqui"})})
 * @ORM\Entity
 */
class NomenclatureEquipement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEqui", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeequi;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeEquiAr", type="string", length=50, nullable=true)
     */
    private $libeequiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeEquiFr", type="string", length=50, nullable=true)
     */
    private $libeequifr;

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
     * @ORM\ManyToOne(targetEntity="NomenclatureCategorieequipement", inversedBy="codeequi")
     * @ORM\JoinColumn(name="CodeCateEqui", referencedColumnName="CodeCateEqui")
     */
    protected $codecateequi;

    /**
     * Get codeequi
     *
     * @return string
     */
    public function getCodeequi()
    {
        return $this->codeequi;
    }

    /**
     * Set libeequiar
     *
     * @param string $libeequiar
     * @return NomenclatureEquipement
     */
    public function setLibeequiar($libeequiar)
    {
        $this->libeequiar = $libeequiar;

        return $this;
    }

    /**
     * Get libeequiar
     *
     * @return string
     */
    public function getLibeequiar()
    {
        return $this->libeequiar;
    }

    /**
     * Set libeequifr
     *
     * @param string $libeequifr
     * @return NomenclatureEquipement
     */
    public function setLibeequifr($libeequifr)
    {
        $this->libeequifr = $libeequifr;

        return $this;
    }

    /**
     * Get libeequifr
     *
     * @return string
     */
    public function getLibeequifr()
    {
        return $this->libeequifr;
    }


    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureEquipement
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
     * @return NomenclatureEquipement
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
     * @return NomenclatureEquipement
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
     * @return NomenclatureEquipement
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
     * @return NomenclatureEquipement
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
     * @return NomenclatureEquipement
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
     * @return NomenclatureEquipement
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
     * Set codecateequi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieequipement $codecateequi
     * @return NomenclatureEquipement
     */
    public function setCodecateequi(\Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieequipement $codecateequi = null)
    {
        $this->codecateequi = $codecateequi;

        return $this;
    }

    /**
     * Get codecateequi
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieequipement
     */
    public function getCodecateequi()
    {
        return $this->codecateequi;
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
        $instancetype=new NomenclatureEquipementType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codeequi;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureActiviteType;
/**
 * NomenclatureActivite
 *
 * @ORM\Table(name="nomenclature_activite", indexes={@ORM\Index(name="FK_Nomenclature_Activite_Nomenclature_CategorieActivite", columns={"CodeCateActi"})})
 * @ORM\Entity
 */
class NomenclatureActivite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeActi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeacti;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeActiAr", type="string", length=50, nullable=false)
     */
    private $libeactiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeActiFr", type="string", length=50, nullable=false)
     */
    private $libeactifr;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrAffi", type="integer", nullable=false)
     */
    private $ordraffi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;

    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureCategorieactivite", inversedBy="codeacti")
     * @ORM\JoinColumn(name="CodeCateActi", referencedColumnName="CodeCateActi")
     */
    protected $codecateacti;

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
     * Get codeacti
     *
     * @return string
     */
    public function getCodeacti()
    {
        return $this->codeacti;
    }

    /**
     * Set libeactiar
     *
     * @param string $libeactiar
     * @return NomenclatureActivite
     */
    public function setLibeactiar($libeactiar)
    {
        $this->libeactiar = $libeactiar;

        return $this;
    }

    /**
     * Get libeactiar
     *
     * @return string
     */
    public function getLibeactiar()
    {
        return $this->libeactiar;
    }

    /**
     * Set libeactifr
     *
     * @param string $libeactifr
     * @return NomenclatureActivite
     */
    public function setLibeactifr($libeactifr)
    {
        $this->libeactifr = $libeactifr;

        return $this;
    }

    /**
     * Get libeactifr
     *
     * @return string
     */
    public function getLibeactifr()
    {
        return $this->libeactifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureActivite
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
     * @return NomenclatureActivite
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
     * @return NomenclatureActivite
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
     * @return NomenclatureActivite
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
     * @return NomenclatureActivite
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
     * @return NomenclatureActivite
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
     * @return NomenclatureActivite
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
     * Set codecateacti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieactivite $codecateacti
     * @return NomenclatureActivite
     */
    public function setCodecateacti(\Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieactivite $codecateacti = null)
    {
        $this->codecateacti = $codecateacti;

        return $this;
    }

    /**
     * Get codecateacti
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieactivite
     */
    public function getCodecateacti()
    {
        return $this->codecateacti;
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
        $instancetype=new NomenclatureActiviteType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codeacti;
    }
}

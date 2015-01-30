<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureTypeespaceType;
/**
 * NomenclatureTypeespace
 *
 * @ORM\Table(name="nomenclature_typeespace", indexes={@ORM\Index(name="FK_Nomenclature_TypeEspace_Nomenclature_CategorieEspace", columns={"CodeCateEspa"})})
 * @ORM\Entity
 */
class NomenclatureTypeespace
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEspa", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeespa;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeEspaAr", type="string", length=50, nullable=true)
     */
    private $libetypeespaar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeEspaFr", type="string", length=50, nullable=true)
     */
    private $libetypeespafr;

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
     * @ORM\ManyToOne(targetEntity="NomenclatureCategorieespace", inversedBy="codetypeespa")
     * @ORM\JoinColumn(name="CodeCateEspa", referencedColumnName="CodeCateEspa")
     */
    protected $codecateespa;

    /**
     * Get codetypeespa
     *
     * @return string
     */
    public function getCodetypeespa()
    {
        return $this->codetypeespa;
    }

    /**
     * Set libetypeespaar
     *
     * @param string $libetypeespaar
     * @return NomenclatureTypeespace
     */
    public function setLibetypeespaar($libetypeespaar)
    {
        $this->libetypeespaar = $libetypeespaar;

        return $this;
    }

    /**
     * Get libetypeespaar
     *
     * @return string
     */
    public function getLibetypeespaar()
    {
        return $this->libetypeespaar;
    }

    /**
     * Set libetypeespafr
     *
     * @param string $libetypeespafr
     * @return NomenclatureTypeespace
     */
    public function setLibetypeespafr($libetypeespafr)
    {
        $this->libetypeespafr = $libetypeespafr;

        return $this;
    }

    /**
     * Get libetypeespafr
     *
     * @return string
     */
    public function getLibetypeespafr()
    {
        return $this->libetypeespafr;
    }


    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypeespace
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
     * @return NomenclatureTypeespace
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
     * @return NomenclatureTypeespace
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
     * @return NomenclatureTypeespace
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
     * @return NomenclatureTypeespace
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
     * @return NomenclatureTypeespace
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
     * @return NomenclatureTypeespace
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
     * Set codecateespa
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieespace $codecateespa
     * @return NomenclatureTypeespace
     */
    public function setCodecateespa(\Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieespace $codecateespa = null)
    {
        $this->codecateespa = $codecateespa;

        return $this;
    }

    /**
     * Get codecateespa
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCategorieespace
     */
    public function getCodecateespa()
    {
        return $this->codecateespa;
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
        $instancetype=new NomenclatureTypeespaceType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codetypeespa;
    }
}

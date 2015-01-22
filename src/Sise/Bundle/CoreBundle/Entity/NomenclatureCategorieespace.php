<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureCategorieespaceType;

/**
 * NomenclatureCategorieespace
 *
 * @ORM\Table(name="nomenclature_categorieespace")
 * @ORM\Entity
 */
class NomenclatureCategorieespace
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCateEspa", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codecateespa;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateEspaAr", type="string", length=50, nullable=true)
     */
    private $libecateespaar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateEspaFr", type="string", length=50, nullable=true)
     */
    private $libecateespafr;

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
     * @ORM\OneToMany(targetEntity="NomenclatureTypeespace", mappedBy="codecateespa")
     */
    protected $codetypeespa;

    public function __construct()
    {
        $this->codetypeespa = new ArrayCollection();
    }

    /**
     * Get codecateespa
     *
     * @return string
     */
    public function getCodecateespa()
    {
        return $this->codecateespa;
    }

    /**
     * Set libecateespaar
     *
     * @param string $libecateespaar
     * @return NomenclatureCategorieespace
     */
    public function setLibecateespaar($libecateespaar)
    {
        $this->libecateespaar = $libecateespaar;

        return $this;
    }

    /**
     * Get libecateespaar
     *
     * @return string
     */
    public function getLibecateespaar()
    {
        return $this->libecateespaar;
    }

    /**
     * Set libecateespafr
     *
     * @param string $libecateespafr
     * @return NomenclatureCategorieespace
     */
    public function setLibecateespafr($libecateespafr)
    {
        $this->libecateespafr = $libecateespafr;

        return $this;
    }

    /**
     * Get libecateespafr
     *
     * @return string
     */
    public function getLibecateespafr()
    {
        return $this->libecateespafr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCategorieespace
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
     * @return NomenclatureCategorieespace
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
     * @return NomenclatureCategorieespace
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
     * @return NomenclatureCategorieespace
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
     * @return NomenclatureCategorieespace
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
     * @return NomenclatureCategorieespace
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
     * @return NomenclatureCategorieespace
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
     * Add codetypeespa
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace $codetypeespa
     * @return NomenclatureCategorieespace
     */
    public function addCodetypeespa(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace $codetypeespa)
    {
        $this->codetypeespa[] = $codetypeespa;

        return $this;
    }

    /**
     * Remove codetypeespa
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace $codetypeespa
     */
    public function removeCodetypeespa(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypeespace $codetypeespa)
    {
        $this->codetypeespa->removeElement($codetypeespa);
    }

    /**
     * Get codetypeespa
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodetypeespa()
    {
        return $this->codetypeespa;
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
        $instancetype=new NomenclatureCategorieespaceType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codecateespa;
    }
}

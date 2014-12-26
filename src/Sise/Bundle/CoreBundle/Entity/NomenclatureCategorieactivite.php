<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NomenclatureCategorieactivite
 *
 * @ORM\Table(name="nomenclature_categorieactivite")
 * @ORM\Entity
 */
class NomenclatureCategorieactivite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCateActi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecateacti;


    /**
     * @ORM\OneToMany(targetEntity="NomenclatureActivite", mappedBy="codecateacti")
     */
    protected $codeacti;

    public function __construct()
    {
        $this->codeacti = new ArrayCollection();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateActiAr", type="string", length=50, nullable=true)
     */
    private $libecateactiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateActiFr", type="string", length=50, nullable=true)
     */
    private $libecateactifr;

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
     * Get codecateacti
     *
     * @return string
     */
    public function getCodecateacti()
    {
        return $this->codecateacti;
    }

    /**
     * Set libecateactiar
     *
     * @param string $libecateactiar
     * @return NomenclatureCategorieactivite
     */
    public function setLibecateactiar($libecateactiar)
    {
        $this->libecateactiar = $libecateactiar;

        return $this;
    }

    /**
     * Get libecateactiar
     *
     * @return string
     */
    public function getLibecateactiar()
    {
        return $this->libecateactiar;
    }

    /**
     * Set libecateactifr
     *
     * @param string $libecateactifr
     * @return NomenclatureCategorieactivite
     */
    public function setLibecateactifr($libecateactifr)
    {
        $this->libecateactifr = $libecateactifr;

        return $this;
    }

    /**
     * Get libecateactifr
     *
     * @return string
     */
    public function getLibecateactifr()
    {
        return $this->libecateactifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCategorieactivite
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
     * @return NomenclatureCategorieactivite
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
     * @return NomenclatureCategorieactivite
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
     * @return NomenclatureCategorieactivite
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
     * @return NomenclatureCategorieactivite
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
     * @return NomenclatureCategorieactivite
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
     * @return NomenclatureCategorieactivite
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
     * Add codeacti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureActivite $codeacti
     * @return NomenclatureCategorieactivite
     */
    public function addCodeacti(\Sise\Bundle\CoreBundle\Entity\NomenclatureActivite $codeacti)
    {
        $this->codeacti[] = $codeacti;

        return $this;
    }

    /**
     * Remove codeacti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureActivite $codeacti
     */
    public function removeCodeacti(\Sise\Bundle\CoreBundle\Entity\NomenclatureActivite $codeacti)
    {
        $this->codeacti->removeElement($codeacti);
    }

    /**
     * Get codeacti
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodeacti()
    {
        return $this->codeacti;
    }
}

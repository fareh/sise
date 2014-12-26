<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NomenclatureCategorieequipement
 *
 * @ORM\Table(name="nomenclature_categorieequipement")
 * @ORM\Entity
 */
class NomenclatureCategorieequipement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCateEqui", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecateequi;

    /**
     * @ORM\OneToMany(targetEntity="NomenclatureEquipement", mappedBy="codecateequi")
     */
    protected $codeequi;

    public function __construct()
    {
        $this->codeequi = new ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateEquiAr", type="string", length=50, nullable=true)
     */
    private $libecateequiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateEquiFr", type="string", length=50, nullable=true)
     */
    private $libecateequifr;

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
     * Get codecateequi
     *
     * @return string
     */
    public function getCodecateequi()
    {
        return $this->codecateequi;
    }

    /**
     * Set libecateequiar
     *
     * @param string $libecateequiar
     * @return NomenclatureCategorieequipement
     */
    public function setLibecateequiar($libecateequiar)
    {
        $this->libecateequiar = $libecateequiar;

        return $this;
    }

    /**
     * Get libecateequiar
     *
     * @return string
     */
    public function getLibecateequiar()
    {
        return $this->libecateequiar;
    }

    /**
     * Set libecateequifr
     *
     * @param string $libecateequifr
     * @return NomenclatureCategorieequipement
     */
    public function setLibecateequifr($libecateequifr)
    {
        $this->libecateequifr = $libecateequifr;

        return $this;
    }

    /**
     * Get libecateequifr
     *
     * @return string
     */
    public function getLibecateequifr()
    {
        return $this->libecateequifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCategorieequipement
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
     * @return NomenclatureCategorieequipement
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
     * @return NomenclatureCategorieequipement
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
     * @return NomenclatureCategorieequipement
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
     * @return NomenclatureCategorieequipement
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
     * @return NomenclatureCategorieequipement
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
     * @return NomenclatureCategorieequipement
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
     * Add codeequi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEquipement $codeequi
     * @return NomenclatureCategorieequipement
     */
    public function addCodeequi(\Sise\Bundle\CoreBundle\Entity\NomenclatureEquipement $codeequi)
    {
        $this->codeequi[] = $codeequi;

        return $this;
    }

    /**
     * Remove codeequi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEquipement $codeequi
     */
    public function removeCodeequi(\Sise\Bundle\CoreBundle\Entity\NomenclatureEquipement $codeequi)
    {
        $this->codeequi->removeElement($codeequi);
    }

    /**
     * Get codeequi
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodeequi()
    {
        return $this->codeequi;
    }
}

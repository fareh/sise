<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureTypelogement
 *
 * @ORM\Table(name="nomenclature_typelogement")
 * @ORM\Entity
 */
class NomenclatureTypelogement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeLoge", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypeloge;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeLogeAr", type="string", length=50, nullable=true)
     */
    private $libetypelogear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeLogeFr", type="string", length=50, nullable=true)
     */
    private $libetypelogefr;

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
     * Get codetypeloge
     *
     * @return string 
     */
    public function getCodetypeloge()
    {
        return $this->codetypeloge;
    }

    /**
     * Set libetypelogear
     *
     * @param string $libetypelogear
     * @return NomenclatureTypelogement
     */
    public function setLibetypelogear($libetypelogear)
    {
        $this->libetypelogear = $libetypelogear;

        return $this;
    }

    /**
     * Get libetypelogear
     *
     * @return string 
     */
    public function getLibetypelogear()
    {
        return $this->libetypelogear;
    }

    /**
     * Set libetypelogefr
     *
     * @param string $libetypelogefr
     * @return NomenclatureTypelogement
     */
    public function setLibetypelogefr($libetypelogefr)
    {
        $this->libetypelogefr = $libetypelogefr;

        return $this;
    }

    /**
     * Get libetypelogefr
     *
     * @return string 
     */
    public function getLibetypelogefr()
    {
        return $this->libetypelogefr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypelogement
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
     * @return NomenclatureTypelogement
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
     * @return NomenclatureTypelogement
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
     * @return NomenclatureTypelogement
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
     * @return NomenclatureTypelogement
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
     * @return NomenclatureTypelogement
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
     * @return NomenclatureTypelogement
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
}

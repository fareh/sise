<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureTypeconnxioninternet
 *
 * @ORM\Table(name="nomenclature_typeconnxioninternet")
 * @ORM\Entity
 */
class NomenclatureTypeconnxioninternet
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeConnInte", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypeconninte;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeConnInteAr", type="string", length=50, nullable=true)
     */
    private $libetypeconnintear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeConnInteFr", type="string", length=50, nullable=true)
     */
    private $libetypeconnintefr;

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
     * Get codetypeconninte
     *
     * @return string
     */
    public function getCodetypeconninte()
    {
        return $this->codetypeconninte;
    }

    /**
     * Set libetypeconnintear
     *
     * @param string $libetypeconnintear
     * @return NomenclatureTypeconnxioninternet
     */
    public function setLibetypeconnintear($libetypeconnintear)
    {
        $this->libetypeconnintear = $libetypeconnintear;

        return $this;
    }

    /**
     * Get libetypeconnintear
     *
     * @return string
     */
    public function getLibetypeconnintear()
    {
        return $this->libetypeconnintear;
    }

    /**
     * Set libetypeconnintefr
     *
     * @param string $libetypeconnintefr
     * @return NomenclatureTypeconnxioninternet
     */
    public function setLibetypeconnintefr($libetypeconnintefr)
    {
        $this->libetypeconnintefr = $libetypeconnintefr;

        return $this;
    }

    /**
     * Get libetypeconnintefr
     *
     * @return string
     */
    public function getLibetypeconnintefr()
    {
        return $this->libetypeconnintefr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypeconnxioninternet
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
     * @return NomenclatureTypeconnxioninternet
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
     * @return NomenclatureTypeconnxioninternet
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
     * @return NomenclatureTypeconnxioninternet
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
     * @return NomenclatureTypeconnxioninternet
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
     * @return NomenclatureTypeconnxioninternet
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
     * @return NomenclatureTypeconnxioninternet
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

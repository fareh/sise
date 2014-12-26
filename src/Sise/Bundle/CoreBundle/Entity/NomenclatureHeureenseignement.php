<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureHeureenseignement
 *
 * @ORM\Table(name="nomenclature_heureenseignement")
 * @ORM\Entity
 */
class NomenclatureHeureenseignement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeHeurEnse", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeheurense;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeHeurEnseAr", type="string", length=50, nullable=true)
     */
    private $libeheurensear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeHeurEnseFr", type="string", length=50, nullable=true)
     */
    private $libeheurensefr;

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
     * Get codeheurense
     *
     * @return string
     */
    public function getCodeheurense()
    {
        return $this->codeheurense;
    }

    /**
     * Set libeheurensear
     *
     * @param string $libeheurensear
     * @return NomenclatureHeureenseignement
     */
    public function setLibeheurensear($libeheurensear)
    {
        $this->libeheurensear = $libeheurensear;

        return $this;
    }

    /**
     * Get libeheurensear
     *
     * @return string
     */
    public function getLibeheurensear()
    {
        return $this->libeheurensear;
    }

    /**
     * Set libeheurensefr
     *
     * @param string $libeheurensefr
     * @return NomenclatureHeureenseignement
     */
    public function setLibeheurensefr($libeheurensefr)
    {
        $this->libeheurensefr = $libeheurensefr;

        return $this;
    }

    /**
     * Get libeheurensefr
     *
     * @return string
     */
    public function getLibeheurensefr()
    {
        return $this->libeheurensefr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureHeureenseignement
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
     * @return NomenclatureHeureenseignement
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
     * @return NomenclatureHeureenseignement
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
     * @return NomenclatureHeureenseignement
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
     * @return NomenclatureHeureenseignement
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
     * @return NomenclatureHeureenseignement
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
     * @return NomenclatureHeureenseignement
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

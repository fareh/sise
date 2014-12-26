<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureLangueenseignement
 *
 * @ORM\Table(name="nomenclature_langueenseignement")
 * @ORM\Entity
 */
class NomenclatureLangueenseignement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeLangEnse", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codelangense;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeLangEnseAr", type="string", length=50, nullable=false)
     */
    private $libelangensear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeLangEnseFr", type="string", length=50, nullable=false)
     */
    private $libelangensefr;

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
     * Get codelangense
     *
     * @return string
     */
    public function getCodelangense()
    {
        return $this->codelangense;
    }

    /**
     * Set libelangensear
     *
     * @param string $libelangensear
     * @return NomenclatureLangueenseignement
     */
    public function setLibelangensear($libelangensear)
    {
        $this->libelangensear = $libelangensear;

        return $this;
    }

    /**
     * Get libelangensear
     *
     * @return string
     */
    public function getLibelangensear()
    {
        return $this->libelangensear;
    }

    /**
     * Set libelangensefr
     *
     * @param string $libelangensefr
     * @return NomenclatureLangueenseignement
     */
    public function setLibelangensefr($libelangensefr)
    {
        $this->libelangensefr = $libelangensefr;

        return $this;
    }

    /**
     * Get libelangensefr
     *
     * @return string
     */
    public function getLibelangensefr()
    {
        return $this->libelangensefr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureLangueenseignement
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
     * @return NomenclatureLangueenseignement
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
     * @return NomenclatureLangueenseignement
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
     * @return NomenclatureLangueenseignement
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
     * @return NomenclatureLangueenseignement
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
     * @return NomenclatureLangueenseignement
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
     * @return NomenclatureLangueenseignement
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

    public function __toString()
    {
        return $this->codelangense;
    }
}

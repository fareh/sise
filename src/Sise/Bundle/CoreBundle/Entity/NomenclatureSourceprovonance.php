<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureSourceprovonance
 *
 * @ORM\Table(name="nomenclature_sourceprovonance")
 * @ORM\Entity
 */
class NomenclatureSourceprovonance
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeSourProv", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codesourprov;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSourProvAr", type="string", length=50, nullable=true)
     */
    private $libesourprovar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSourProvFr", type="string", length=50, nullable=true)
     */
    private $libesourprovfr;

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
     * Get codesourprov
     *
     * @return string
     */
    public function getCodesourprov()
    {
        return $this->codesourprov;
    }

    /**
     * Set libesourprovar
     *
     * @param string $libesourprovar
     * @return NomenclatureSourceprovonance
     */
    public function setLibesourprovar($libesourprovar)
    {
        $this->libesourprovar = $libesourprovar;

        return $this;
    }

    /**
     * Get libesourprovar
     *
     * @return string
     */
    public function getLibesourprovar()
    {
        return $this->libesourprovar;
    }

    /**
     * Set libesourprovfr
     *
     * @param string $libesourprovfr
     * @return NomenclatureSourceprovonance
     */
    public function setLibesourprovfr($libesourprovfr)
    {
        $this->libesourprovfr = $libesourprovfr;

        return $this;
    }

    /**
     * Get libesourprovfr
     *
     * @return string
     */
    public function getLibesourprovfr()
    {
        return $this->libesourprovfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureSourceprovonance
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
     * @return NomenclatureSourceprovonance
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
     * @return NomenclatureSourceprovonance
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
     * @return NomenclatureSourceprovonance
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
     * @return NomenclatureSourceprovonance
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
     * @return NomenclatureSourceprovonance
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
     * @return NomenclatureSourceprovonance
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

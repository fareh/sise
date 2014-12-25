<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NomenclatureDisposition
 *
 * @ORM\Table(name="nomenclature_disposition")
 * @ORM\Entity
 */
class NomenclatureDisposition
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeDisp", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypedisp;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateActiAr", type="string", length=50, nullable=true)
     */
    private $libetypedispar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateActiFr", type="string", length=50, nullable=true)
     */
    private $libetypedispfr;

    /**
     * @var \NomenclatureProprietebatiment
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureProprietebatiment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodePropBati", referencedColumnName="CodePropBati")
     * })
     */
    private $codesitufonc;

    /**
     * @return \NomenclatureProprietebatiment
     */
    public function getCodesitufonc()
    {
        return $this->codesitufonc;
    }

    /**
     * @param \NomenclatureProprietebatiment $codesitufonc
     */
    public function setCodesitufonc($codesitufonc)
    {
        $this->codesitufonc = $codesitufonc;
    }

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
     * Get codetypedisp
     *
     * @return string
     */
    public function getCodetypedisp()
    {
        return $this->codetypedisp;
    }

    /**
     * Set libetypedispar
     *
     * @param string $libetypedispar
     * @return NomenclatureDisposition
     */
    public function setLibetypedispar($libetypedispar)
    {
        $this->libetypedispar = $libetypedispar;

        return $this;
    }

    /**
     * Get libetypedispar
     *
     * @return string
     */
    public function getLibetypedispar()
    {
        return $this->libetypedispar;
    }

    /**
     * Set libetypedispfr
     *
     * @param string $libetypedispfr
     * @return NomenclatureDisposition
     */
    public function setLibetypedispfr($libetypedispfr)
    {
        $this->libetypedispfr = $libetypedispfr;

        return $this;
    }

    /**
     * Get libetypedispfr
     *
     * @return string
     */
    public function getLibetypedispfr()
    {
        return $this->libetypedispfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureDisposition
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
     * @return NomenclatureDisposition
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
     * @return NomenclatureDisposition
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
     * @return NomenclatureDisposition
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
     * @return NomenclatureDisposition
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
     * @return NomenclatureDisposition
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
     * @return NomenclatureDisposition
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

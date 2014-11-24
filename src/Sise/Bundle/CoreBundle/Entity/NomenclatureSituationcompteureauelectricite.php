<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureSituationcompteureauelectricite
 *
 * @ORM\Table(name="nomenclature_situationcompteureauelectricite")
 * @ORM\Entity
 */
class NomenclatureSituationcompteureauelectricite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeSituComp", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codesitucomp;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituCompAr", type="string", length=50, nullable=true)
     */
    private $libesitucompar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituCompFr", type="string", length=50, nullable=true)
     */
    private $libesitucompfr;

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
     * Get codesitucomp
     *
     * @return string 
     */
    public function getCodesitucomp()
    {
        return $this->codesitucomp;
    }

    /**
     * Set libesitucompar
     *
     * @param string $libesitucompar
     * @return NomenclatureSituationcompteureauelectricite
     */
    public function setLibesitucompar($libesitucompar)
    {
        $this->libesitucompar = $libesitucompar;

        return $this;
    }

    /**
     * Get libesitucompar
     *
     * @return string 
     */
    public function getLibesitucompar()
    {
        return $this->libesitucompar;
    }

    /**
     * Set libesitucompfr
     *
     * @param string $libesitucompfr
     * @return NomenclatureSituationcompteureauelectricite
     */
    public function setLibesitucompfr($libesitucompfr)
    {
        $this->libesitucompfr = $libesitucompfr;

        return $this;
    }

    /**
     * Get libesitucompfr
     *
     * @return string 
     */
    public function getLibesitucompfr()
    {
        return $this->libesitucompfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureSituationcompteureauelectricite
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
     * @return NomenclatureSituationcompteureauelectricite
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
     * @return NomenclatureSituationcompteureauelectricite
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
     * @return NomenclatureSituationcompteureauelectricite
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
     * @return NomenclatureSituationcompteureauelectricite
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
     * @return NomenclatureSituationcompteureauelectricite
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
     * @return NomenclatureSituationcompteureauelectricite
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

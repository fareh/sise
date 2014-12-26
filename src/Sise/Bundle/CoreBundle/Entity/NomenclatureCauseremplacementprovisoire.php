<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureCauseremplacementprovisoire
 *
 * @ORM\Table(name="nomenclature_causeremplacementprovisoire")
 * @ORM\Entity
 */
class NomenclatureCauseremplacementprovisoire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCausRempProv", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecausrempprov;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCausRempProvAr", type="string", length=50, nullable=true)
     */
    private $libecausrempprovar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCausRempProvFr", type="string", length=50, nullable=true)
     */
    private $libecausrempprovfr;

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
     * Get codecausrempprov
     *
     * @return string
     */
    public function getCodecausrempprov()
    {
        return $this->codecausrempprov;
    }

    /**
     * Set libecausrempprovar
     *
     * @param string $libecausrempprovar
     * @return NomenclatureCauseremplacementprovisoire
     */
    public function setLibecausrempprovar($libecausrempprovar)
    {
        $this->libecausrempprovar = $libecausrempprovar;

        return $this;
    }

    /**
     * Get libecausrempprovar
     *
     * @return string
     */
    public function getLibecausrempprovar()
    {
        return $this->libecausrempprovar;
    }

    /**
     * Set libecausrempprovfr
     *
     * @param string $libecausrempprovfr
     * @return NomenclatureCauseremplacementprovisoire
     */
    public function setLibecausrempprovfr($libecausrempprovfr)
    {
        $this->libecausrempprovfr = $libecausrempprovfr;

        return $this;
    }

    /**
     * Get libecausrempprovfr
     *
     * @return string
     */
    public function getLibecausrempprovfr()
    {
        return $this->libecausrempprovfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCauseremplacementprovisoire
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
     * @return NomenclatureCauseremplacementprovisoire
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
     * @return NomenclatureCauseremplacementprovisoire
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
     * @return NomenclatureCauseremplacementprovisoire
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
     * @return NomenclatureCauseremplacementprovisoire
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
     * @return NomenclatureCauseremplacementprovisoire
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
     * @return NomenclatureCauseremplacementprovisoire
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

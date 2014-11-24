<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureCorps
 *
 * @ORM\Table(name="nomenclature_corps")
 * @ORM\Entity
 */
class NomenclatureCorps
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCorp", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecorp;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCorpAr", type="string", length=50, nullable=true)
     */
    private $libecorpar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCorpFr", type="string", length=50, nullable=true)
     */
    private $libecorpfr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCyclEnse", type="string", length=50, nullable=true)
     */
    private $codecyclense;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CorpEnse", type="boolean", nullable=false)
     */
    private $corpense;

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
     * Get codecorp
     *
     * @return string 
     */
    public function getCodecorp()
    {
        return $this->codecorp;
    }

    /**
     * Set libecorpar
     *
     * @param string $libecorpar
     * @return NomenclatureCorps
     */
    public function setLibecorpar($libecorpar)
    {
        $this->libecorpar = $libecorpar;

        return $this;
    }

    /**
     * Get libecorpar
     *
     * @return string 
     */
    public function getLibecorpar()
    {
        return $this->libecorpar;
    }

    /**
     * Set libecorpfr
     *
     * @param string $libecorpfr
     * @return NomenclatureCorps
     */
    public function setLibecorpfr($libecorpfr)
    {
        $this->libecorpfr = $libecorpfr;

        return $this;
    }

    /**
     * Get libecorpfr
     *
     * @return string 
     */
    public function getLibecorpfr()
    {
        return $this->libecorpfr;
    }

    /**
     * Set codecyclense
     *
     * @param string $codecyclense
     * @return NomenclatureCorps
     */
    public function setCodecyclense($codecyclense)
    {
        $this->codecyclense = $codecyclense;

        return $this;
    }

    /**
     * Get codecyclense
     *
     * @return string 
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }

    /**
     * Set corpense
     *
     * @param boolean $corpense
     * @return NomenclatureCorps
     */
    public function setCorpense($corpense)
    {
        $this->corpense = $corpense;

        return $this;
    }

    /**
     * Get corpense
     *
     * @return boolean 
     */
    public function getCorpense()
    {
        return $this->corpense;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCorps
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
     * @return NomenclatureCorps
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
     * @return NomenclatureCorps
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
     * @return NomenclatureCorps
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
     * @return NomenclatureCorps
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
     * @return NomenclatureCorps
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
     * @return NomenclatureCorps
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

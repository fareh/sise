<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureQualite
 *
 * @ORM\Table(name="nomenclature_qualite")
 * @ORM\Entity
 */
class NomenclatureQualite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeQual", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codequal;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeQualAr", type="string", length=50, nullable=true)
     */
    private $libequalar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeQualFr", type="string", length=50, nullable=true)
     */
    private $libequalfr;

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
     * Get codequal
     *
     * @return string 
     */
    public function getCodequal()
    {
        return $this->codequal;
    }

    /**
     * Set libequalar
     *
     * @param string $libequalar
     * @return NomenclatureQualite
     */
    public function setLibequalar($libequalar)
    {
        $this->libequalar = $libequalar;

        return $this;
    }

    /**
     * Get libequalar
     *
     * @return string 
     */
    public function getLibequalar()
    {
        return $this->libequalar;
    }

    /**
     * Set libequalfr
     *
     * @param string $libequalfr
     * @return NomenclatureQualite
     */
    public function setLibequalfr($libequalfr)
    {
        $this->libequalfr = $libequalfr;

        return $this;
    }

    /**
     * Get libequalfr
     *
     * @return string 
     */
    public function getLibequalfr()
    {
        return $this->libequalfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureQualite
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
     * @return NomenclatureQualite
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
     * @return NomenclatureQualite
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
     * @return NomenclatureQualite
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
     * @return NomenclatureQualite
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
     * @return NomenclatureQualite
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
     * @return NomenclatureQualite
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
        return $this->codequal;
    }
}

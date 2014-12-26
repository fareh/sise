<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureCirconscription
 *
 * @ORM\Table(name="nomenclature_circonscription")
 * @ORM\Entity
 */
class NomenclatureCirconscription
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCirc", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecirc;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCircAr", type="string", length=50, nullable=true)
     */
    private $libecircar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCircFr", type="string", length=50, nullable=true)
     */
    private $libecircfr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeGouv", type="string", length=50, nullable=true)
     */
    private $codegouv;

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
     * Get codecirc
     *
     * @return string
     */
    public function getCodecirc()
    {
        return $this->codecirc;
    }

    /**
     * Set libecircar
     *
     * @param string $libecircar
     * @return NomenclatureCirconscription
     */
    public function setLibecircar($libecircar)
    {
        $this->libecircar = $libecircar;

        return $this;
    }

    /**
     * Get libecircar
     *
     * @return string
     */
    public function getLibecircar()
    {
        return $this->libecircar;
    }

    /**
     * Set libecircfr
     *
     * @param string $libecircfr
     * @return NomenclatureCirconscription
     */
    public function setLibecircfr($libecircfr)
    {
        $this->libecircfr = $libecircfr;

        return $this;
    }

    /**
     * Get libecircfr
     *
     * @return string
     */
    public function getLibecircfr()
    {
        return $this->libecircfr;
    }

    /**
     * Set codegouv
     *
     * @param string $codegouv
     * @return NomenclatureCirconscription
     */
    public function setCodegouv($codegouv)
    {
        $this->codegouv = $codegouv;

        return $this;
    }

    /**
     * Get codegouv
     *
     * @return string
     */
    public function getCodegouv()
    {
        return $this->codegouv;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCirconscription
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
     * @return NomenclatureCirconscription
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
     * @return NomenclatureCirconscription
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
     * @return NomenclatureCirconscription
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
     * @return NomenclatureCirconscription
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
     * @return NomenclatureCirconscription
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
     * @return NomenclatureCirconscription
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
        return $this->libecircar;
    }
}

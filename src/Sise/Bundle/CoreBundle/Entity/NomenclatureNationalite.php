<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureNationalite
 *
 * @ORM\Table(name="nomenclature_nationalite", indexes={@ORM\Index(name="FK_Nomenclature_Nationalite_Nomenclature_CategorieNationalite", columns={"CodeCateNati"})})
 * @ORM\Entity
 */
class NomenclatureNationalite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeNati", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codenati;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeNatiAr", type="string", length=50, nullable=true)
     */
    private $libenatiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeNatiFr", type="string", length=50, nullable=true)
     */
    private $libenatifr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCateNati", type="string", length=50, nullable=true)
     */
    private $codecatenati;

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
     * Get codenati
     *
     * @return string 
     */
    public function getCodenati()
    {
        return $this->codenati;
    }

    /**
     * Set libenatiar
     *
     * @param string $libenatiar
     * @return NomenclatureNationalite
     */
    public function setLibenatiar($libenatiar)
    {
        $this->libenatiar = $libenatiar;

        return $this;
    }

    /**
     * Get libenatiar
     *
     * @return string 
     */
    public function getLibenatiar()
    {
        return $this->libenatiar;
    }

    /**
     * Set libenatifr
     *
     * @param string $libenatifr
     * @return NomenclatureNationalite
     */
    public function setLibenatifr($libenatifr)
    {
        $this->libenatifr = $libenatifr;

        return $this;
    }

    /**
     * Get libenatifr
     *
     * @return string 
     */
    public function getLibenatifr()
    {
        return $this->libenatifr;
    }

    /**
     * Set codecatenati
     *
     * @param string $codecatenati
     * @return NomenclatureNationalite
     */
    public function setCodecatenati($codecatenati)
    {
        $this->codecatenati = $codecatenati;

        return $this;
    }

    /**
     * Get codecatenati
     *
     * @return string 
     */
    public function getCodecatenati()
    {
        return $this->codecatenati;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureNationalite
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
     * @return NomenclatureNationalite
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
     * @return NomenclatureNationalite
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
     * @return NomenclatureNationalite
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
     * @return NomenclatureNationalite
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
     * @return NomenclatureNationalite
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
     * @return NomenclatureNationalite
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

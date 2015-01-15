<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureGenreType;
/**
 * NomenclatureGenre
 *
 * @ORM\Table(name="nomenclature_genre")
 * @ORM\Entity
 */
class NomenclatureGenre
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeGenr", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codegenr;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeGenrAr", type="string", length=50, nullable=true)
     */
    private $libegenrar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeGenrFr", type="string", length=50, nullable=true)
     */
    private $libegenrfr;

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
     * Get codegenr
     *
     * @return string
     */
    public function getCodegenr()
    {
        return $this->codegenr;
    }

    /**
     * Set libegenrar
     *
     * @param string $libegenrar
     * @return NomenclatureGenre
     */
    public function setLibegenrar($libegenrar)
    {
        $this->libegenrar = $libegenrar;

        return $this;
    }

    /**
     * Get libegenrar
     *
     * @return string
     */
    public function getLibegenrar()
    {
        return $this->libegenrar;
    }

    /**
     * Set libegenrfr
     *
     * @param string $libegenrfr
     * @return NomenclatureGenre
     */
    public function setLibegenrfr($libegenrfr)
    {
        $this->libegenrfr = $libegenrfr;

        return $this;
    }

    /**
     * Get libegenrfr
     *
     * @return string
     */
    public function getLibegenrfr()
    {
        return $this->libegenrfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureGenre
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
     * @return NomenclatureGenre
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
     * @return NomenclatureGenre
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
     * @return NomenclatureGenre
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
     * @return NomenclatureGenre
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
     * @return NomenclatureGenre
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
     * @return NomenclatureGenre
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
        return ($this->getLibegenrar())?$this->getLibegenrar():"";
    }
    public function iterateVisible() {
        //   echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            $indice[]=$key;
        }
        return $indice;
    }
    public function getinstanceType() {
        //   echo "MyClass::iterateVisible:\n";
        $instancetype=new NomenclatureGenreType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codegenr;
    }
}

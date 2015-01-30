<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureObservationType;
/**
 * NomenclatureObservation
 *
 * @ORM\Table(name="nomenclature_observation")
 * @ORM\Entity
 */
class NomenclatureObservation
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeObse", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeobse;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeObseAr", type="string", length=50, nullable=true)
     */
    private $libeobsear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeObseFr", type="string", length=50, nullable=true)
     */
    private $libeobsefr;

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
     * @var NomenclatureCategorieentite
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureCategorieentite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeCateEnti", referencedColumnName="CodeCateEnti")
     * })
     */
    private $codecateenti;

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
     * Get codeobse
     *
     * @return string
     */
    public function getCodeobse()
    {
        return $this->codeobse;
    }

    /**
     * Set libeobsear
     *
     * @param string $libeobsear
     * @return NomenclatureObservation
     */
    public function setLibeobsear($libeobsear)
    {
        $this->libeobsear = $libeobsear;

        return $this;
    }

    /**
     * Get libeobsear
     *
     * @return string
     */
    public function getLibeobsear()
    {
        return $this->libeobsear;
    }

    /**
     * Set libeobsefr
     *
     * @param string $libeobsefr
     * @return NomenclatureObservation
     */
    public function setLibeobsefr($libeobsefr)
    {
        $this->libeobsefr = $libeobsefr;

        return $this;
    }

    /**
     * Get libeobsefr
     *
     * @return string
     */
    public function getLibeobsefr()
    {
        return $this->libeobsefr;
    }

    /**
     * Set codecateenti
     *
     * @param string $codecateenti
     * @return NomenclatureObservation
     */
    public function setCodecateenti($codecateenti)
    {
        $this->codecateenti = $codecateenti;

        return $this;
    }

    /**
     * Get codecateenti
     *
     * @return string
     */
    public function getCodecateenti()
    {
        return $this->codecateenti;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureObservation
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
     * @return NomenclatureObservation
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
     * @return NomenclatureObservation
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
     * @return NomenclatureObservation
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
     * @return NomenclatureObservation
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
     * @return NomenclatureObservation
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
     * @return NomenclatureObservation
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
    public function iterateVisible() {
        //   echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            $indice[]=$key;
        }
        return $indice;
    }

    public function getinstanceType() {
        //   echo "MyClass::iterateVisible:\n";
        $instancetype=new NomenclatureObservationType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codeobse;
    }
}

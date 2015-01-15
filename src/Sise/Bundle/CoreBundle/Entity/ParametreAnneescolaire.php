<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\ParametreAnneescolaireType;
/**
 * ParametreAnneescolaire
 *
 * @ORM\Table(name="parametre_anneescolaire")
 * @ORM\Entity
 */
class ParametreAnneescolaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeAnneScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeannescol;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeAnneScolAr", type="string", length=50, nullable=true)
     */
    private $libeannescolar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeAnneScolFr", type="string", length=50, nullable=true)
     */
    private $libeannescolfr;

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
     * Get codeannescol
     *
     * @return string
     */
    public function getCodeannescol()
    {
        return $this->codeannescol;
    }

    /**
     * Set libeannescolar
     *
     * @param string $libeannescolar
     * @return ParametreAnneescolaire
     */
    public function setLibeannescolar($libeannescolar)
    {
        $this->libeannescolar = $libeannescolar;

        return $this;
    }

    /**
     * Get libeannescolar
     *
     * @return string
     */
    public function getLibeannescolar()
    {
        return $this->libeannescolar;
    }

    /**
     * Set libeannescolfr
     *
     * @param string $libeannescolfr
     * @return ParametreAnneescolaire
     */
    public function setLibeannescolfr($libeannescolfr)
    {
        $this->libeannescolfr = $libeannescolfr;

        return $this;
    }

    /**
     * Get libeannescolfr
     *
     * @return string
     */
    public function getLibeannescolfr()
    {
        return $this->libeannescolfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return ParametreAnneescolaire
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
     * @return ParametreAnneescolaire
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
     * @return ParametreAnneescolaire
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
     * @return ParametreAnneescolaire
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
     * @return ParametreAnneescolaire
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
     * @return ParametreAnneescolaire
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
     * @return ParametreAnneescolaire
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
        return $this->codeannescol;
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
        $instancetype=new ParametreAnneescolaireType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codeannescol;
    }
}

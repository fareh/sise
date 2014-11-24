<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametrePeriodicite
 *
 * @ORM\Table(name="parametre_periodicite")
 * @ORM\Entity
 */
class ParametrePeriodicite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodePeri", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeperi;

    /**
     * @var string
     *
     * @ORM\Column(name="LibePeriAr", type="string", length=50, nullable=true)
     */
    private $libeperiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibePeriFr", type="string", length=50, nullable=true)
     */
    private $libeperifr;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="string", length=50, nullable=true)
     */
    private $obse;

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
     * Get codeperi
     *
     * @return string 
     */
    public function getCodeperi()
    {
        return $this->codeperi;
    }

    /**
     * Set libeperiar
     *
     * @param string $libeperiar
     * @return ParametrePeriodicite
     */
    public function setLibeperiar($libeperiar)
    {
        $this->libeperiar = $libeperiar;

        return $this;
    }

    /**
     * Get libeperiar
     *
     * @return string 
     */
    public function getLibeperiar()
    {
        return $this->libeperiar;
    }

    /**
     * Set libeperifr
     *
     * @param string $libeperifr
     * @return ParametrePeriodicite
     */
    public function setLibeperifr($libeperifr)
    {
        $this->libeperifr = $libeperifr;

        return $this;
    }

    /**
     * Get libeperifr
     *
     * @return string 
     */
    public function getLibeperifr()
    {
        return $this->libeperifr;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return ParametrePeriodicite
     */
    public function setObse($obse)
    {
        $this->obse = $obse;

        return $this;
    }

    /**
     * Get obse
     *
     * @return string 
     */
    public function getObse()
    {
        return $this->obse;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return ParametrePeriodicite
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
     * @return ParametrePeriodicite
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
     * @return ParametrePeriodicite
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
     * @return ParametrePeriodicite
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
     * @return ParametrePeriodicite
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
     * @return ParametrePeriodicite
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
     * @return ParametrePeriodicite
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

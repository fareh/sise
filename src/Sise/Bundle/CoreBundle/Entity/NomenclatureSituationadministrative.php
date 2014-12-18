<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureSituationadministrative
 *
 * @ORM\Table(name="nomenclature_situationadministrative")
 * @ORM\Entity
 */
class NomenclatureSituationadministrative
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeSituAdmi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codesituadmi;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituAdmiAr", type="string", length=50, nullable=true)
     */
    private $libesituadmiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituAdmiFr", type="string", length=50, nullable=true)
     */
    private $libesituadmifr;

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
     * Get codesituadmi
     *
     * @return string 
     */
    public function getCodesituadmi()
    {
        return $this->codesituadmi;
    }

    /**
     * Set libesituadmiar
     *
     * @param string $libesituadmiar
     * @return NomenclatureSituationadministrative
     */
    public function setLibesituadmiar($libesituadmiar)
    {
        $this->libesituadmiar = $libesituadmiar;

        return $this;
    }

    /**
     * Get libesituadmiar
     *
     * @return string 
     */
    public function getLibesituadmiar()
    {
        return $this->libesituadmiar;
    }

    /**
     * Set libesituadmifr
     *
     * @param string $libesituadmifr
     * @return NomenclatureSituationadministrative
     */
    public function setLibesituadmifr($libesituadmifr)
    {
        $this->libesituadmifr = $libesituadmifr;

        return $this;
    }

    /**
     * Get libesituadmifr
     *
     * @return string 
     */
    public function getLibesituadmifr()
    {
        return $this->libesituadmifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureSituationadministrative
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
     * @return NomenclatureSituationadministrative
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
     * @return NomenclatureSituationadministrative
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
     * @return NomenclatureSituationadministrative
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
     * @return NomenclatureSituationadministrative
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
     * @return NomenclatureSituationadministrative
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
     * @return NomenclatureSituationadministrative
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
        return $this->codesituadmi;
    }
}

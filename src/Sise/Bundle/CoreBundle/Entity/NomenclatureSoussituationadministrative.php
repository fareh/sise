<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureSoussituationadministrative
 *
 * @ORM\Table(name="nomenclature_soussituationadministrative", indexes={@ORM\Index(name="FK_Nomenclature_SousSituationAdministrative_Nomenclature_Situa33", columns={"CodeSituAdmi"})})
 * @ORM\Entity
 */
class NomenclatureSoussituationadministrative
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeSousSituAdmi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codesoussituadmi;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSousSituAdmiAr", type="string", length=50, nullable=true)
     */
    private $libesoussituadmiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSousSituAdmiFr", type="string", length=50, nullable=true)
     */
    private $libesoussituadmifr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeSituAdmi", type="string", length=50, nullable=true)
     */
    private $codesituadmi;

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
     * Get codesoussituadmi
     *
     * @return string 
     */
    public function getCodesoussituadmi()
    {
        return $this->codesoussituadmi;
    }

    /**
     * Set libesoussituadmiar
     *
     * @param string $libesoussituadmiar
     * @return NomenclatureSoussituationadministrative
     */
    public function setLibesoussituadmiar($libesoussituadmiar)
    {
        $this->libesoussituadmiar = $libesoussituadmiar;

        return $this;
    }

    /**
     * Get libesoussituadmiar
     *
     * @return string 
     */
    public function getLibesoussituadmiar()
    {
        return $this->libesoussituadmiar;
    }

    /**
     * Set libesoussituadmifr
     *
     * @param string $libesoussituadmifr
     * @return NomenclatureSoussituationadministrative
     */
    public function setLibesoussituadmifr($libesoussituadmifr)
    {
        $this->libesoussituadmifr = $libesoussituadmifr;

        return $this;
    }

    /**
     * Get libesoussituadmifr
     *
     * @return string 
     */
    public function getLibesoussituadmifr()
    {
        return $this->libesoussituadmifr;
    }

    /**
     * Set codesituadmi
     *
     * @param string $codesituadmi
     * @return NomenclatureSoussituationadministrative
     */
    public function setCodesituadmi($codesituadmi)
    {
        $this->codesituadmi = $codesituadmi;

        return $this;
    }

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
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureSoussituationadministrative
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
     * @return NomenclatureSoussituationadministrative
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
     * @return NomenclatureSoussituationadministrative
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
     * @return NomenclatureSoussituationadministrative
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
     * @return NomenclatureSoussituationadministrative
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
     * @return NomenclatureSoussituationadministrative
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
     * @return NomenclatureSoussituationadministrative
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

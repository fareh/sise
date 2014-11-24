<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureDelegation
 *
 * @ORM\Table(name="nomenclature_delegation", indexes={@ORM\Index(name="FK_Nomenclature_Delegation_Nomenclature_Gouvernorat", columns={"CodeGouv"})})
 * @ORM\Entity
 */
class NomenclatureDelegation
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeDele", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codedele;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeDeleAr", type="string", length=50, nullable=true)
     */
    private $libedelear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeDeleFr", type="string", length=50, nullable=true)
     */
    private $libedelefr;

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
     * Get codedele
     *
     * @return string 
     */
    public function getCodedele()
    {
        return $this->codedele;
    }

    /**
     * Set libedelear
     *
     * @param string $libedelear
     * @return NomenclatureDelegation
     */
    public function setLibedelear($libedelear)
    {
        $this->libedelear = $libedelear;

        return $this;
    }

    /**
     * Get libedelear
     *
     * @return string 
     */
    public function getLibedelear()
    {
        return $this->libedelear;
    }

    /**
     * Set libedelefr
     *
     * @param string $libedelefr
     * @return NomenclatureDelegation
     */
    public function setLibedelefr($libedelefr)
    {
        $this->libedelefr = $libedelefr;

        return $this;
    }

    /**
     * Get libedelefr
     *
     * @return string 
     */
    public function getLibedelefr()
    {
        return $this->libedelefr;
    }

    /**
     * Set codegouv
     *
     * @param string $codegouv
     * @return NomenclatureDelegation
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
     * @return NomenclatureDelegation
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
     * @return NomenclatureDelegation
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
     * @return NomenclatureDelegation
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
     * @return NomenclatureDelegation
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
     * @return NomenclatureDelegation
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
     * @return NomenclatureDelegation
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
     * @return NomenclatureDelegation
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

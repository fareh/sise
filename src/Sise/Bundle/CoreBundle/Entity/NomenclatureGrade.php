<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureGrade
 *
 * @ORM\Table(name="nomenclature_grade", indexes={@ORM\Index(name="FK_Nomenclature_Grade_Nomenclature_Corps", columns={"CodeCorp"})})
 * @ORM\Entity
 */
class NomenclatureGrade
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeGrad", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codegrad;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeGradAr", type="string", length=50, nullable=true)
     */
    private $libegradar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeGradFr", type="string", length=50, nullable=true)
     */
    private $libegradfr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCorp", type="string", length=50, nullable=true)
     */
    private $codecorp;

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
     * Get codegrad
     *
     * @return string 
     */
    public function getCodegrad()
    {
        return $this->codegrad;
    }

    /**
     * Set libegradar
     *
     * @param string $libegradar
     * @return NomenclatureGrade
     */
    public function setLibegradar($libegradar)
    {
        $this->libegradar = $libegradar;

        return $this;
    }

    /**
     * Get libegradar
     *
     * @return string 
     */
    public function getLibegradar()
    {
        return $this->libegradar;
    }

    /**
     * Set libegradfr
     *
     * @param string $libegradfr
     * @return NomenclatureGrade
     */
    public function setLibegradfr($libegradfr)
    {
        $this->libegradfr = $libegradfr;

        return $this;
    }

    /**
     * Get libegradfr
     *
     * @return string 
     */
    public function getLibegradfr()
    {
        return $this->libegradfr;
    }

    /**
     * Set codecorp
     *
     * @param string $codecorp
     * @return NomenclatureGrade
     */
    public function setCodecorp($codecorp)
    {
        $this->codecorp = $codecorp;

        return $this;
    }

    /**
     * Get codecorp
     *
     * @return string 
     */
    public function getCodecorp()
    {
        return $this->codecorp;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureGrade
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
     * @return NomenclatureGrade
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
     * @return NomenclatureGrade
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
     * @return NomenclatureGrade
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
     * @return NomenclatureGrade
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
     * @return NomenclatureGrade
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
     * @return NomenclatureGrade
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

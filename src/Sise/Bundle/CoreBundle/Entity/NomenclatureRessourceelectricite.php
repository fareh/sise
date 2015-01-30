<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureRessourceelectriciteType;
/**
 * NomenclatureRessourceelectricite
 *
 * @ORM\Table(name="nomenclature_ressourceelectricite")
 * @ORM\Entity
 */
class NomenclatureRessourceelectricite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRessElec", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderesselec;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRessElecAr", type="string", length=50, nullable=true)
     */
    private $liberesselecar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRessElecFr", type="string", length=50, nullable=true)
     */
    private $liberesselecfr;

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
     * Get coderesselec
     *
     * @return string
     */
    public function getCoderesselec()
    {
        return $this->coderesselec;
    }

    /**
     * Set liberesselecar
     *
     * @param string $liberesselecar
     * @return NomenclatureRessourceelectricite
     */
    public function setLiberesselecar($liberesselecar)
    {
        $this->liberesselecar = $liberesselecar;

        return $this;
    }

    /**
     * Get liberesselecar
     *
     * @return string
     */
    public function getLiberesselecar()
    {
        return $this->liberesselecar;
    }

    /**
     * Set liberesselecfr
     *
     * @param string $liberesselecfr
     * @return NomenclatureRessourceelectricite
     */
    public function setLiberesselecfr($liberesselecfr)
    {
        $this->liberesselecfr = $liberesselecfr;

        return $this;
    }

    /**
     * Get liberesselecfr
     *
     * @return string
     */
    public function getLiberesselecfr()
    {
        return $this->liberesselecfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureRessourceelectricite
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
     * @return NomenclatureRessourceelectricite
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
     * @return NomenclatureRessourceelectricite
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
     * @return NomenclatureRessourceelectricite
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
     * @return NomenclatureRessourceelectricite
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
     * @return NomenclatureRessourceelectricite
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
     * @return NomenclatureRessourceelectricite
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
        $instancetype=new NomenclatureRessourceelectriciteType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->coderesselec;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureSituationreseauelectriqueatelierType;
/**
 * NomenclatureSituationreseauelectriqueatelier
 *
 * @ORM\Table(name="nomenclature_situationreseauelectriqueatelier")
 * @ORM\Entity
 */
class NomenclatureSituationreseauelectriqueatelier
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeSituElecAtel", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codesituelecatel;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituElecAtelAr", type="string", length=50, nullable=true)
     */
    private $libesituelecatelar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSituElecAtelFr", type="string", length=50, nullable=true)
     */
    private $libesituelecatelfr;

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
     * Get codesituelecatel
     *
     * @return string
     */
    public function getCodesituelecatel()
    {
        return $this->codesituelecatel;
    }

    /**
     * Set libesituelecatelar
     *
     * @param string $libesituelecatelar
     * @return NomenclatureSituationreseauelectriqueatelier
     */
    public function setLibesituelecatelar($libesituelecatelar)
    {
        $this->libesituelecatelar = $libesituelecatelar;

        return $this;
    }

    /**
     * Get libesituelecatelar
     *
     * @return string
     */
    public function getLibesituelecatelar()
    {
        return $this->libesituelecatelar;
    }

    /**
     * Set libesituelecatelfr
     *
     * @param string $libesituelecatelfr
     * @return NomenclatureSituationreseauelectriqueatelier
     */
    public function setLibesituelecatelfr($libesituelecatelfr)
    {
        $this->libesituelecatelfr = $libesituelecatelfr;

        return $this;
    }

    /**
     * Get libesituelecatelfr
     *
     * @return string
     */
    public function getLibesituelecatelfr()
    {
        return $this->libesituelecatelfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureSituationreseauelectriqueatelier
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
     * @return NomenclatureSituationreseauelectriqueatelier
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
     * @return NomenclatureSituationreseauelectriqueatelier
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
     * @return NomenclatureSituationreseauelectriqueatelier
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
     * @return NomenclatureSituationreseauelectriqueatelier
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
     * @return NomenclatureSituationreseauelectriqueatelier
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
     * @return NomenclatureSituationreseauelectriqueatelier
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
        $instancetype=new NomenclatureSituationreseauelectriqueatelierType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codesituelecatel;
    }
}

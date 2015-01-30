<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclaturePeriodesuivibudgetType;
/**
 * NomenclaturePeriodesuivibudget
 *
 * @ORM\Table(name="nomenclature_periodesuivibudget")
 * @ORM\Entity
 */
class NomenclaturePeriodesuivibudget
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodePeriSuivBudg", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeperisuivbudg;

    /**
     * @var string
     *
     * @ORM\Column(name="LibePeriSuivBudgAr", type="string", length=50, nullable=true)
     */
    private $libeperisuivbudgar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibePeriSuivBudgFr", type="string", length=50, nullable=true)
     */
    private $libeperisuivbudgfr;

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
     * Get codeperisuivbudg
     *
     * @return string
     */
    public function getCodeperisuivbudg()
    {
        return $this->codeperisuivbudg;
    }

    /**
     * Set libeperisuivbudgar
     *
     * @param string $libeperisuivbudgar
     * @return NomenclaturePeriodesuivibudget
     */
    public function setLibeperisuivbudgar($libeperisuivbudgar)
    {
        $this->libeperisuivbudgar = $libeperisuivbudgar;

        return $this;
    }

    /**
     * Get libeperisuivbudgar
     *
     * @return string
     */
    public function getLibeperisuivbudgar()
    {
        return $this->libeperisuivbudgar;
    }

    /**
     * Set libeperisuivbudgfr
     *
     * @param string $libeperisuivbudgfr
     * @return NomenclaturePeriodesuivibudget
     */
    public function setLibeperisuivbudgfr($libeperisuivbudgfr)
    {
        $this->libeperisuivbudgfr = $libeperisuivbudgfr;

        return $this;
    }

    /**
     * Get libeperisuivbudgfr
     *
     * @return string
     */
    public function getLibeperisuivbudgfr()
    {
        return $this->libeperisuivbudgfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclaturePeriodesuivibudget
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
     * @return NomenclaturePeriodesuivibudget
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
     * @return NomenclaturePeriodesuivibudget
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
     * @return NomenclaturePeriodesuivibudget
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
     * @return NomenclaturePeriodesuivibudget
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
     * @return NomenclaturePeriodesuivibudget
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
     * @return NomenclaturePeriodesuivibudget
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
        $instancetype=new NomenclaturePeriodesuivibudgetType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codeperisuivbudg;
    }
}

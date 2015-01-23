<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureTyperubriquebudgetaireType;
/**
 * NomenclatureTyperubriquebudgetaire
 *
 * @ORM\Table(name="nomenclature_typerubriquebudgetaire")
 * @ORM\Entity
 */
class NomenclatureTyperubriquebudgetaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeRubrBudg", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetyperubrbudg;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeRubrBudgAr", type="string", length=50, nullable=true)
     */
    private $libetyperubrbudgar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeRubrBudgFr", type="string", length=50, nullable=true)
     */
    private $libetyperubrbudgfr;

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
     * Get codetyperubrbudg
     *
     * @return string
     */
    public function getCodetyperubrbudg()
    {
        return $this->codetyperubrbudg;
    }

    /**
     * Set libetyperubrbudgar
     *
     * @param string $libetyperubrbudgar
     * @return NomenclatureTyperubriquebudgetaire
     */
    public function setLibetyperubrbudgar($libetyperubrbudgar)
    {
        $this->libetyperubrbudgar = $libetyperubrbudgar;

        return $this;
    }

    /**
     * Get libetyperubrbudgar
     *
     * @return string
     */
    public function getLibetyperubrbudgar()
    {
        return $this->libetyperubrbudgar;
    }

    /**
     * Set libetyperubrbudgfr
     *
     * @param string $libetyperubrbudgfr
     * @return NomenclatureTyperubriquebudgetaire
     */
    public function setLibetyperubrbudgfr($libetyperubrbudgfr)
    {
        $this->libetyperubrbudgfr = $libetyperubrbudgfr;

        return $this;
    }

    /**
     * Get libetyperubrbudgfr
     *
     * @return string
     */
    public function getLibetyperubrbudgfr()
    {
        return $this->libetyperubrbudgfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTyperubriquebudgetaire
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
     * @return NomenclatureTyperubriquebudgetaire
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
     * @return NomenclatureTyperubriquebudgetaire
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
     * @return NomenclatureTyperubriquebudgetaire
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
     * @return NomenclatureTyperubriquebudgetaire
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
     * @return NomenclatureTyperubriquebudgetaire
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
     * @return NomenclatureTyperubriquebudgetaire
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
        $instancetype=new NomenclatureTyperubriquebudgetaireType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codetyperubrbudg;
    }
}

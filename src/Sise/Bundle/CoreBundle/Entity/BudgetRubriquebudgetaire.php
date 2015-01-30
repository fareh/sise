<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\BudgetRubriquebudgetaireType;
/**
 * BudgetRubriquebudgetaire
 *
 * @ORM\Table(name="budget_rubriquebudgetaire", indexes={@ORM\Index(name="FK_Budget_RubriqueBudgetaire_Nomenclature_TypeRubriqueBudgetaire", columns={"CodeTypeRubrBudg"})})
 * @ORM\Entity
 */
class BudgetRubriquebudgetaire
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRubrBudg", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderubrbudg;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRubrBudgAr", type="string", length=50, nullable=true)
     */
    private $liberubrbudgar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRubrBudgFr", type="string", length=50, nullable=true)
     */
    private $liberubrbudgfr;

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
     * @var NomenclatureTyperubriquebudgetaire
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureTyperubriquebudgetaire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeRubrBudg", referencedColumnName="CodeTypeRubrBudg")
     * })
     */
    private $codetyperubrbudg;

    /**
     * Get coderubrbudg
     *
     * @return string
     */
    public function getCoderubrbudg()
    {
        return $this->coderubrbudg;
    }

    /**
     * Set liberubrbudgar
     *
     * @param string $liberubrbudgar
     * @return BudgetRubriquebudgetaire
     */
    public function setLiberubrbudgar($liberubrbudgar)
    {
        $this->liberubrbudgar = $liberubrbudgar;

        return $this;
    }

    /**
     * Get liberubrbudgar
     *
     * @return string
     */
    public function getLiberubrbudgar()
    {
        return $this->liberubrbudgar;
    }

    /**
     * Set liberubrbudgfr
     *
     * @param string $liberubrbudgfr
     * @return BudgetRubriquebudgetaire
     */
    public function setLiberubrbudgfr($liberubrbudgfr)
    {
        $this->liberubrbudgfr = $liberubrbudgfr;

        return $this;
    }

    /**
     * Get liberubrbudgfr
     *
     * @return string
     */
    public function getLiberubrbudgfr()
    {
        return $this->liberubrbudgfr;
    }

    /**
     * Set codetyperubrbudg
     *
     * @param string $codetyperubrbudg
     * @return BudgetRubriquebudgetaire
     */
    public function setCodetyperubrbudg($codetyperubrbudg)
    {
        $this->codetyperubrbudg = $codetyperubrbudg;

        return $this;
    }

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
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return BudgetRubriquebudgetaire
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
     * @return BudgetRubriquebudgetaire
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
    public function iterateVisible() {
        //   echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            $indice[]=$key;
        }
        return $indice;
    }

    public function getinstanceType() {
        //   echo "MyClass::iterateVisible:\n";
        $instancetype=new BudgetRubriquebudgetaireType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->coderubrbudg;
    }
}

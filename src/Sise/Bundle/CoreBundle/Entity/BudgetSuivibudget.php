<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BudgetSuivibudget
 *
 * @ORM\Table(name="budget_suivibudget", indexes={@ORM\Index(name="FK_Budget_SuiviBudget_Budget_RubriqueBudgetaire", columns={"CodeRubrBudg"}), @ORM\Index(name="FK_Budget_SuiviBudget_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class BudgetSuivibudget
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeetab;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneScol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annescol;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeRece", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderece;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeRubrBudg", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
   // private $coderubrbudg;


    /**
     * @ORM\ManyToOne(targetEntity="BudgetRubriquebudgetaire")
     * @ORM\JoinColumn(name="CodeRubrBudg", referencedColumnName="CodeRubrBudg")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $coderubrbudg;



    /**
     * @var float
     *
     * @ORM\Column(name="CredOuve", type="float", precision=10, scale=0, nullable=true)
     */
    private $credouve;

    /**
     * @var float
     *
     * @ORM\Column(name="CorrCred", type="float", precision=10, scale=0, nullable=true)
     */
    private $corrcred;

    /**
     * @var float
     *
     * @ORM\Column(name="TotaEnga", type="float", precision=10, scale=0, nullable=true)
     */
    private $totaenga;

    /**
     * @var float
     *
     * @ORM\Column(name="RestEnga", type="float", precision=10, scale=0, nullable=true)
     */
    private $restenga;

    /**
     * @var float
     *
     * @ORM\Column(name="TotaPaye", type="float", precision=10, scale=0, nullable=true)
     */
    private $totapaye;

    /**
     * @var float
     *
     * @ORM\Column(name="RestPaye", type="float", precision=10, scale=0, nullable=true)
     */
    private $restpaye;

    /**
     * @var float
     *
     * @ORM\Column(name="PourEnga", type="float", precision=10, scale=0, nullable=true)
     */
    private $pourenga;

    /**
     * @var float
     *
     * @ORM\Column(name="PourPaye", type="float", precision=10, scale=0, nullable=true)
     */
    private $pourpaye;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return BudgetSuivibudget
     */
    public function setCodeetab($codeetab)
    {
        $this->codeetab = $codeetab;

        return $this;
    }

    /**
     * Get codeetab
     *
     * @return string 
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * Set codetypeetab
     *
     * @param string $codetypeetab
     * @return BudgetSuivibudget
     */
    public function setCodetypeetab($codetypeetab)
    {
        $this->codetypeetab = $codetypeetab;

        return $this;
    }

    /**
     * Get codetypeetab
     *
     * @return string 
     */
    public function getCodetypeetab()
    {
        return $this->codetypeetab;
    }

    /**
     * Set annescol
     *
     * @param integer $annescol
     * @return BudgetSuivibudget
     */
    public function setAnnescol($annescol)
    {
        $this->annescol = $annescol;

        return $this;
    }

    /**
     * Get annescol
     *
     * @return integer 
     */
    public function getAnnescol()
    {
        return $this->annescol;
    }

    /**
     * Set coderece
     *
     * @param string $coderece
     * @return BudgetSuivibudget
     */
    public function setCoderece($coderece)
    {
        $this->coderece = $coderece;

        return $this;
    }

    /**
     * Get coderece
     *
     * @return string 
     */
    public function getCoderece()
    {
        return $this->coderece;
    }


    /**
     * Set credouve
     *
     * @param float $credouve
     * @return BudgetSuivibudget
     */
    public function setCredouve($credouve)
    {
        $this->credouve = $credouve;

        return $this;
    }

    /**
     * Get credouve
     *
     * @return float 
     */
    public function getCredouve()
    {
        return $this->credouve;
    }

    /**
     * Set corrcred
     *
     * @param float $corrcred
     * @return BudgetSuivibudget
     */
    public function setCorrcred($corrcred)
    {
        $this->corrcred = $corrcred;

        return $this;
    }

    /**
     * Get corrcred
     *
     * @return float 
     */
    public function getCorrcred()
    {
        return $this->corrcred;
    }

    /**
     * Set totaenga
     *
     * @param float $totaenga
     * @return BudgetSuivibudget
     */
    public function setTotaenga($totaenga)
    {
        $this->totaenga = $totaenga;

        return $this;
    }

    /**
     * Get totaenga
     *
     * @return float 
     */
    public function getTotaenga()
    {
        return $this->totaenga;
    }

    /**
     * Set restenga
     *
     * @param float $restenga
     * @return BudgetSuivibudget
     */
    public function setRestenga($restenga)
    {
        $this->restenga = $restenga;

        return $this;
    }

    /**
     * Get restenga
     *
     * @return float 
     */
    public function getRestenga()
    {
        return $this->restenga;
    }

    /**
     * Set totapaye
     *
     * @param float $totapaye
     * @return BudgetSuivibudget
     */
    public function setTotapaye($totapaye)
    {
        $this->totapaye = $totapaye;

        return $this;
    }

    /**
     * Get totapaye
     *
     * @return float 
     */
    public function getTotapaye()
    {
        return $this->totapaye;
    }

    /**
     * Set restpaye
     *
     * @param float $restpaye
     * @return BudgetSuivibudget
     */
    public function setRestpaye($restpaye)
    {
        $this->restpaye = $restpaye;

        return $this;
    }

    /**
     * Get restpaye
     *
     * @return float 
     */
    public function getRestpaye()
    {
        return $this->restpaye;
    }

    /**
     * Set pourenga
     *
     * @param float $pourenga
     * @return BudgetSuivibudget
     */
    public function setPourenga($pourenga)
    {
        $this->pourenga = $pourenga;

        return $this;
    }

    /**
     * Get pourenga
     *
     * @return float 
     */
    public function getPourenga()
    {
        return $this->pourenga;
    }

    /**
     * Set pourpaye
     *
     * @param float $pourpaye
     * @return BudgetSuivibudget
     */
    public function setPourpaye($pourpaye)
    {
        $this->pourpaye = $pourpaye;

        return $this;
    }

    /**
     * Get pourpaye
     *
     * @return float 
     */
    public function getPourpaye()
    {
        return $this->pourpaye;
    }

    /**
     * Set coderubrbudg
     *
     * @param \Sise\Bundle\CoreBundle\Entity\BudgetRubriquebudgetaire $coderubrbudg
     * @return BudgetSuivibudget
     */
    public function setCoderubrbudg(\Sise\Bundle\CoreBundle\Entity\BudgetRubriquebudgetaire $coderubrbudg)
    {
        $this->coderubrbudg = $coderubrbudg;

        return $this;
    }

    /**
     * Get coderubrbudg
     *
     * @return \Sise\Bundle\CoreBundle\Entity\BudgetRubriquebudgetaire 
     */
    public function getCoderubrbudg()
    {
        return $this->coderubrbudg;
    }
}

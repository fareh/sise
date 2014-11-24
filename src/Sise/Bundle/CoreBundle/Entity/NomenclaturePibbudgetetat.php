<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclaturePibbudgetetat
 *
 * @ORM\Table(name="nomenclature_pibbudgetetat")
 * @ORM\Entity
 */
class NomenclaturePibbudgetetat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Anne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $anne;

    /**
     * @var float
     *
     * @ORM\Column(name="PIBMD", type="float", precision=10, scale=0, nullable=false)
     */
    private $pibmd;

    /**
     * @var float
     *
     * @ORM\Column(name="BudgetEtat", type="float", precision=10, scale=0, nullable=false)
     */
    private $budgetetat;



    /**
     * Get anne
     *
     * @return integer 
     */
    public function getAnne()
    {
        return $this->anne;
    }

    /**
     * Set pibmd
     *
     * @param float $pibmd
     * @return NomenclaturePibbudgetetat
     */
    public function setPibmd($pibmd)
    {
        $this->pibmd = $pibmd;

        return $this;
    }

    /**
     * Get pibmd
     *
     * @return float 
     */
    public function getPibmd()
    {
        return $this->pibmd;
    }

    /**
     * Set budgetetat
     *
     * @param float $budgetetat
     * @return NomenclaturePibbudgetetat
     */
    public function setBudgetetat($budgetetat)
    {
        $this->budgetetat = $budgetetat;

        return $this;
    }

    /**
     * Get budgetetat
     *
     * @return float 
     */
    public function getBudgetetat()
    {
        return $this->budgetetat;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentHeureenseignent
 *
 * @ORM\Table(name="effectiveenseignent_heureenseignent", indexes={@ORM\Index(name="FK_EffectiveEnseignent_HeureEnseignent_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectiveenseignentHeureenseignent
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
     * @var float
     *
     * @ORM\Column(name="TotaHeurEnse", type="float", precision=10, scale=0, nullable=true)
     */
    private $totaheurense;

    /**
     * @var float
     *
     * @ORM\Column(name="TotaHeurEnseSupp", type="float", precision=10, scale=0, nullable=true)
     */
    private $totaheurensesupp;

    /**
     * @var float
     *
     * @ORM\Column(name="TotaHeurEnseComp", type="float", precision=10, scale=0, nullable=true)
     */
    private $totaheurensecomp;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveenseignentHeureenseignent
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
     * @return EffectiveenseignentHeureenseignent
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
     * @return EffectiveenseignentHeureenseignent
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
     * @return EffectiveenseignentHeureenseignent
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
     * Set totaheurense
     *
     * @param float $totaheurense
     * @return EffectiveenseignentHeureenseignent
     */
    public function setTotaheurense($totaheurense)
    {
        $this->totaheurense = $totaheurense;

        return $this;
    }

    /**
     * Get totaheurense
     *
     * @return float
     */
    public function getTotaheurense()
    {
        return $this->totaheurense;
    }

    /**
     * Set totaheurensesupp
     *
     * @param float $totaheurensesupp
     * @return EffectiveenseignentHeureenseignent
     */
    public function setTotaheurensesupp($totaheurensesupp)
    {
        $this->totaheurensesupp = $totaheurensesupp;

        return $this;
    }

    /**
     * Get totaheurensesupp
     *
     * @return float
     */
    public function getTotaheurensesupp()
    {
        return $this->totaheurensesupp;
    }

    /**
     * Set totaheurensecomp
     *
     * @param float $totaheurensecomp
     * @return EffectiveenseignentHeureenseignent
     */
    public function setTotaheurensecomp($totaheurensecomp)
    {
        $this->totaheurensecomp = $totaheurensecomp;

        return $this;
    }

    /**
     * Get totaheurensecomp
     *
     * @return float
     */
    public function getTotaheurensecomp()
    {
        return $this->totaheurensecomp;
    }
}

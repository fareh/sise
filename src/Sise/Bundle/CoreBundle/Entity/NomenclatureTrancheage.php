<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureTrancheage
 *
 * @ORM\Table(name="nomenclature_trancheage")
 * @ORM\Entity
 */
class NomenclatureTrancheage
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTranAge", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetranage;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codenivescol;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTranAgeAr", type="string", length=250, nullable=true)
     */
    private $libetranagear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTranAgeFr", type="string", length=250, nullable=true)
     */
    private $libetranagefr;

    /**
     * @var float
     *
     * @ORM\Column(name="ValeInfe", type="float", precision=10, scale=0, nullable=true)
     */
    private $valeinfe;

    /**
     * @var float
     *
     * @ORM\Column(name="ValeSupe", type="float", precision=10, scale=0, nullable=true)
     */
    private $valesupe;



    /**
     * Set codetranage
     *
     * @param string $codetranage
     * @return NomenclatureTrancheage
     */
    public function setCodetranage($codetranage)
    {
        $this->codetranage = $codetranage;

        return $this;
    }

    /**
     * Get codetranage
     *
     * @return string 
     */
    public function getCodetranage()
    {
        return $this->codetranage;
    }

    /**
     * Set codenivescol
     *
     * @param string $codenivescol
     * @return NomenclatureTrancheage
     */
    public function setCodenivescol($codenivescol)
    {
        $this->codenivescol = $codenivescol;

        return $this;
    }

    /**
     * Get codenivescol
     *
     * @return string 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }

    /**
     * Set libetranagear
     *
     * @param string $libetranagear
     * @return NomenclatureTrancheage
     */
    public function setLibetranagear($libetranagear)
    {
        $this->libetranagear = $libetranagear;

        return $this;
    }

    /**
     * Get libetranagear
     *
     * @return string 
     */
    public function getLibetranagear()
    {
        return $this->libetranagear;
    }

    /**
     * Set libetranagefr
     *
     * @param string $libetranagefr
     * @return NomenclatureTrancheage
     */
    public function setLibetranagefr($libetranagefr)
    {
        $this->libetranagefr = $libetranagefr;

        return $this;
    }

    /**
     * Get libetranagefr
     *
     * @return string 
     */
    public function getLibetranagefr()
    {
        return $this->libetranagefr;
    }

    /**
     * Set valeinfe
     *
     * @param float $valeinfe
     * @return NomenclatureTrancheage
     */
    public function setValeinfe($valeinfe)
    {
        $this->valeinfe = $valeinfe;

        return $this;
    }

    /**
     * Get valeinfe
     *
     * @return float 
     */
    public function getValeinfe()
    {
        return $this->valeinfe;
    }

    /**
     * Set valesupe
     *
     * @param float $valesupe
     * @return NomenclatureTrancheage
     */
    public function setValesupe($valesupe)
    {
        $this->valesupe = $valesupe;

        return $this;
    }

    /**
     * Get valesupe
     *
     * @return float 
     */
    public function getValesupe()
    {
        return $this->valesupe;
    }
}

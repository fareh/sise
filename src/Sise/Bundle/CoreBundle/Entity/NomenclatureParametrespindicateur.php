<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureParametrespindicateur
 *
 * @ORM\Table(name="nomenclature_parametrespindicateur")
 * @ORM\Entity
 */
class NomenclatureParametrespindicateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeIndi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeindi;

    /**
     * @var integer
     *
     * @ORM\Column(name="CodeParaIndi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeparaindi;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPara", type="string", length=50, nullable=false)
     */
    private $nompara;

    /**
     * @var string
     *
     * @ORM\Column(name="ValePara", type="string", length=50, nullable=true)
     */
    private $valepara;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeParaExog", type="string", length=50, nullable=true)
     */
    private $codeparaexog;


    /**
     * Set codeindi
     *
     * @param string $codeindi
     * @return NomenclatureParametrespindicateur
     */
    public function setCodeindi($codeindi)
    {
        $this->codeindi = $codeindi;

        return $this;
    }

    /**
     * Get codeindi
     *
     * @return string
     */
    public function getCodeindi()
    {
        return $this->codeindi;
    }

    /**
     * Set codeparaindi
     *
     * @param integer $codeparaindi
     * @return NomenclatureParametrespindicateur
     */
    public function setCodeparaindi($codeparaindi)
    {
        $this->codeparaindi = $codeparaindi;

        return $this;
    }

    /**
     * Get codeparaindi
     *
     * @return integer
     */
    public function getCodeparaindi()
    {
        return $this->codeparaindi;
    }

    /**
     * Set nompara
     *
     * @param string $nompara
     * @return NomenclatureParametrespindicateur
     */
    public function setNompara($nompara)
    {
        $this->nompara = $nompara;

        return $this;
    }

    /**
     * Get nompara
     *
     * @return string
     */
    public function getNompara()
    {
        return $this->nompara;
    }

    /**
     * Set valepara
     *
     * @param string $valepara
     * @return NomenclatureParametrespindicateur
     */
    public function setValepara($valepara)
    {
        $this->valepara = $valepara;

        return $this;
    }

    /**
     * Get valepara
     *
     * @return string
     */
    public function getValepara()
    {
        return $this->valepara;
    }

    /**
     * Set codeparaexog
     *
     * @param string $codeparaexog
     * @return NomenclatureParametrespindicateur
     */
    public function setCodeparaexog($codeparaexog)
    {
        $this->codeparaexog = $codeparaexog;

        return $this;
    }

    /**
     * Get codeparaexog
     *
     * @return string
     */
    public function getCodeparaexog()
    {
        return $this->codeparaexog;
    }
}

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
     * @var integer
     *
     * @ORM\Column(name="CodeParaIndi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeparaindi;


    /**
     * @var NomenclatureIndicateur
     * @ORM\ManyToOne(targetEntity="NomenclatureIndicateur", inversedBy="codeparaindi")
     * @ORM\JoinColumn(name="CodeIndi", referencedColumnName="CodeIndi")
     */
    private $codeindi;



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
     * @var NomenclatureParametreexogene
     * @ORM\ManyToOne(targetEntity="NomenclatureParametreexogene", inversedBy="codeparaindi")
     * @ORM\JoinColumn(name="CodeParaExog", referencedColumnName="CodeParaExog")
     */
    private $codeparaexog;

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
     * Set codeindi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureIndicateur $codeindi
     * @return NomenclatureParametrespindicateur
     */
    public function setCodeindi(\Sise\Bundle\CoreBundle\Entity\NomenclatureIndicateur $codeindi = null)
    {
        $this->codeindi = $codeindi;

        return $this;
    }

    /**
     * Get codeindi
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureIndicateur 
     */
    public function getCodeindi()
    {
        return $this->codeindi;
    }

    /**
     * Set codeparaexog
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene $codeparaexog
     * @return NomenclatureParametrespindicateur
     */
    public function setCodeparaexog(\Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene $codeparaexog = null)
    {
        $this->codeparaexog = $codeparaexog;

        return $this;
    }

    /**
     * Get codeparaexog
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene 
     */
    public function getCodeparaexog()
    {
        return $this->codeparaexog;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentListeremplacementprovisoire
 *
 * @ORM\Table(name="effectiveenseignent_listeremplacementprovisoire")
 * @ORM\Entity
 */
class EffectiveenseignentListeremplacementprovisoire
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
     * @var \NomenclatureCauseremplacementprovisoire
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureCauseremplacementprovisoire")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeCausRempProv", referencedColumnName="CodeCausRempProv")
     * })
     */
    private $codecausrempprov;

    /**
     * @var string
     *
     * @ORM\Column(name="NomPrenEnse", type="string", length=200, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $nomprenense;

    /**
     * @var float
     *
     * @ORM\Column(name="NombHeur", type="float", precision=10, scale=0, nullable=true)
     */
    private $nombheur;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveenseignentListeremplacementprovisoire
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
     * @return EffectiveenseignentListeremplacementprovisoire
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
     * @return EffectiveenseignentListeremplacementprovisoire
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
     * @return EffectiveenseignentListeremplacementprovisoire
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
     * Set nomprenense
     *
     * @param string $nomprenense
     * @return EffectiveenseignentListeremplacementprovisoire
     */
    public function setNomprenense($nomprenense)
    {
        $this->nomprenense = $nomprenense;

        return $this;
    }

    /**
     * Get nomprenense
     *
     * @return string
     */
    public function getNomprenense()
    {
        return $this->nomprenense;
    }

    /**
     * Set nombheur
     *
     * @param float $nombheur
     * @return EffectiveenseignentListeremplacementprovisoire
     */
    public function setNombheur($nombheur)
    {
        $this->nombheur = $nombheur;

        return $this;
    }

    /**
     * Get nombheur
     *
     * @return float
     */
    public function getNombheur()
    {
        return $this->nombheur;
    }

    /**
     * Set codecausrempprov
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCauseremplacementprovisoire $codecausrempprov
     * @return EffectiveenseignentListeremplacementprovisoire
     */
    public function setCodecausrempprov(\Sise\Bundle\CoreBundle\Entity\NomenclatureCauseremplacementprovisoire $codecausrempprov)
    {
        $this->codecausrempprov = $codecausrempprov;

        return $this;
    }

    /**
     * Get codecausrempprov
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCauseremplacementprovisoire
     */
    public function getCodecausrempprov()
    {
        return $this->codecausrempprov;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentGradeheuretravail
 *
 * @ORM\Table(name="effectiveenseignent_gradeheuretravail")
 * @ORM\Entity
 */
class EffectiveenseignentGradeheuretravail
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
     * @var \NomenclatureHeureenseignement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureHeureenseignement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeHeurEnse", referencedColumnName="CodeHeurEnse")
     * })
     */
    private $codeheurense;

    /**
     * @var \NomenclatureGrade
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureGrade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGrad", referencedColumnName="CodeGrad")
     * })
     */
    private $codegrad;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnseMasc", type="integer", nullable=true)
     */
    private $nombensemasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnseFemi", type="integer", nullable=true)
     */
    private $nombensefemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaEnse", type="integer", nullable=true)
     */
    private $nombtotaense;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveenseignentGradeheuretravail
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
     * @return EffectiveenseignentGradeheuretravail
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
     * @return EffectiveenseignentGradeheuretravail
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
     * @return EffectiveenseignentGradeheuretravail
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
     * Set nombensemasc
     *
     * @param integer $nombensemasc
     * @return EffectiveenseignentGradeheuretravail
     */
    public function setNombensemasc($nombensemasc)
    {
        $this->nombensemasc = $nombensemasc;

        return $this;
    }

    /**
     * Get nombensemasc
     *
     * @return integer
     */
    public function getNombensemasc()
    {
        return $this->nombensemasc;
    }

    /**
     * Set nombensefemi
     *
     * @param integer $nombensefemi
     * @return EffectiveenseignentGradeheuretravail
     */
    public function setNombensefemi($nombensefemi)
    {
        $this->nombensefemi = $nombensefemi;

        return $this;
    }

    /**
     * Get nombensefemi
     *
     * @return integer
     */
    public function getNombensefemi()
    {
        return $this->nombensefemi;
    }

    /**
     * Set nombtotaense
     *
     * @param integer $nombtotaense
     * @return EffectiveenseignentGradeheuretravail
     */
    public function setNombtotaense($nombtotaense)
    {
        $this->nombtotaense = $nombtotaense;

        return $this;
    }

    /**
     * Get nombtotaense
     *
     * @return integer
     */
    public function getNombtotaense()
    {
        return $this->nombtotaense;
    }

    /**
     * Set codeheurense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureHeureenseignement $codeheurense
     * @return EffectiveenseignentGradeheuretravail
     */
    public function setCodeheurense(\Sise\Bundle\CoreBundle\Entity\NomenclatureHeureenseignement $codeheurense)
    {
        $this->codeheurense = $codeheurense;

        return $this;
    }

    /**
     * Get codeheurense
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureHeureenseignement 
     */
    public function getCodeheurense()
    {
        return $this->codeheurense;
    }

    /**
     * Set codegrad
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureGrade $codegrad
     * @return EffectiveenseignentGradeheuretravail
     */
    public function setCodegrad(\Sise\Bundle\CoreBundle\Entity\NomenclatureGrade $codegrad)
    {
        $this->codegrad = $codegrad;

        return $this;
    }

    /**
     * Get codegrad
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureGrade 
     */
    public function getCodegrad()
    {
        return $this->codegrad;
    }
}

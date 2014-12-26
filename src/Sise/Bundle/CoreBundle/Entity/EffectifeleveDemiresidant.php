<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveDemiresidant
 *
 * @ORM\Table(name="effectifeleve_demiresidant", indexes={@ORM\Index(name="FK_EffectifEleve_DemiResidant_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectifeleveDemiresidant
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
     * @ORM\ManyToOne(targetEntity="NomenclatureCycleenseignement")
     * @ORM\JoinColumn(name="CodeCyclEnse", referencedColumnName="CodeCyclEnse")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codecyclense;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevResiMasc", type="integer", nullable=true)
     */
    private $nombelevresimasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevResiFemi", type="integer", nullable=true)
     */
    private $nombelevresifemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaResiElev", type="integer", nullable=true)
     */
    private $nombtotaresielev;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevBourMasc", type="integer", nullable=true)
     */
    private $nombelevbourmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevBourFemi", type="integer", nullable=true)
     */
    private $nombelevbourfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaBourElev", type="integer", nullable=true)
     */
    private $nombtotabourelev;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombBour", type="integer", nullable=true)
     */
    private $nombbour;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectifeleveDemiresidant
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
     * @return EffectifeleveDemiresidant
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
     * @return EffectifeleveDemiresidant
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
     * @return EffectifeleveDemiresidant
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
     * Set nombelevresimasc
     *
     * @param integer $nombelevresimasc
     * @return EffectifeleveDemiresidant
     */
    public function setNombelevresimasc($nombelevresimasc)
    {
        $this->nombelevresimasc = $nombelevresimasc;

        return $this;
    }

    /**
     * Get nombelevresimasc
     *
     * @return integer 
     */
    public function getNombelevresimasc()
    {
        return $this->nombelevresimasc;
    }

    /**
     * Set nombelevresifemi
     *
     * @param integer $nombelevresifemi
     * @return EffectifeleveDemiresidant
     */
    public function setNombelevresifemi($nombelevresifemi)
    {
        $this->nombelevresifemi = $nombelevresifemi;

        return $this;
    }

    /**
     * Get nombelevresifemi
     *
     * @return integer 
     */
    public function getNombelevresifemi()
    {
        return $this->nombelevresifemi;
    }

    /**
     * Set nombtotaresielev
     *
     * @param integer $nombtotaresielev
     * @return EffectifeleveDemiresidant
     */
    public function setNombtotaresielev($nombtotaresielev)
    {
        $this->nombtotaresielev = $nombtotaresielev;

        return $this;
    }

    /**
     * Get nombtotaresielev
     *
     * @return integer 
     */
    public function getNombtotaresielev()
    {
        return $this->nombtotaresielev;
    }

    /**
     * Set nombelevbourmasc
     *
     * @param integer $nombelevbourmasc
     * @return EffectifeleveDemiresidant
     */
    public function setNombelevbourmasc($nombelevbourmasc)
    {
        $this->nombelevbourmasc = $nombelevbourmasc;

        return $this;
    }

    /**
     * Get nombelevbourmasc
     *
     * @return integer 
     */
    public function getNombelevbourmasc()
    {
        return $this->nombelevbourmasc;
    }

    /**
     * Set nombelevbourfemi
     *
     * @param integer $nombelevbourfemi
     * @return EffectifeleveDemiresidant
     */
    public function setNombelevbourfemi($nombelevbourfemi)
    {
        $this->nombelevbourfemi = $nombelevbourfemi;

        return $this;
    }

    /**
     * Get nombelevbourfemi
     *
     * @return integer 
     */
    public function getNombelevbourfemi()
    {
        return $this->nombelevbourfemi;
    }

    /**
     * Set nombtotabourelev
     *
     * @param integer $nombtotabourelev
     * @return EffectifeleveDemiresidant
     */
    public function setNombtotabourelev($nombtotabourelev)
    {
        $this->nombtotabourelev = $nombtotabourelev;

        return $this;
    }

    /**
     * Get nombtotabourelev
     *
     * @return integer 
     */
    public function getNombtotabourelev()
    {
        return $this->nombtotabourelev;
    }

    /**
     * Set nombbour
     *
     * @param integer $nombbour
     * @return EffectifeleveDemiresidant
     */
    public function setNombbour($nombbour)
    {
        $this->nombbour = $nombbour;

        return $this;
    }

    /**
     * Get nombbour
     *
     * @return integer 
     */
    public function getNombbour()
    {
        return $this->nombbour;
    }


    /**
     * Set codecyclense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense
     * @return EffectifeleveDemiresidant
     */
    public function setCodecyclense(\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense)
    {
        $this->codecyclense = $codecyclense;

        return $this;
    }

    /**
     * Get codecyclense
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement 
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentGradediscipline
 *
 * @ORM\Table(name="effectiveenseignent_gradediscipline", indexes={@ORM\Index(name="FK_EffectiveEnseignent_GradeDiscipline_Nomenclature_Discipline", columns={"CodeDisci"}), @ORM\Index(name="FK_EffectiveEnseignent_GradeDiscipline_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectiveEnseignent_GradeDiscipline_Nomenclature_Grade", columns={"CodeGrad"})})
 * @ORM\Entity
 */
class EffectiveenseignentGradediscipline
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
     * @var \NomenclatureDiscipline
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NomenclatureDiscipline")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeDisci", referencedColumnName="CodeDisci")
     * })
     */
    private $codedisci;

    /**
     * @var \NomenclatureGrade
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NomenclatureGrade")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeGrad", referencedColumnName="CodeGrad")
     * })
     */
    private $codegrad;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnseTuniMasc", type="integer", nullable=true)
     */
    private $nombensetunimasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnseTuniFemi", type="integer", nullable=true)
     */
    private $nombensetunifemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnseEtraMasc", type="integer", nullable=true)
     */
    private $nombenseetramasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombEnseEtraFemi", type="integer", nullable=true)
     */
    private $nombenseetrafemi;

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
     * @return EffectiveenseignentGradediscipline
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
     * @return EffectiveenseignentGradediscipline
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
     * @return EffectiveenseignentGradediscipline
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
     * @return EffectiveenseignentGradediscipline
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
     * Set codedisci
     *
     * @param string $codedisci
     * @return EffectiveenseignentGradediscipline
     */
    public function setCodedisci($codedisci)
    {
        $this->codedisci = $codedisci;

        return $this;
    }

    /**
     * Get codedisci
     *
     * @return string 
     */
    public function getCodedisci()
    {
        return $this->codedisci;
    }

    /**
     * Set codegrad
     *
     * @param string $codegrad
     * @return EffectiveenseignentGradediscipline
     */
    public function setCodegrad($codegrad)
    {
        $this->codegrad = $codegrad;

        return $this;
    }

    /**
     * Get codegrad
     *
     * @return string 
     */
    public function getCodegrad()
    {
        return $this->codegrad;
    }

    /**
     * Set nombensetunimasc
     *
     * @param integer $nombensetunimasc
     * @return EffectiveenseignentGradediscipline
     */
    public function setNombensetunimasc($nombensetunimasc)
    {
        $this->nombensetunimasc = $nombensetunimasc;

        return $this;
    }

    /**
     * Get nombensetunimasc
     *
     * @return integer 
     */
    public function getNombensetunimasc()
    {
        return $this->nombensetunimasc;
    }

    /**
     * Set nombensetunifemi
     *
     * @param integer $nombensetunifemi
     * @return EffectiveenseignentGradediscipline
     */
    public function setNombensetunifemi($nombensetunifemi)
    {
        $this->nombensetunifemi = $nombensetunifemi;

        return $this;
    }

    /**
     * Get nombensetunifemi
     *
     * @return integer 
     */
    public function getNombensetunifemi()
    {
        return $this->nombensetunifemi;
    }

    /**
     * Set nombenseetramasc
     *
     * @param integer $nombenseetramasc
     * @return EffectiveenseignentGradediscipline
     */
    public function setNombenseetramasc($nombenseetramasc)
    {
        $this->nombenseetramasc = $nombenseetramasc;

        return $this;
    }

    /**
     * Get nombenseetramasc
     *
     * @return integer 
     */
    public function getNombenseetramasc()
    {
        return $this->nombenseetramasc;
    }

    /**
     * Set nombenseetrafemi
     *
     * @param integer $nombenseetrafemi
     * @return EffectiveenseignentGradediscipline
     */
    public function setNombenseetrafemi($nombenseetrafemi)
    {
        $this->nombenseetrafemi = $nombenseetrafemi;

        return $this;
    }

    /**
     * Get nombenseetrafemi
     *
     * @return integer 
     */
    public function getNombenseetrafemi()
    {
        return $this->nombenseetrafemi;
    }

    /**
     * Set nombtotaense
     *
     * @param integer $nombtotaense
     * @return EffectiveenseignentGradediscipline
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
}

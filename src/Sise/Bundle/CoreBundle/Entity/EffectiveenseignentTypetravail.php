<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveenseignentTypetravail
 *
 * @ORM\Table(name="effectiveenseignent_typetravail", indexes={@ORM\Index(name="FK_EffectiveEnseignent_TypeTravail_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectiveEnseignent_TypeTravail_Nomenclature_TypeTravail", columns={"CodeTypeTrav"})})
 * @ORM\Entity
 */
class EffectiveenseignentTypetravail
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
     * @var \NomenclatureTypetravail
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="NomenclatureTypetravail")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeTrav", referencedColumnName="CodeTypeTrav")
     * })
     */
    private $codetypetrav;

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
     * @return EffectiveenseignentTypetravail
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
     * @return EffectiveenseignentTypetravail
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
     * @return EffectiveenseignentTypetravail
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
     * @return EffectiveenseignentTypetravail
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
     * Set codetypetrav
     *
     * @param string $codetypetrav
     * @return EffectiveenseignentTypetravail
     */
    public function setCodetypetrav($codetypetrav)
    {
        $this->codetypetrav = $codetypetrav;

        return $this;
    }

    /**
     * Get codetypetrav
     *
     * @return string
     */
    public function getCodetypetrav()
    {
        return $this->codetypetrav;
    }

    /**
     * Set nombensemasc
     *
     * @param integer $nombensemasc
     * @return EffectiveenseignentTypetravail
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
     * @return EffectiveenseignentTypetravail
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
     * @return EffectiveenseignentTypetravail
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

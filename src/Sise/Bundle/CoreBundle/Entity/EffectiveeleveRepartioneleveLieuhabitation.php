<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectiveeleveRepartioneleveLieuhabitation
 *
 * @ORM\Table(name="effectiveeleve_repartioneleve_lieuhabitation", indexes={@ORM\Index(name="FK_EffectiveEleve_RepartionEleve_LieuHabitation_Nomenclature_D54", columns={"CodeDele"}), @ORM\Index(name="FK_EffectiveEleve_RepartionEleve_LieuHabitation_Nomenclature_R55", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectiveeleveRepartioneleveLieuhabitation
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @var string
     *
     * @ORM\Column(name="CodeDele", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codedele;

    /**
     * @var string
     * @ORM\Column(name="Lieu", type="string", length=50, nullable=false)
     */
    private $lieu;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElev", type="integer", nullable=true)
     */
    private $nombelev;

    /**
     * @var float
     *
     * @ORM\Column(name="Dist", type="float", precision=10, scale=0, nullable=true)
     */
    private $dist;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * @return EffectiveeleveRepartioneleveLieuhabitation
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
     * Set codedele
     *
     * @param string $codedele
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setCodedele($codedele)
    {
        $this->codedele = $codedele;

        return $this;
    }

    /**
     * Get codedele
     *
     * @return string 
     */
    public function getCodedele()
    {
        return $this->codedele;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set nombelev
     *
     * @param integer $nombelev
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setNombelev($nombelev)
    {
        $this->nombelev = $nombelev;

        return $this;
    }

    /**
     * Get nombelev
     *
     * @return integer 
     */
    public function getNombelev()
    {
        return $this->nombelev;
    }

    /**
     * Set dist
     *
     * @param float $dist
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setDist($dist)
    {
        $this->dist = $dist;

        return $this;
    }

    /**
     * Get dist
     *
     * @return float 
     */
    public function getDist()
    {
        return $this->dist;
    }

    /**
     * Set id
     *
     * @param integer $id
     * @return EffectiveeleveRepartioneleveLieuhabitation
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}

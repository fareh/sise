<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveReussifin9technique
 *
 * @ORM\Table(name="effectifeleve_reussifin9technique", indexes={@ORM\Index(name="FK_EffectifEleve_ReussiFin9Technique_Nomenclature_Domaine", columns={"CodeDoma"}), @ORM\Index(name="FK_EffectifEleve_ReussiFin9Technique_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectifeleveReussifin9technique
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
     * @ORM\ManyToOne(targetEntity="NomenclatureDomaine")
     * @ORM\JoinColumn(name="CodeDoma", referencedColumnName="CodeDoma")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codedoma;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevInscMasc", type="integer", nullable=true)
     */
    private $nombelevinscmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevInscFemi", type="integer", nullable=true)
     */
    private $nombelevinscfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaInscElev", type="integer", nullable=true)
     */
    private $nombtotainscelev;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevReusMasc", type="integer", nullable=true)
     */
    private $nombelevreusmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevReusFemi", type="integer", nullable=true)
     */
    private $nombelevreusfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaReusElev", type="integer", nullable=true)
     */
    private $nombtotareuselev;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectifeleveReussifin9technique
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
     * @return EffectifeleveReussifin9technique
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
     * @return EffectifeleveReussifin9technique
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
     * @return EffectifeleveReussifin9technique
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
     * Set nombelevinscmasc
     *
     * @param integer $nombelevinscmasc
     * @return EffectifeleveReussifin9technique
     */
    public function setNombelevinscmasc($nombelevinscmasc)
    {
        $this->nombelevinscmasc = $nombelevinscmasc;

        return $this;
    }

    /**
     * Get nombelevinscmasc
     *
     * @return integer
     */
    public function getNombelevinscmasc()
    {
        return $this->nombelevinscmasc;
    }

    /**
     * Set nombelevinscfemi
     *
     * @param integer $nombelevinscfemi
     * @return EffectifeleveReussifin9technique
     */
    public function setNombelevinscfemi($nombelevinscfemi)
    {
        $this->nombelevinscfemi = $nombelevinscfemi;

        return $this;
    }

    /**
     * Get nombelevinscfemi
     *
     * @return integer
     */
    public function getNombelevinscfemi()
    {
        return $this->nombelevinscfemi;
    }

    /**
     * Set nombtotainscelev
     *
     * @param integer $nombtotainscelev
     * @return EffectifeleveReussifin9technique
     */
    public function setNombtotainscelev($nombtotainscelev)
    {
        $this->nombtotainscelev = $nombtotainscelev;

        return $this;
    }

    /**
     * Get nombtotainscelev
     *
     * @return integer
     */
    public function getNombtotainscelev()
    {
        return $this->nombtotainscelev;
    }

    /**
     * Set nombelevreusmasc
     *
     * @param integer $nombelevreusmasc
     * @return EffectifeleveReussifin9technique
     */
    public function setNombelevreusmasc($nombelevreusmasc)
    {
        $this->nombelevreusmasc = $nombelevreusmasc;

        return $this;
    }


    /**
     * Get nombelevreusmasc
     *
     * @return integer
     */
    public function getNombelevreusmasc()
    {
        return $this->nombelevreusmasc;
    }

    /**
     * Set nombelevreusfemi
     *
     * @param integer $nombelevreusfemi
     * @return EffectifeleveReussifin9technique
     */
    public function setNombelevreusfemi($nombelevreusfemi)
    {
        $this->nombelevreusfemi = $nombelevreusfemi;

        return $this;
    }


    /**
     * Get nombelevreusfemi
     *
     * @return integer
     */
    public function getNombelevreusfemi()
    {
        return $this->nombelevreusfemi;
    }

    /**
     * Set nombtotareuselev
     *
     * @param integer $nombtotareuselev
     * @return EffectifeleveReussifin9technique
     */
    public function setNombtotareuselev($nombtotareuselev)
    {
        $this->nombtotareuselev = $nombtotareuselev;

        return $this;
    }

    /**
     * Get nombtotareuselev
     *
     * @return integer
     */
    public function getNombtotareuselev()
    {
        return $this->nombtotareuselev;
    }


    /**
     * Set codedoma
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDomaine $codedoma
     * @return EffectifeleveReussifin9technique
     */
    public function setCodedoma(\Sise\Bundle\CoreBundle\Entity\NomenclatureDomaine $codedoma)
    {
        $this->codedoma = $codedoma;

        return $this;
    }

    /**
     * Get codedoma
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureDomaine
     */
    public function getCodedoma()
    {
        return $this->codedoma;
    }
}

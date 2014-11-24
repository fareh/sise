<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrientationElevereussitroisiemeannee
 *
 * @ORM\Table(name="orientation_elevereussitroisiemeannee", indexes={@ORM\Index(name="FK_Orientation_EleveReussiTroisiemeAnnee_Nomenclature_Filiere", columns={"CodeFiliOrig"}), @ORM\Index(name="FK_Orientation_EleveReussiTroisiemeAnnee_Nomenclature_Filiere1", columns={"CodeFiliReOrie"}), @ORM\Index(name="FK_Orientation_EleveReussiTroisiemeAnnee_Nomenclature_Recensem41", columns={"CodeRece"})})
 * @ORM\Entity
 */
class OrientationElevereussitroisiemeannee
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
     * @var string
     *
     * @ORM\Column(name="CodeFiliOrig", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefiliorig;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeFiliReOrie", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefilireorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevMasc", type="integer", nullable=true)
     */
    private $nombelevmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombElevFemi", type="integer", nullable=true)
     */
    private $nombelevfemi;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return OrientationElevereussitroisiemeannee
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
     * @return OrientationElevereussitroisiemeannee
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
     * @return OrientationElevereussitroisiemeannee
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
     * @return OrientationElevereussitroisiemeannee
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
     * Set codefiliorig
     *
     * @param string $codefiliorig
     * @return OrientationElevereussitroisiemeannee
     */
    public function setCodefiliorig($codefiliorig)
    {
        $this->codefiliorig = $codefiliorig;

        return $this;
    }

    /**
     * Get codefiliorig
     *
     * @return string 
     */
    public function getCodefiliorig()
    {
        return $this->codefiliorig;
    }

    /**
     * Set codefilireorie
     *
     * @param string $codefilireorie
     * @return OrientationElevereussitroisiemeannee
     */
    public function setCodefilireorie($codefilireorie)
    {
        $this->codefilireorie = $codefilireorie;

        return $this;
    }

    /**
     * Get codefilireorie
     *
     * @return string 
     */
    public function getCodefilireorie()
    {
        return $this->codefilireorie;
    }

    /**
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return OrientationElevereussitroisiemeannee
     */
    public function setNombelevmasc($nombelevmasc)
    {
        $this->nombelevmasc = $nombelevmasc;

        return $this;
    }

    /**
     * Get nombelevmasc
     *
     * @return integer 
     */
    public function getNombelevmasc()
    {
        return $this->nombelevmasc;
    }

    /**
     * Set nombelevfemi
     *
     * @param integer $nombelevfemi
     * @return OrientationElevereussitroisiemeannee
     */
    public function setNombelevfemi($nombelevfemi)
    {
        $this->nombelevfemi = $nombelevfemi;

        return $this;
    }

    /**
     * Get nombelevfemi
     *
     * @return integer 
     */
    public function getNombelevfemi()
    {
        return $this->nombelevfemi;
    }
}

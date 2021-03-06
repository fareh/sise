<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrientationEleveredoublantdeuxiemeannee
 *
 * @ORM\Table(name="orientation_eleveredoublantdeuxiemeannee")
 * @ORM\Entity
 */
class OrientationEleveredoublantdeuxiemeannee
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
     * @var \NomenclatureFiliere
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureFiliere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeFiliOrig", referencedColumnName="CodeFili")
     * })
     */
    private $codefiliorig;

    /**
     * @var \NomenclatureFiliere
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureFiliere")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeFiliReOrie", referencedColumnName="CodeFili")
     * })
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
     * @var integer
     *
     * @ORM\Column(name="NombTotaElev", type="integer", nullable=true)
     */
    private $nombtotaelev;

    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return OrientationEleveredoublantdeuxiemeannee
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
     * @return OrientationEleveredoublantdeuxiemeannee
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
     * @return OrientationEleveredoublantdeuxiemeannee
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
     * @return OrientationEleveredoublantdeuxiemeannee
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
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return OrientationEleveredoublantdeuxiemeannee
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
     * @return OrientationEleveredoublantdeuxiemeannee
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

    /**
     * Set nombtotaelev
     *
     * @param integer $nombtotaelev
     * @return OrientationEleveredoublantdeuxiemeannee
     */
    public function setNombtotaelev($nombtotaelev)
    {
        $this->nombtotaelev = $nombtotaelev;

        return $this;
    }

    /**
     * Get nombtotaelev
     *
     * @return integer
     */
    public function getNombtotaelev()
    {
        return $this->nombtotaelev;
    }

    /**
     * Set codefiliorig
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefiliorig
     * @return OrientationEleveredoublantdeuxiemeannee
     */
    public function setCodefiliorig(\Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefiliorig)
    {
        $this->codefiliorig = $codefiliorig;

        return $this;
    }

    /**
     * Get codefiliorig
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere
     */
    public function getCodefiliorig()
    {
        return $this->codefiliorig;
    }

    /**
     * Set codefilireorie
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefilireorie
     * @return OrientationEleveredoublantdeuxiemeannee
     */
    public function setCodefilireorie(\Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefilireorie)
    {
        $this->codefilireorie = $codefilireorie;

        return $this;
    }

    /**
     * Get codefilireorie
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere
     */
    public function getCodefilireorie()
    {
        return $this->codefilireorie;
    }
}

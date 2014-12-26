<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;
/**
 * OrientationFilieresport
 *
 * @ORM\Table(name="orientation_filieresport")
 * @ORM\Entity
 */
class OrientationFilieresport
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
     * @var integer
     *
     * @ORM\Column(name="Anne", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $anne;

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
     * @return OrientationFilieresport
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
     * @return OrientationFilieresport
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
     * @return OrientationFilieresport
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
     * @return OrientationFilieresport
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
     * @return OrientationFilieresport
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
     * Set anne
     *
     * @param integer $anne
     * @return OrientationFilieresport
     */
    public function setAnne($anne)
    {
        $this->anne = $anne;

        return $this;
    }

    /**
     * Get anne
     *
     * @return integer 
     */
    public function getAnne()
    {
        return $this->anne;
    }

    /**
     * Set nombelevmasc
     *
     * @param integer $nombelevmasc
     * @return OrientationFilieresport
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
     * @return OrientationFilieresport
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
     * @var \EtablissementFicheetablissement
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="EtablissementFicheetablissement",inversedBy="oriefilispor")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab"),
     *   @ORM\JoinColumn(name="AnneScol", referencedColumnName="AnneScol"),
     *   @ORM\JoinColumn(name="CodeRece", referencedColumnName="CodeRece"),
     * })
     */
    private $fichetaboriefilispor;

    /**
     * @return \EtablissementFicheetablissement
     */
    public function getFichetaboriefilispor()
    {
        return $this->fichetaboriefilispor;
    }

    /**
     * @param \EtablissementFicheetablissement $fichetaboriefilispor
     */
    public function setFichetaboriefilispor($fichetaboriefilispor)
    {
        $this->fichetaboriefilispor = $fichetaboriefilispor;
    }
    public function __toString()
    {
        return $this->codeetab;
    }
}

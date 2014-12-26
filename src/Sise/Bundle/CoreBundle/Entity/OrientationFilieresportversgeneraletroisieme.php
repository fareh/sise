<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrientationFilieresportversgeneraletroisieme
 *
 * @ORM\Table(name="orientation_filieresportversgeneraletroisieme", indexes={@ORM\Index(name="FK_Orientation_FiliereSportVersGeneraleTroisieme_Nomenclature_4", columns={"CodeFiliOrig"}), @ORM\Index(name="FK_Orientation_FiliereSportVersGeneraleTroisieme_Nomenclature_5", columns={"CodeRece"})})
 * @ORM\Entity
 */
class OrientationFilieresportversgeneraletroisieme
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
     * @var boolean
     *
     * @ORM\Column(name="Redo", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $redo;

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
     * @return OrientationFilieresportversgeneraletroisieme
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
     * @return OrientationFilieresportversgeneraletroisieme
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
     * @return OrientationFilieresportversgeneraletroisieme
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
     * @return OrientationFilieresportversgeneraletroisieme
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
     * @return OrientationFilieresportversgeneraletroisieme
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
     * Set redo
     *
     * @param boolean $redo
     * @return OrientationFilieresportversgeneraletroisieme
     */
    public function setRedo($redo)
    {
        $this->redo = $redo;

        return $this;
    }

    /**
     * Get redo
     *
     * @return boolean
     */
    public function getRedo()
    {
        return $this->redo;
    }

    /**
     * Set anne
     *
     * @param integer $anne
     * @return OrientationFilieresportversgeneraletroisieme
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
     * @return OrientationFilieresportversgeneraletroisieme
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
     * @return OrientationFilieresportversgeneraletroisieme
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

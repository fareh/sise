<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrientationFilieresportversgenerale
 *
 * @ORM\Table(name="orientation_filieresportversgenerale", indexes={@ORM\Index(name="FK_Orientation_FiliereSportVersGenerale_Nomenclature_Filiere", columns={"CodeFiliOrig"}), @ORM\Index(name="FK_Orientation_FiliereSportVersGenerale_Nomenclature_Filiere1", columns={"CodeFiliReOrie"}), @ORM\Index(name="FK_Orientation_FiliereSportVersGenerale_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class OrientationFilieresportversgenerale
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
     * @var integer
     *
     * @ORM\Column(name="AnneFiliOrig", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annefiliorig;

    /**
     * @var boolean
     *
     * @ORM\Column(name="RedoFiliOrig", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $redofiliorig;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeFiliOrig", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefiliorig;

    /**
     * @var integer
     *
     * @ORM\Column(name="AnneFiliReOrie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $annefilireorie;

    /**
     * @var boolean
     *
     * @ORM\Column(name="RedoFiliReOrie", type="boolean", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $redofilireorie;

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
     * @ORM\Column(name="NombElevFeme", type="integer", nullable=true)
     */
    private $nombelevfeme;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return OrientationFilieresportversgenerale
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
     * @return OrientationFilieresportversgenerale
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
     * @return OrientationFilieresportversgenerale
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
     * @return OrientationFilieresportversgenerale
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
     * Set annefiliorig
     *
     * @param integer $annefiliorig
     * @return OrientationFilieresportversgenerale
     */
    public function setAnnefiliorig($annefiliorig)
    {
        $this->annefiliorig = $annefiliorig;

        return $this;
    }

    /**
     * Get annefiliorig
     *
     * @return integer 
     */
    public function getAnnefiliorig()
    {
        return $this->annefiliorig;
    }

    /**
     * Set redofiliorig
     *
     * @param boolean $redofiliorig
     * @return OrientationFilieresportversgenerale
     */
    public function setRedofiliorig($redofiliorig)
    {
        $this->redofiliorig = $redofiliorig;

        return $this;
    }

    /**
     * Get redofiliorig
     *
     * @return boolean 
     */
    public function getRedofiliorig()
    {
        return $this->redofiliorig;
    }

    /**
     * Set codefiliorig
     *
     * @param string $codefiliorig
     * @return OrientationFilieresportversgenerale
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
     * Set annefilireorie
     *
     * @param integer $annefilireorie
     * @return OrientationFilieresportversgenerale
     */
    public function setAnnefilireorie($annefilireorie)
    {
        $this->annefilireorie = $annefilireorie;

        return $this;
    }

    /**
     * Get annefilireorie
     *
     * @return integer 
     */
    public function getAnnefilireorie()
    {
        return $this->annefilireorie;
    }

    /**
     * Set redofilireorie
     *
     * @param boolean $redofilireorie
     * @return OrientationFilieresportversgenerale
     */
    public function setRedofilireorie($redofilireorie)
    {
        $this->redofilireorie = $redofilireorie;

        return $this;
    }

    /**
     * Get redofilireorie
     *
     * @return boolean 
     */
    public function getRedofilireorie()
    {
        return $this->redofilireorie;
    }

    /**
     * Set codefilireorie
     *
     * @param string $codefilireorie
     * @return OrientationFilieresportversgenerale
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
     * @return OrientationFilieresportversgenerale
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
     * Set nombelevfeme
     *
     * @param integer $nombelevfeme
     * @return OrientationFilieresportversgenerale
     */
    public function setNombelevfeme($nombelevfeme)
    {
        $this->nombelevfeme = $nombelevfeme;

        return $this;
    }

    /**
     * Get nombelevfeme
     *
     * @return integer 
     */
    public function getNombelevfeme()
    {
        return $this->nombelevfeme;
    }
}

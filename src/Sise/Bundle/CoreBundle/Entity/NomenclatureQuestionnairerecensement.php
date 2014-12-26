<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureQuestionnairerecensement
 *
 * @ORM\Table(name="nomenclature_questionnairerecensement", indexes={@ORM\Index(name="FK_Nomenclature_QuestionnaireRecenssement_Nomenclature_Recenss72", columns={"CodeRece"}), @ORM\Index(name="FK_Nomenclature_QuestionnaireRecensement_Nomenclature_Etabliss73", columns={"CodeEtab", "CodeTypeEtab"})})
 * @ORM\Entity
 */
class NomenclatureQuestionnairerecensement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeQues", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeques;

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
     * @var boolean
     *
     * @ORM\Column(name="Etat", type="boolean", nullable=false)
     */
    private $etat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EtatDireRegi", type="boolean", nullable=false)
     */
    private $etatdireregi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="EtatDireCent", type="boolean", nullable=false)
     */
    private $etatdirecent;


    public function __construct($codeetab, $codetypeetab, $annescol, $coderece)
    {
        $this->codeetab = $codeetab;
        $this->codetypeetab = $codetypeetab;
        $this->annescol = $annescol;
        $this->coderece = $coderece;
    }


    /**
     * Set codeques
     *
     * @param string $codeques
     * @return NomenclatureQuestionnairerecensement
     */
    public function setCodeques($codeques)
    {
        $this->codeques = $codeques;

        return $this;
    }

    /**
     * Get codeques
     *
     * @return string
     */
    public function getCodeques()
    {
        return $this->codeques;
    }

    /**
     * Set coderece
     *
     * @param string $coderece
     * @return NomenclatureQuestionnairerecensement
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
     * Set codeetab
     *
     * @param string $codeetab
     * @return NomenclatureQuestionnairerecensement
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
     * @return NomenclatureQuestionnairerecensement
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
     * @return NomenclatureQuestionnairerecensement
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
     * Set etat
     *
     * @param boolean $etat
     * @return NomenclatureQuestionnairerecensement
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return boolean
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set etatdireregi
     *
     * @param boolean $etatdireregi
     * @return NomenclatureQuestionnairerecensement
     */
    public function setEtatdireregi($etatdireregi)
    {
        $this->etatdireregi = $etatdireregi;

        return $this;
    }

    /**
     * Get etatdireregi
     *
     * @return boolean
     */
    public function getEtatdireregi()
    {
        return $this->etatdireregi;
    }

    /**
     * Set etatdirecent
     *
     * @param boolean $etatdirecent
     * @return NomenclatureQuestionnairerecensement
     */
    public function setEtatdirecent($etatdirecent)
    {
        $this->etatdirecent = $etatdirecent;

        return $this;
    }

    /**
     * Get etatdirecent
     *
     * @return boolean
     */
    public function getEtatdirecent()
    {
        return $this->etatdirecent;
    }
}

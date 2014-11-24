<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectivepersonelPersonelGrade
 *
 * @ORM\Table(name="effectivepersonel_personel_grade", indexes={@ORM\Index(name="FK_EffectivePersonel_Personel_Grade_Nomenclature_Recensement", columns={"CodeRece"}), @ORM\Index(name="FK_EffectivePersonel_Personel_Grade_Nomenclature_Grade", columns={"CodeGrad"})})
 * @ORM\Entity
 */
class EffectivepersonelPersonelGrade
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
     * @ORM\Column(name="CodeGrad", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codegrad;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombPersMasc", type="integer", nullable=true)
     */
    private $nombpersmasc;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombPersFemi", type="integer", nullable=true)
     */
    private $nombpersfemi;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombTotaPers", type="integer", nullable=true)
     */
    private $nombtotapers;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectivepersonelPersonelGrade
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
     * @return EffectivepersonelPersonelGrade
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
     * @return EffectivepersonelPersonelGrade
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
     * @return EffectivepersonelPersonelGrade
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
     * Set codegrad
     *
     * @param string $codegrad
     * @return EffectivepersonelPersonelGrade
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
     * Set nombpersmasc
     *
     * @param integer $nombpersmasc
     * @return EffectivepersonelPersonelGrade
     */
    public function setNombpersmasc($nombpersmasc)
    {
        $this->nombpersmasc = $nombpersmasc;

        return $this;
    }

    /**
     * Get nombpersmasc
     *
     * @return integer 
     */
    public function getNombpersmasc()
    {
        return $this->nombpersmasc;
    }

    /**
     * Set nombpersfemi
     *
     * @param integer $nombpersfemi
     * @return EffectivepersonelPersonelGrade
     */
    public function setNombpersfemi($nombpersfemi)
    {
        $this->nombpersfemi = $nombpersfemi;

        return $this;
    }

    /**
     * Get nombpersfemi
     *
     * @return integer 
     */
    public function getNombpersfemi()
    {
        return $this->nombpersfemi;
    }

    /**
     * Set nombtotapers
     *
     * @param integer $nombtotapers
     * @return EffectivepersonelPersonelGrade
     */
    public function setNombtotapers($nombtotapers)
    {
        $this->nombtotapers = $nombtotapers;

        return $this;
    }

    /**
     * Get nombtotapers
     *
     * @return integer 
     */
    public function getNombtotapers()
    {
        return $this->nombtotapers;
    }
}

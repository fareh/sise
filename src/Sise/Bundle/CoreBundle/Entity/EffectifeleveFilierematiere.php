<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EffectifeleveFilierematiere
 *
 * @ORM\Table(name="effectifeleve_filierematiere", indexes={@ORM\Index(name="FK_EffectifEleve_FiliereMatiere_Nomenclature_Filiere", columns={"CodeFili"}), @ORM\Index(name="FK_EffectifEleve_FiliereMatiere_Nomenclature_MatiereOptionnelle", columns={"CodeMatiOpti"}), @ORM\Index(name="FK_EffectifEleve_FiliereMatiere_Nomenclature_Recensement", columns={"CodeRece"})})
 * @ORM\Entity
 */
class EffectifeleveFilierematiere
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
     * @ORM\ManyToOne(targetEntity="NomenclatureMatiereoptionnelle")
     * @ORM\JoinColumn(name="CodeMatiOpti", referencedColumnName="CodeMatiOpti")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codematiopti;


    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureFiliere")
     * @ORM\JoinColumn(name="CodeFili", referencedColumnName="CodeFili")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codefili;


    /**
     * @var integer
     *
     * @ORM\Column(name="NombElev", type="integer", nullable=true)
     */
    private $nombelev;

    /**
     * @var integer
     *
     * @ORM\Column(name="NombGrou", type="integer", nullable=true)
     */
    private $nombgrou;


    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return EffectifeleveFilierematiere
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
     * @return EffectifeleveFilierematiere
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
     * @return EffectifeleveFilierematiere
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
     * @return EffectifeleveFilierematiere
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
     * Set nombelev
     *
     * @param integer $nombelev
     * @return EffectifeleveFilierematiere
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
     * Set nombgrou
     *
     * @param integer $nombgrou
     * @return EffectifeleveFilierematiere
     */
    public function setNombgrou($nombgrou)
    {
        $this->nombgrou = $nombgrou;

        return $this;
    }

    /**
     * Get nombgrou
     *
     * @return integer
     */
    public function getNombgrou()
    {
        return $this->nombgrou;
    }

    /**
     * Set codematiopti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle $codematiopti
     * @return EffectifeleveFilierematiere
     */
    public function setCodematiopti(\Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle $codematiopti)
    {
        $this->codematiopti = $codematiopti;

        return $this;
    }

    /**
     * Get codematiopti
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle 
     */
    public function getCodematiopti()
    {
        return $this->codematiopti;
    }

    /**
     * Set codefili
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefili
     * @return EffectifeleveFilierematiere
     */
    public function setCodefili(\Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefili)
    {
        $this->codefili = $codefili;

        return $this;
    }

    /**
     * Get codefili
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere 
     */
    public function getCodefili()
    {
        return $this->codefili;
    }
}

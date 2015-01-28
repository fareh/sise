<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureParametreexogene
 *
 * @ORM\Table(name="nomenclature_parametreexogene")
 * @ORM\Entity
 */
class NomenclatureParametreexogene
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CodeParaExog", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeparaexog;

    /**
     * @ORM\OneToMany(targetEntity="NomenclatureValueexogene", mappedBy="codeparaexog", cascade={"persist"})
     */
    protected $codevalueexogene ;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeFK", type="string", length=50, nullable=false)
     */
    private $codefk;


    /**
     * @ORM\OneToMany(targetEntity="NomenclatureParametrespindicateur", mappedBy="codeparaexog")
     */
    protected $codeparaindi;

    /**
     * @var string
     *
     * @ORM\Column(name="TablNameFK", type="string", length=250, nullable=true)
     */
    private $tablnamefk;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeParaExogAr", type="string", length=250, nullable=true)
     */
    private $libeparaexogar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeParaExogFr", type="string", length=250, nullable=true)
     */
    private $libeparaexogfr;


    /**
     * @var string
     *
     * @ORM\Column(name="ValeIndi", type="string", length=50, nullable=true)
     */
    private $valeindi;


    /**
     * @var string
     *
     * @ORM\Column(name="choicefk", type="string", length=250, nullable=true)
     */
    private $choicefk;

    /**
     * @return mixed
     */
    public function getChoicefk()
    {
        return $this->choicefk;
    }

    /**
     * @param mixed $choicefk
     */
    public function setChoicefk($choicefk)
    {
        $this->choicefk = $choicefk;
    }


    /**
     * Set codeparaexog
     *
     * @param string $codeparaexog
     * @return NomenclatureParametreexogene
     */
    public function setCodeparaexog($codeparaexog)
    {
        $this->codeparaexog = $codeparaexog;

        return $this;
    }

    /**
     * Get codeparaexog
     *
     * @return string
     */
    public function getCodeparaexog()
    {
        return $this->codeparaexog;
    }

    /**
     * Set codefk
     *
     * @param string $codefk
     * @return NomenclatureParametreexogene
     */
    public function setCodefk($codefk)
    {
        $this->codefk = $codefk;

        return $this;
    }

    /**
     * Get codefk
     *
     * @return string
     */
    public function getCodefk()
    {
        return $this->codefk;
    }

    /**
     * Set tablnamefk
     *
     * @param string $tablnamefk
     * @return NomenclatureParametreexogene
     */
    public function setTablnamefk($tablnamefk)
    {
        $this->tablnamefk = $tablnamefk;

        return $this;
    }

    /**
     * Get tablnamefk
     *
     * @return string
     */
    public function getTablnamefk()
    {
        return $this->tablnamefk;
    }

    /**
     * Set libeparaexogar
     *
     * @param string $libeparaexogar
     * @return NomenclatureParametreexogene
     */
    public function setLibeparaexogar($libeparaexogar)
    {
        $this->libeparaexogar = $libeparaexogar;

        return $this;
    }

    /**
     * Get libeparaexogar
     *
     * @return string
     */
    public function getLibeparaexogar()
    {
        return $this->libeparaexogar;
    }

    /**
     * Set libeparaexogfr
     *
     * @param string $libeparaexogfr
     * @return NomenclatureParametreexogene
     */
    public function setLibeparaexogfr($libeparaexogfr)
    {
        $this->libeparaexogfr = $libeparaexogfr;

        return $this;
    }

    /**
     * Get libeparaexogfr
     *
     * @return string
     */
    public function getLibeparaexogfr()
    {
        return $this->libeparaexogfr;
    }

    /**
     * Set valeindi
     *
     * @param string $valeindi
     * @return NomenclatureParametreexogene
     */
    public function setValeindi($valeindi)
    {
        $this->valeindi = $valeindi;

        return $this;
    }

    /**
     * Get valeindi
     *
     * @return string
     */
    public function getValeindi()
    {
        return $this->valeindi;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeparaindi = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add codeparaindi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureParametrespindicateur $codeparaindi
     * @return NomenclatureParametreexogene
     */
    public function addCodeparaindi(\Sise\Bundle\CoreBundle\Entity\NomenclatureParametrespindicateur $codeparaindi)
    {
        $this->codeparaindi[] = $codeparaindi;

        return $this;
    }

    /**
     * Remove codeparaindi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureParametrespindicateur $codeparaindi
     */
    public function removeCodeparaindi(\Sise\Bundle\CoreBundle\Entity\NomenclatureParametrespindicateur $codeparaindi)
    {
        $this->codeparaindi->removeElement($codeparaindi);
    }

    /**
     * Get codeparaindi
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodeparaindi()
    {
        return $this->codeparaindi;
    }

    public function __toString(){

        return ($this->getLibeparaexogar())?$this->getLibeparaexogar():"";
    }

    /**
     * Add codevalueexogene
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureValueexogene $codevalueexogene
     * @return NomenclatureParametreexogene
     */
    public function addCodevalueexogene(\Sise\Bundle\CoreBundle\Entity\NomenclatureValueexogene $codevalueexogene)
    {
        $this->codevalueexogene[] = $codevalueexogene;

        return $this;
    }

    /**
     * Remove codevalueexogene
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureValueexogene $codevalueexogene
     */
    public function removeCodevalueexogene(\Sise\Bundle\CoreBundle\Entity\NomenclatureValueexogene $codevalueexogene)
    {
        $this->codevalueexogene->removeElement($codevalueexogene);
    }

    /**
     * Get codevalueexogene
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodevalueexogene()
    {
        return $this->codevalueexogene;
    }
}

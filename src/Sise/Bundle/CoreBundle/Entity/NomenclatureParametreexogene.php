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
    protected $codevalueexogene;

    /**
     * @ORM\OneToMany(targetEntity="NomenclatureParametrespindicateur", mappedBy="codeparaexog")
     */
    protected $codeparaindi;

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
     * Constructor
     */
    public function __construct()
    {
        $this->codevalueexogene = new \Doctrine\Common\Collections\ArrayCollection();
        $this->codeparaindi = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codeparaexog
     *
     * @return integer 
     */
    public function getCodeparaexog()
    {
        return $this->codeparaexog;
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
     * Set choicefk
     *
     * @param string $choicefk
     * @return NomenclatureParametreexogene
     */
    public function setChoicefk($choicefk)
    {
        $this->choicefk = $choicefk;

        return $this;
    }

    /**
     * Get choicefk
     *
     * @return string 
     */
    public function getChoicefk()
    {
        return $this->choicefk;
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

      return  ($this->getLibeparaexogar())?$this->getLibeparaexogar():"";
    }
}

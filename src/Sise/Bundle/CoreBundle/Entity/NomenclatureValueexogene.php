<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureValueexogene
 *
 * @ORM\Table(name="nomenclature_valueexogene")
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Entity\NomenclatureValueexogeneRepository")
 */
class NomenclatureValueexogene
{
    /**
     * @var integer
     *
     * @ORM\Column(name="codeValueexogene", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $codevalueexogene;

    /**
     * @var NomenclatureParametreexogene
     * @ORM\ManyToOne(targetEntity="NomenclatureParametreexogene", inversedBy="codevalueexogene")
     * @ORM\JoinColumn(name="CodeParaExog", referencedColumnName="CodeParaExog")
     */
    private $codeparaexog;

    /**
     * @var string
     *
     * @ORM\Column(name="tablnamefk", type="string", length=250, nullable=true)
     */
    private $tablnamefk;

    /**
     * @var string
     *
     * @ORM\Column(name="valeindi", type="string", length=50, nullable=true)
     */
    private $valeindi;


    /**
     * Set tablnamefk
     *
     * @param string $tablnamefk
     * @return NomenclatureValueexogene
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
     * Set valeindi
     *
     * @param string $valeindi
     * @return NomenclatureValueexogene
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
     * Get codevalueexogene
     *
     * @return integer 
     */
    public function getCodevalueexogene()
    {
        return $this->codevalueexogene;
    }

    /**
     * Set codeparaexog
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene $codeparaexog
     * @return NomenclatureValueexogene
     */
    public function setCodeparaexog(\Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene $codeparaexog = null)
    {
        $this->codeparaexog = $codeparaexog;

        return $this;
    }

    /**
     * Get codeparaexog
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureParametreexogene 
     */
    public function getCodeparaexog()
    {
        return $this->codeparaexog;
    }
}

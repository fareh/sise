<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureIndicateurType;
/**
 * NomenclatureIndicateur
 *
 * @ORM\Table(name="nomenclature_indicateur")
 * @ORM\Entity
 */
class NomenclatureIndicateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="CodeIndi", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeindi;


    /**
     * @ORM\OneToMany(targetEntity="NomenclatureParametrespindicateur", mappedBy="codeindi", cascade={"persist"})
     */
    protected $codeparaindi;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeIndiAr", type="string", length=500, nullable=true)
     */
    private $libeindiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeIndiFr", type="string", length=500, nullable=true)
     */
    private $libeindifr;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrAffi", type="integer", nullable=true)
     */
    private $ordraffi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;

    /**
     * @var string
     *
     * @ORM\Column(name="Definition", type="string", length=500, nullable=true)
     */
    private $definition;

    /**
     * @var string
     *
     * @ORM\Column(name="SPIndicateur", type="string", length=500, nullable=true)
     */
    private $spindicateur;


    /**
     * Set libeindifr
     *
     * @param string $libeindifr
     * @return NomenclatureIndicateur
     */
    public function setLibeindifr($libeindifr)
    {
        $this->libeindifr = $libeindifr;

        return $this;
    }

    /**
     * Get libeindifr
     *
     * @return string
     */
    public function getLibeindifr()
    {
        return $this->libeindifr;
    }

    /**
     * Set libeindiar
     *
     * @param string $libeindiar
     * @return NomenclatureIndicateur
     */
    public function setLibeindiar($libeindiar)
    {
        $this->libeindiar = $libeindiar;

        return $this;
    }

    /**
     * Get libeindiar
     *
     * @return string
     */
    public function getLibeindiar()
    {
        return $this->libeindiar;
    }

    /**
     * Set definition
     *
     * @param string $definition
     * @return NomenclatureIndicateur
     */
    public function setDefinition($definition)
    {
        $this->definition = $definition;

        return $this;
    }

    /**
     * Get definition
     *
     * @return string
     */
    public function getDefinition()
    {
        return $this->definition;
    }

    /**
     * Set spindicateur
     *
     * @param string $spindicateur
     * @return NomenclatureIndicateur
     */
    public function setSpindicateur($spindicateur)
    {
        $this->spindicateur = $spindicateur;

        return $this;
    }

    /**
     * Get spindicateur
     *
     * @return string
     */
    public function getSpindicateur()
    {
        return $this->spindicateur;
    }

    /**
     * Set acti
     *
     * @param boolean $acti
     * @return NomenclatureIndicateur
     */
    public function setActi($acti)
    {
        $this->acti = $acti;

        return $this;
    }

    /**
     * Get acti
     *
     * @return boolean
     */
    public function getActi()
    {
        return $this->acti;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureIndicateur
     */
    public function setOrdraffi($ordraffi)
    {
        $this->ordraffi = $ordraffi;

        return $this;
    }

    /**
     * Get ordraffi
     *
     * @return integer
     */
    public function getOrdraffi()
    {
        return $this->ordraffi;
    }
    public function iterateVisible() {
        //   echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            $indice[]=$key;
        }
        return $indice;
    }
    public function getinstanceType() {
        //   echo "MyClass::iterateVisible:\n";
        $instancetype=new NomenclatureIndicateurType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codeindi;
    }    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeparaindi = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @param mixed $codeparaindi
     */
    public function setCodeparaindi(\Doctrine\Common\Collections\ArrayCollection $codeparaindis)
    {
        foreach($codeparaindis as $codeparaindi){

            $codeparaindi->setCodeindi($this);

        }
        $this->codeparaindi = $codeparaindis;
    }



    /**
     * Get codeindi
     *
     * @return string 
     */
    public function getCodeindi()
    {
        return $this->codeindi;
    }


    /**
     * Set codeindi
     *
     * @param integer $codeindi
     * @return NomenclatureIndicateur
     */

    public function setCodeindi($codeindi)
    {
        $this->codeindi = $codeindi;
    }

    /**
     * Add codeparaindi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureParametrespindicateur $codeparaindi
     * @return NomenclatureIndicateur
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

        return ($this->getLibeindiar())?$this->getLibeindiar():"";
    }
}

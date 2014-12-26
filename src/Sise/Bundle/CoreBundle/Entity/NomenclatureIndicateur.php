<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureIndicateur
 *
 * @ORM\Table(name="nomenclature_indicateur")
 * @ORM\Entity
 */
class NomenclatureIndicateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeIndi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeindi;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeIndiFr", type="string", length=500, nullable=true)
     */
    private $libeindifr;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeIndiAr", type="string", length=500, nullable=true)
     */
    private $libeindiar;

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
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrAffi", type="integer", nullable=true)
     */
    private $ordraffi;


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
}

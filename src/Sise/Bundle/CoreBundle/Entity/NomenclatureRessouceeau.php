<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureRessouceeau
 *
 * @ORM\Table(name="nomenclature_ressouceeau")
 * @ORM\Entity
 */
class NomenclatureRessouceeau
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRessEau", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coderesseau;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRessEauAr", type="string", length=50, nullable=true)
     */
    private $liberesseauar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRessEauFr", type="string", length=50, nullable=true)
     */
    private $liberesseaufr;

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
     * @var boolean
     *
     * @ORM\Column(name="Prep", type="boolean", nullable=false)
     */
    private $prep;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Prim", type="boolean", nullable=false)
     */
    private $prim;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CollGene", type="boolean", nullable=false)
     */
    private $collgene;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Lyce", type="boolean", nullable=false)
     */
    private $lyce;

    /**
     * @var boolean
     *
     * @ORM\Column(name="CollTech", type="boolean", nullable=false)
     */
    private $colltech;



    /**
     * Get coderesseau
     *
     * @return string 
     */
    public function getCoderesseau()
    {
        return $this->coderesseau;
    }

    /**
     * Set liberesseauar
     *
     * @param string $liberesseauar
     * @return NomenclatureRessouceeau
     */
    public function setLiberesseauar($liberesseauar)
    {
        $this->liberesseauar = $liberesseauar;

        return $this;
    }

    /**
     * Get liberesseauar
     *
     * @return string 
     */
    public function getLiberesseauar()
    {
        return $this->liberesseauar;
    }

    /**
     * Set liberesseaufr
     *
     * @param string $liberesseaufr
     * @return NomenclatureRessouceeau
     */
    public function setLiberesseaufr($liberesseaufr)
    {
        $this->liberesseaufr = $liberesseaufr;

        return $this;
    }

    /**
     * Get liberesseaufr
     *
     * @return string 
     */
    public function getLiberesseaufr()
    {
        return $this->liberesseaufr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureRessouceeau
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

    /**
     * Set acti
     *
     * @param boolean $acti
     * @return NomenclatureRessouceeau
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
     * Set prep
     *
     * @param boolean $prep
     * @return NomenclatureRessouceeau
     */
    public function setPrep($prep)
    {
        $this->prep = $prep;

        return $this;
    }

    /**
     * Get prep
     *
     * @return boolean 
     */
    public function getPrep()
    {
        return $this->prep;
    }

    /**
     * Set prim
     *
     * @param boolean $prim
     * @return NomenclatureRessouceeau
     */
    public function setPrim($prim)
    {
        $this->prim = $prim;

        return $this;
    }

    /**
     * Get prim
     *
     * @return boolean 
     */
    public function getPrim()
    {
        return $this->prim;
    }

    /**
     * Set collgene
     *
     * @param boolean $collgene
     * @return NomenclatureRessouceeau
     */
    public function setCollgene($collgene)
    {
        $this->collgene = $collgene;

        return $this;
    }

    /**
     * Get collgene
     *
     * @return boolean 
     */
    public function getCollgene()
    {
        return $this->collgene;
    }

    /**
     * Set lyce
     *
     * @param boolean $lyce
     * @return NomenclatureRessouceeau
     */
    public function setLyce($lyce)
    {
        $this->lyce = $lyce;

        return $this;
    }

    /**
     * Get lyce
     *
     * @return boolean 
     */
    public function getLyce()
    {
        return $this->lyce;
    }

    /**
     * Set colltech
     *
     * @param boolean $colltech
     * @return NomenclatureRessouceeau
     */
    public function setColltech($colltech)
    {
        $this->colltech = $colltech;

        return $this;
    }

    /**
     * Get colltech
     *
     * @return boolean 
     */
    public function getColltech()
    {
        return $this->colltech;
    }
}

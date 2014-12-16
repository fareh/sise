<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureTypeetablissement
 *
 * @ORM\Table(name="nomenclature_typeetablissement")
 *@ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\NomenclatureTypeetablissementRepository")
 */
class NomenclatureTypeetablissement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeEtabAr", type="string", length=50, nullable=true)
     */
    private $libetypeetabar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeEtabFr", type="string", length=50, nullable=true)
     */
    private $libetypeetabfr;

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
     * @var boolean
     *
     * @ORM\Column(name="ConcRece", type="boolean", nullable=true)
     */
    private $concrece;



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
     * Set libetypeetabar
     *
     * @param string $libetypeetabar
     * @return NomenclatureTypeetablissement
     */
    public function setLibetypeetabar($libetypeetabar)
    {
        $this->libetypeetabar = $libetypeetabar;

        return $this;
    }

    /**
     * Get libetypeetabar
     *
     * @return string 
     */
    public function getLibetypeetabar()
    {
        return $this->libetypeetabar;
    }

    /**
     * Set libetypeetabfr
     *
     * @param string $libetypeetabfr
     * @return NomenclatureTypeetablissement
     */
    public function setLibetypeetabfr($libetypeetabfr)
    {
        $this->libetypeetabfr = $libetypeetabfr;

        return $this;
    }

    /**
     * Get libetypeetabfr
     *
     * @return string 
     */
    public function getLibetypeetabfr()
    {
        return $this->libetypeetabfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypeetablissement
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
     * @return NomenclatureTypeetablissement
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
     * @return NomenclatureTypeetablissement
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
     * @return NomenclatureTypeetablissement
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
     * @return NomenclatureTypeetablissement
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
     * @return NomenclatureTypeetablissement
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
     * @return NomenclatureTypeetablissement
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

    /**
     * Set concrece
     *
     * @param boolean $concrece
     * @return NomenclatureTypeetablissement
     */
    public function setConcrece($concrece)
    {
        $this->concrece = $concrece;

        return $this;
    }

    /**
     * Get concrece
     *
     * @return boolean 
     */
    public function getConcrece()
    {
        return $this->concrece;
    }
    public function __toString()
    {
        return $this->codetypeetab;
    }
}

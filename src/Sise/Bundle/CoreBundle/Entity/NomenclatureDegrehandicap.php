<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureDegrehandicap
 *
 * @ORM\Table(name="nomenclature_degrehandicap")
 * @ORM\Entity
 */
class NomenclatureDegrehandicap
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeDegrHand", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codedegrhand;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeDegrHandAr", type="string", length=50, nullable=true)
     */
    private $libedegrhandar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeDegrHandFr", type="string", length=50, nullable=true)
     */
    private $libedegrhandfr;

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
     * Get codedegrhand
     *
     * @return string
     */
    public function getCodedegrhand()
    {
        return $this->codedegrhand;
    }

    /**
     * Set libedegrhandar
     *
     * @param string $libedegrhandar
     * @return NomenclatureDegrehandicap
     */
    public function setLibedegrhandar($libedegrhandar)
    {
        $this->libedegrhandar = $libedegrhandar;

        return $this;
    }

    /**
     * Get libedegrhandar
     *
     * @return string
     */
    public function getLibedegrhandar()
    {
        return $this->libedegrhandar;
    }

    /**
     * Set libedegrhandfr
     *
     * @param string $libedegrhandfr
     * @return NomenclatureDegrehandicap
     */
    public function setLibedegrhandfr($libedegrhandfr)
    {
        $this->libedegrhandfr = $libedegrhandfr;

        return $this;
    }

    /**
     * Get libedegrhandfr
     *
     * @return string
     */
    public function getLibedegrhandfr()
    {
        return $this->libedegrhandfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureDegrehandicap
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
     * @return NomenclatureDegrehandicap
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
     * @return NomenclatureDegrehandicap
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
     * @return NomenclatureDegrehandicap
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
     * @return NomenclatureDegrehandicap
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
     * @return NomenclatureDegrehandicap
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
     * @return NomenclatureDegrehandicap
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

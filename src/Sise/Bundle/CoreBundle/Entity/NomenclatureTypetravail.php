<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureTypetravail
 *
 * @ORM\Table(name="nomenclature_typetravail")
 * @ORM\Entity
 */
class NomenclatureTypetravail
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeTrav", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypetrav;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeTravAr", type="string", length=50, nullable=true)
     */
    private $libetypetravar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeTravFr", type="string", length=50, nullable=true)
     */
    private $libetypetravfr;

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
     * Get codetypetrav
     *
     * @return string
     */
    public function getCodetypetrav()
    {
        return $this->codetypetrav;
    }

    /**
     * Set libetypetravar
     *
     * @param string $libetypetravar
     * @return NomenclatureTypetravail
     */
    public function setLibetypetravar($libetypetravar)
    {
        $this->libetypetravar = $libetypetravar;

        return $this;
    }

    /**
     * Get libetypetravar
     *
     * @return string
     */
    public function getLibetypetravar()
    {
        return $this->libetypetravar;
    }

    /**
     * Set libetypetravfr
     *
     * @param string $libetypetravfr
     * @return NomenclatureTypetravail
     */
    public function setLibetypetravfr($libetypetravfr)
    {
        $this->libetypetravfr = $libetypetravfr;

        return $this;
    }

    /**
     * Get libetypetravfr
     *
     * @return string
     */
    public function getLibetypetravfr()
    {
        return $this->libetypetravfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypetravail
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
     * @return NomenclatureTypetravail
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
     * @return NomenclatureTypetravail
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
     * @return NomenclatureTypetravail
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
     * @return NomenclatureTypetravail
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
     * @return NomenclatureTypetravail
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
     * @return NomenclatureTypetravail
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


    public function __toString(){

        return ($this->getLibetypetravar())?$this->getLibetypetravar():"";
    }
}

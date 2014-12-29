<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureFiliere
 *
 * @ORM\Table(name="nomenclature_filiere")
 * @ORM\Entity
 */
class NomenclatureFiliere
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeFili", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codefili;


    /**
     * @ORM\ManyToMany(targetEntity="NomenclatureNiveauscolaire", inversedBy="codefili")
     * * @ORM\JoinTable(name="nomenclature_filiereniveauscolaire",
     *      joinColumns={@ORM\JoinColumn(name="CodeFili", referencedColumnName="CodeFili")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")}
     *      )
     **/
    private $codenivescol;

    public function __construct() {
        $this->codenivescol = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="LibeFiliAr", type="string", length=50, nullable=true)
     */
    private $libefiliar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeFiliFr", type="string", length=50, nullable=true)
     */
    private $libefilifr;

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
     * Get codefili
     *
     * @return string
     */
    public function getCodefili()
    {
        return $this->codefili;
    }

    /**
     * Set libefiliar
     *
     * @param string $libefiliar
     * @return NomenclatureFiliere
     */
    public function setLibefiliar($libefiliar)
    {
        $this->libefiliar = $libefiliar;

        return $this;
    }

    /**
     * Get libefiliar
     *
     * @return string
     */
    public function getLibefiliar()
    {
        return $this->libefiliar;
    }

    /**
     * Set libefilifr
     *
     * @param string $libefilifr
     * @return NomenclatureFiliere
     */
    public function setLibefilifr($libefilifr)
    {
        $this->libefilifr = $libefilifr;

        return $this;
    }

    /**
     * Get libefilifr
     *
     * @return string
     */
    public function getLibefilifr()
    {
        return $this->libefilifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureFiliere
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
     * @return NomenclatureFiliere
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
     * @return NomenclatureFiliere
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
     * @return NomenclatureFiliere
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
     * @return NomenclatureFiliere
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
     * @return NomenclatureFiliere
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
     * @return NomenclatureFiliere
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

    public function __toString()
    {
        return $this->codefili;
    }

    /**
     * Add codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return NomenclatureFiliere
     */
    public function addCodenivescol(\Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol)
    {
        $this->codenivescol[] = $codenivescol;

        return $this;
    }

    /**
     * Remove codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     */
    public function removeCodenivescol(\Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol)
    {
        $this->codenivescol->removeElement($codenivescol);
    }

    /**
     * Get codenivescol
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }
}

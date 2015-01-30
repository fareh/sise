<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureNiveauetude
 *
 * @ORM\Table(name="nomenclature_niveauetude")
 * @ORM\Entity
 */
class NomenclatureNiveauetude
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveEtud", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeniveetud;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeNiveEtudAr", type="string", length=50, nullable=false)
     */
    private $libeniveetudar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeNiveEtudFr", type="string", length=50, nullable=false)
     */
    private $libeniveetudfr;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrAffi", type="integer", nullable=false)
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
     * Get codeniveetud
     *
     * @return string
     */
    public function getCodeniveetud()
    {
        return $this->codeniveetud;
    }

    /**
     * Set libeniveetudar
     *
     * @param string $libeniveetudar
     * @return NomenclatureNiveauetude
     */
    public function setLibeniveetudar($libeniveetudar)
    {
        $this->libeniveetudar = $libeniveetudar;

        return $this;
    }

    /**
     * Get libeniveetudar
     *
     * @return string
     */
    public function getLibeniveetudar()
    {
        return $this->libeniveetudar;
    }

    /**
     * Set libeniveetudfr
     *
     * @param string $libeniveetudfr
     * @return NomenclatureNiveauetude
     */
    public function setLibeniveetudfr($libeniveetudfr)
    {
        $this->libeniveetudfr = $libeniveetudfr;

        return $this;
    }

    /**
     * Get libeniveetudfr
     *
     * @return string
     */
    public function getLibeniveetudfr()
    {
        return $this->libeniveetudfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureNiveauetude
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
     * @return NomenclatureNiveauetude
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
     * @return NomenclatureNiveauetude
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
     * @return NomenclatureNiveauetude
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
     * @return NomenclatureNiveauetude
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
     * @return NomenclatureNiveauetude
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
     * @return NomenclatureNiveauetude
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
        return $this->codeniveetud;
    }
}

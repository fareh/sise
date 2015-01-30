<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureSousdomaine
 *
 * @ORM\Table(name="nomenclature_sousdomaine", indexes={@ORM\Index(name="FK_Nomenclature_SousDomaine_Nomenclature_Domaine", columns={"CodeDoma"})})
 * @ORM\Entity
 */
class NomenclatureSousdomaine
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeSousDoma", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codesousdoma;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSousDomaAr", type="string", length=50, nullable=false)
     */
    private $libesousdomaar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeSousDomaFr", type="string", length=50, nullable=false)
     */
    private $libesousdomafr;

    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureDomaine", inversedBy="codesousdoma")
     * @ORM\JoinColumn(name="CodeDoma", referencedColumnName="CodeDoma")
     */
    protected $codedoma;

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
     * Get codesousdoma
     *
     * @return string
     */
    public function getCodesousdoma()
    {
        return $this->codesousdoma;
    }

    /**
     * Set libesousdomaar
     *
     * @param string $libesousdomaar
     * @return NomenclatureSousdomaine
     */
    public function setLibesousdomaar($libesousdomaar)
    {
        $this->libesousdomaar = $libesousdomaar;

        return $this;
    }

    /**
     * Get libesousdomaar
     *
     * @return string
     */
    public function getLibesousdomaar()
    {
        return $this->libesousdomaar;
    }

    /**
     * Set libesousdomafr
     *
     * @param string $libesousdomafr
     * @return NomenclatureSousdomaine
     */
    public function setLibesousdomafr($libesousdomafr)
    {
        $this->libesousdomafr = $libesousdomafr;

        return $this;
    }

    /**
     * Get libesousdomafr
     *
     * @return string
     */
    public function getLibesousdomafr()
    {
        return $this->libesousdomafr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureSousdomaine
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
     * @return NomenclatureSousdomaine
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
     * @return NomenclatureSousdomaine
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
     * @return NomenclatureSousdomaine
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
     * @return NomenclatureSousdomaine
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
     * @return NomenclatureSousdomaine
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
     * @return NomenclatureSousdomaine
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
     * Set codedoma
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDomaine $codedoma
     * @return NomenclatureSousdomaine
     */
    public function setCodedoma(\Sise\Bundle\CoreBundle\Entity\NomenclatureDomaine $codedoma = null)
    {
        $this->codedoma = $codedoma;

        return $this;
    }

    /**
     * Get codedoma
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureDomaine
     */
    public function getCodedoma()
    {
        return $this->codedoma;
    }
}

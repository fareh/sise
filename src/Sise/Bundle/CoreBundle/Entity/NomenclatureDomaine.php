<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * NomenclatureDomaine
 *
 * @ORM\Table(name="nomenclature_domaine")
 * @ORM\Entity
 */
class NomenclatureDomaine
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeDoma", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codedoma;
    /**
     * @ORM\OneToMany(targetEntity="NomenclatureSousdomaine", mappedBy="codedoma")
     */
    private $codesousdoma;

    public function __construct()
    {
        $this->codesousdoma = new ArrayCollection();
    }



    /**
     * @var string
     *
     * @ORM\Column(name="LibeDomaAr", type="string", length=50, nullable=false)
     */
    private $libedomaar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeDomaFr", type="string", length=50, nullable=false)
     */
    private $libedomafr;

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
     * Set libedomaar
     *
     * @param string $libedomaar
     * @return NomenclatureDomaine
     */
    public function setLibedomaar($libedomaar)
    {
        $this->libedomaar = $libedomaar;

        return $this;
    }

    /**
     * Get libedomaar
     *
     * @return string 
     */
    public function getLibedomaar()
    {
        return $this->libedomaar;
    }

    /**
     * Set libedomafr
     *
     * @param string $libedomafr
     * @return NomenclatureDomaine
     */
    public function setLibedomafr($libedomafr)
    {
        $this->libedomafr = $libedomafr;

        return $this;
    }

    /**
     * Get libedomafr
     *
     * @return string 
     */
    public function getLibedomafr()
    {
        return $this->libedomafr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureDomaine
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
     * @return NomenclatureDomaine
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
     * @return NomenclatureDomaine
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
     * @return NomenclatureDomaine
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
     * @return NomenclatureDomaine
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
     * @return NomenclatureDomaine
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
     * @return NomenclatureDomaine
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
     * Get codedoma
     *
     * @return string 
     */
    public function getCodedoma()
    {
        return $this->codedoma;
    }

    /**
     * Add codesousdoma
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureSousdomaine $codesousdoma
     * @return NomenclatureDomaine
     */
    public function addCodesousdoma(\Sise\Bundle\CoreBundle\Entity\NomenclatureSousdomaine $codesousdoma)
    {
        $this->codesousdoma[] = $codesousdoma;

        return $this;
    }

    /**
     * Remove codesousdoma
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureSousdomaine $codesousdoma
     */
    public function removeCodesousdoma(\Sise\Bundle\CoreBundle\Entity\NomenclatureSousdomaine $codesousdoma)
    {
        $this->codesousdoma->removeElement($codesousdoma);
    }

    /**
     * Get codesousdoma
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodesousdoma()
    {
        return $this->codesousdoma;
    }
}

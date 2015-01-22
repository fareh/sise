<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureTacheType;
/**
 * NomenclatureTache
 *
 * @ORM\Table(name="nomenclature_tache", indexes={@ORM\Index(name="FK_Nomenclature_Tache_Nomenclature_Corps", columns={"CodeCorp"})})
 * @ORM\Entity
 */
class NomenclatureTache
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTach", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetach;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTachAr", type="string", length=50, nullable=false)
     */
    private $libetachar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTachFr", type="string", length=50, nullable=false)
     */
    private $libetachfr;

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
     * @var \NomenclatureCorps
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureCorps")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeCorp", referencedColumnName="CodeCorp")
     * })
     */
    private $codecorp;

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
     * Get codetach
     *
     * @return string
     */
    public function getCodetach()
    {
        return $this->codetach;
    }

    /**
     * Set libetachar
     *
     * @param string $libetachar
     * @return NomenclatureTache
     */
    public function setLibetachar($libetachar)
    {
        $this->libetachar = $libetachar;

        return $this;
    }

    /**
     * Get libetachar
     *
     * @return string
     */
    public function getLibetachar()
    {
        return $this->libetachar;
    }

    /**
     * Set libetachfr
     *
     * @param string $libetachfr
     * @return NomenclatureTache
     */
    public function setLibetachfr($libetachfr)
    {
        $this->libetachfr = $libetachfr;

        return $this;
    }

    /**
     * Get libetachfr
     *
     * @return string
     */
    public function getLibetachfr()
    {
        return $this->libetachfr;
    }

    /**
     * Set codecorp
     *
     * @param string $codecorp
     * @return NomenclatureTache
     */
    public function setCodecorp($codecorp)
    {
        $this->codecorp = $codecorp;

        return $this;
    }

    /**
     * Get codecorp
     *
     * @return string
     */
    public function getCodecorp()
    {
        return $this->codecorp;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTache
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
     * @return NomenclatureTache
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
     * @return NomenclatureTache
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
     * @return NomenclatureTache
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
     * @return NomenclatureTache
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
     * @return NomenclatureTache
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
     * @return NomenclatureTache
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
        return $this->codetach;
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
        $instancetype=new NomenclatureTacheType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codetach;
    }
}

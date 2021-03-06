<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureMatiereoptionnelleType;
/**
 * NomenclatureMatiereoptionnelle
 *
 * @ORM\Table(name="nomenclature_matiereoptionnelle")
 * @ORM\Entity
 */
class NomenclatureMatiereoptionnelle
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeMatiOpti", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codematiopti;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeMatiOptiAr", type="string", length=50, nullable=true)
     */
    private $libematioptiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeMatiOptiFr", type="string", length=50, nullable=true)
     */
    private $libematioptifr;

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

    private $codecycl ;

    /**
     * @ORM\ManyToMany(targetEntity="NomenclatureNiveauscolaire", inversedBy="codematiopti")
     * * @ORM\JoinTable(name="nomenclature_matiereoptionnelleniveauscolaire",
     *      joinColumns={@ORM\JoinColumn(name="CodeMatiOpti", referencedColumnName="CodeMatiOpti")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="CodeNiveScol", referencedColumnName="CodeNiveScol")}
     *      )
     **/
    private $codenivescol;

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

    public function __construct() {
        $this->codenivescol = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getCodecycl()
    {
        return $this->codecycl;
    }

    /**
     * @param mixed $codecycl
     */
    public function setCodecycl($codecycl)
    {
        $this->codecycl = $codecycl;
    }

    /**
     * Get codematiopti
     *
     * @return string
     */
    public function getCodematiopti()
    {
        return $this->codematiopti;
    }

    /**
     * Set libematioptiar
     *
     * @param string $libematioptiar
     * @return NomenclatureMatiereoptionnelle
     */
    public function setLibematioptiar($libematioptiar)
    {
        $this->libematioptiar = $libematioptiar;

        return $this;
    }

    /**
     * Get libematioptiar
     *
     * @return string
     */
    public function getLibematioptiar()
    {
        return $this->libematioptiar;
    }

    /**
     * Set libematioptifr
     *
     * @param string $libematioptifr
     * @return NomenclatureMatiereoptionnelle
     */
    public function setLibematioptifr($libematioptifr)
    {
        $this->libematioptifr = $libematioptifr;

        return $this;
    }

    /**
     * Get libematioptifr
     *
     * @return string
     */
    public function getLibematioptifr()
    {
        return $this->libematioptifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureMatiereoptionnelle
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
     * @return NomenclatureMatiereoptionnelle
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
     * @return NomenclatureMatiereoptionnelle
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
     * @return NomenclatureMatiereoptionnelle
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
     * @return NomenclatureMatiereoptionnelle
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
     * @return NomenclatureMatiereoptionnelle
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
     * @return NomenclatureMatiereoptionnelle
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
     * Add codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return NomenclatureMatiereoptionnelle
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
    public function iterateVisible() {
        //   echo "MyClass::iterateVisible:\n";
        foreach($this as $key => $value) {
            $indice[]=$key;
        }
        return $indice;
    }
    public function getinstanceType() {
        //   echo "MyClass::iterateVisible:\n";
        $instancetype=new NomenclatureMatiereoptionnelleType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codematiopti;
    }
}

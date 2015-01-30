<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sise\Bundle\CoreBundle\Form\nomenclature\NomenclatureDisciplineType;
/**
 * NomenclatureDiscipline
 *
 * @ORM\Table(name="nomenclature_discipline", indexes={@ORM\Index(name="FK_Nomenclature_Discipline_Nomenclature_CycleEnseignement", columns={"CodeCyclEnse"})})
 * @ORM\Entity
 */
class NomenclatureDiscipline
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeDisci", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codedisci;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeDisciAr", type="string", length=50, nullable=true)
     */
    private $libedisciar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeDisciFr", type="string", length=50, nullable=true)
     */
    private $libediscifr;

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
     * @ORM\ManyToMany(targetEntity="NomenclatureNiveauscolaire", inversedBy="codedisci")
     * * @ORM\JoinTable(name="nomenclature_disciplineniveauscolaire",
     *      joinColumns={@ORM\JoinColumn(name="CodeDisci", referencedColumnName="CodeDisci")},
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

    /**
     * @var boolean
     *
     * @ORM\Column(name="MatiOpti", type="boolean", nullable=true)
     */
    private $matiopti;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCyclEnse", type="string", length=50, nullable=true)
     */
    private $codecyclense;

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
     * Add codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return NomenclatureDiscipline
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

    public function __construct() {
        $this->codenivescol = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get codedisci
     *
     * @return string
     */
    public function getCodedisci()
    {
        return $this->codedisci;
    }

    /**
     * Set libedisciar
     *
     * @param string $libedisciar
     * @return NomenclatureDiscipline
     */
    public function setLibedisciar($libedisciar)
    {
        $this->libedisciar = $libedisciar;

        return $this;
    }

    /**
     * Get libedisciar
     *
     * @return string
     */
    public function getLibedisciar()
    {
        return $this->libedisciar;
    }

    /**
     * Set libediscifr
     *
     * @param string $libediscifr
     * @return NomenclatureDiscipline
     */
    public function setLibediscifr($libediscifr)
    {
        $this->libediscifr = $libediscifr;

        return $this;
    }

    /**
     * Get libediscifr
     *
     * @return string
     */
    public function getLibediscifr()
    {
        return $this->libediscifr;
    }

    /**
     * Set codecyclense
     *
     * @param string $codecyclense
     * @return NomenclatureDiscipline
     */
    public function setCodecyclense($codecyclense)
    {
        $this->codecyclense = $codecyclense;

        return $this;
    }

    /**
     * Get codecyclense
     *
     * @return string
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureDiscipline
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
     * @return NomenclatureDiscipline
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
     * @return NomenclatureDiscipline
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
     * @return NomenclatureDiscipline
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
     * @return NomenclatureDiscipline
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
     * @return NomenclatureDiscipline
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
     * @return NomenclatureDiscipline
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
     * Set matiopti
     *
     * @param boolean $matiopti
     * @return NomenclatureDiscipline
     */
    public function setMatiopti($matiopti)
    {
        $this->matiopti = $matiopti;

        return $this;
    }

    /**
     * Get matiopti
     *
     * @return boolean
     */
    public function getMatiopti()
    {
        return $this->matiopti;
    }

    public function __toString()
    {
        return $this->codedisci;
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
        $instancetype=new NomenclatureDisciplineType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codedisci;
    }
}

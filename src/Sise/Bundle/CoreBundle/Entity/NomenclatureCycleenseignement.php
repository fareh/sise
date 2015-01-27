<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;
use Sise\Bundle\CoreBundle\Form\NomenclatureCycleenseignementType;
/**
 * NomenclatureCycleenseignement
 *
 * @ORM\Table(name="nomenclature_cycleenseignement")
 * @ORM\Entity
 */
class NomenclatureCycleenseignement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCyclEnse", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codecyclense;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCyclEnseAr", type="string", length=50, nullable=true)
     */
    private $libecyclensear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCyclEnseFr", type="string", length=50, nullable=true)
     */
    private $libecyclensefr;

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
    private $prep = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="Prim", type="boolean", nullable=false)
     */
    private $prim = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="CollGene", type="boolean", nullable=false)
     */
    private $collgene = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="Lyce", type="boolean", nullable=false)
     */
    private $lyce = '0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="CollTech", type="boolean", nullable=false)
     */
    private $colltech = '0';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="NomenclatureEtablissement", mappedBy="codecyclense")
     */
    private $codeetab;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="SecuriteProfil", mappedBy="codeprof_codecyclense", cascade={"persist"})
     */
    private $codeprof;

    /**
     * @ORM\OneToMany(targetEntity="NomenclatureNiveauscolaire", mappedBy="codecyclense")
     */
    protected $codenivescol;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codeetab = new \Doctrine\Common\Collections\ArrayCollection();
        $this->codeprof = new \Doctrine\Common\Collections\ArrayCollection();
        $this->codenivescol = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @param string $codecyclense
     */
    public function setCodecyclense($codecyclense)
    {
        $this->codecyclense = $codecyclense;
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
     * Set libecyclensear
     *
     * @param string $libecyclensear
     * @return NomenclatureCycleenseignement
     */
    public function setLibecyclensear($libecyclensear)
    {
        $this->libecyclensear = $libecyclensear;

        return $this;
    }

    /**
     * Get libecyclensear
     *
     * @return string
     */
    public function getLibecyclensear()
    {
        return $this->libecyclensear;
    }

    /**
     * Set libecyclensefr
     *
     * @param string $libecyclensefr
     * @return NomenclatureCycleenseignement
     */
    public function setLibecyclensefr($libecyclensefr)
    {
        $this->libecyclensefr = $libecyclensefr;

        return $this;
    }

    /**
     * Get libecyclensefr
     *
     * @return string
     */
    public function getLibecyclensefr()
    {
        return $this->libecyclensefr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCycleenseignement
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
     * @return NomenclatureCycleenseignement
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
     * @return NomenclatureCycleenseignement
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
     * @return NomenclatureCycleenseignement
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
     * @return NomenclatureCycleenseignement
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
     * @return NomenclatureCycleenseignement
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
     * @return NomenclatureCycleenseignement
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
     * Add codeetab
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetab
     * @return NomenclatureCycleenseignement
     */
    public function addCodeetab(\Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetab)
    {
        $this->codeetab[] = $codeetab;

        return $this;
    }

    /**
     * Remove codeetab
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetab
     */
    public function removeCodeetab(\Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetab)
    {
        $this->codeetab->removeElement($codeetab);
    }

    /**
     * Get codeetab
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * Add codeprof
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof
     * @return NomenclatureCycleenseignement
     */
    public function addCodeprof(\Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof)
    {
        $this->codeprof[] = $codeprof;

        return $this;
    }

    /**
     * Remove codeprof
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof
     */
    public function removeCodeprof(\Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof)
    {
        $this->codeprof->removeElement($codeprof);
    }

    /**
     * Get codeprof
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodeprof()
    {
        return $this->codeprof;
    }

    /**
     * Add codenivescol
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureNiveauscolaire $codenivescol
     * @return NomenclatureCycleenseignement
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
    public function __toString()
    {
        return ($this->getLibecyclensefr())?$this->getLibecyclensear():"";
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
        $instancetype=new NomenclatureCycleenseignementType();
        return $instancetype;
    }
    public function getCode()
    {
        return $this->codecyclense;
    }
}

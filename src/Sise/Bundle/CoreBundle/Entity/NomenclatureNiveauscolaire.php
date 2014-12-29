<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NomenclatureNiveauscolaire
 *
 * @ORM\Table(name="nomenclature_niveauscolaire")
 * @ORM\Entity
 */
class NomenclatureNiveauscolaire
{

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScol", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codenivescol;

    /**
     * @ORM\ManyToMany(targetEntity="NomenclatureFiliere", mappedBy="codenivescol")
     **/
    private $codefili;

    /**
     * @ORM\ManyToMany(targetEntity="NomenclatureMatiereoptionnelle", mappedBy="codenivescol")
     **/
    private $codematiopti;


    public function __construct() {
        $this->codefili = new \Doctrine\Common\Collections\ArrayCollection();
        $this->codematiopti = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="LibeNiveScolAr", type="string", length=50, nullable=true)
     */
    private $libenivescolar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeNiveScolFr", type="string", length=50, nullable=true)
     */
    private $libenivescolfr;


    /**
     * @ORM\ManyToOne(targetEntity="NomenclatureCycleenseignement", inversedBy="codenivescol")
     * @ORM\JoinColumn(name="CodeCyclEnse", referencedColumnName="CodeCyclEnse")
     */
    protected $codecyclense;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeNiveScolSuiv", type="string", length=50, nullable=true)
     */
    private $codenivescolsuiv;

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
     * Set libenivescolar
     *
     * @param string $libenivescolar
     * @return NomenclatureNiveauscolaire
     */
    public function setLibenivescolar($libenivescolar)
    {
        $this->libenivescolar = $libenivescolar;

        return $this;
    }

    /**
     * Get libenivescolar
     *
     * @return string
     */
    public function getLibenivescolar()
    {
        return $this->libenivescolar;
    }

    /**
     * Set libenivescolfr
     *
     * @param string $libenivescolfr
     * @return NomenclatureNiveauscolaire
     */
    public function setLibenivescolfr($libenivescolfr)
    {
        $this->libenivescolfr = $libenivescolfr;

        return $this;
    }

    /**
     * Get libenivescolfr
     *
     * @return string
     */
    public function getLibenivescolfr()
    {
        return $this->libenivescolfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureNiveauscolaire
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
     * @return NomenclatureNiveauscolaire
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
     * @return NomenclatureNiveauscolaire
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
     * @return NomenclatureNiveauscolaire
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
     * @return NomenclatureNiveauscolaire
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
     * @return NomenclatureNiveauscolaire
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
     * @return NomenclatureNiveauscolaire
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
     * Get codenivescol
     *
     * @return string
     */
    public function getCodenivescol()
    {
        return $this->codenivescol;
    }

    /**
     * Set codecyclense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense
     * @return NomenclatureNiveauscolaire
     */
    public function setCodecyclense(\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense = null)
    {
        $this->codecyclense = $codecyclense;

        return $this;
    }

    /**
     * Get codecyclense
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }


    /**
     * Set codenivescolsuiv
     *
     * @param string $codenivescolsuiv
     * @return NomenclatureNiveauscolaire
     */
    public function setCodenivescolsuiv($codenivescolsuiv)
    {
        $this->codenivescolsuiv = $codenivescolsuiv;

        return $this;
    }

    /**
     * Get codenivescolsuiv
     *
     * @return string
     */
    public function getCodenivescolsuiv()
    {
        return $this->codenivescolsuiv;
    }

    public function __toString()
    {
        return ($this->getLibenivescolar()) ? $this->getLibenivescolar() : null;
    }

    /**
     * Add codefili
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefili
     * @return NomenclatureNiveauscolaire
     */
    public function addCodefili(\Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefili)
    {
        $this->codefili[] = $codefili;

        return $this;
    }

    /**
     * Remove codefili
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefili
     */
    public function removeCodefili(\Sise\Bundle\CoreBundle\Entity\NomenclatureFiliere $codefili)
    {
        $this->codefili->removeElement($codefili);
    }

    /**
     * Get codefili
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodefili()
    {
        return $this->codefili;
    }

    /**
     * Add codematiopti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle $codematiopti
     * @return NomenclatureNiveauscolaire
     */
    public function addCodematiopti(\Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle $codematiopti)
    {
        $this->codematiopti[] = $codematiopti;

        return $this;
    }

    /**
     * Remove codematiopti
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle $codematiopti
     */
    public function removeCodematiopti(\Sise\Bundle\CoreBundle\Entity\NomenclatureMatiereoptionnelle $codematiopti)
    {
        $this->codematiopti->removeElement($codematiopti);
    }

    /**
     * Get codematiopti
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodematiopti()
    {
        return $this->codematiopti;
    }

}

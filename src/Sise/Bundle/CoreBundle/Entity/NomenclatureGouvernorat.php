<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureGouvernorat
 *
 * @ORM\Table(name="nomenclature_gouvernorat")
 * @ORM\Entity
 */
class NomenclatureGouvernorat
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeGouv", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codegouv;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeGouvAr", type="string", length=50, nullable=true)
     */
    private $libegouvar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeGouvFr", type="string", length=50, nullable=true)
     */
    private $libegouvfr;

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
     * Get codegouv
     *
     * @return string
     */
    public function getCodegouv()
    {
        return $this->codegouv;
    }

    /**
     * Set libegouvar
     *
     * @param string $libegouvar
     * @return NomenclatureGouvernorat
     */
    public function setLibegouvar($libegouvar)
    {
        $this->libegouvar = $libegouvar;

        return $this;
    }

    /**
     * Get libegouvar
     *
     * @return string
     */
    public function getLibegouvar()
    {
        return $this->libegouvar;
    }

    /**
     * Set libegouvfr
     *
     * @param string $libegouvfr
     * @return NomenclatureGouvernorat
     */
    public function setLibegouvfr($libegouvfr)
    {
        $this->libegouvfr = $libegouvfr;

        return $this;
    }

    /**
     * Get libegouvfr
     *
     * @return string
     */
    public function getLibegouvfr()
    {
        return $this->libegouvfr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureGouvernorat
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
     * @return NomenclatureGouvernorat
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
     * @return NomenclatureGouvernorat
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
     * @return NomenclatureGouvernorat
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
     * @return NomenclatureGouvernorat
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
     * @return NomenclatureGouvernorat
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
     * @return NomenclatureGouvernorat
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
        return $this->libegouvar;
    }
}

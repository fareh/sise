<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NomenclatureCirconscriptionregional
 *
 * @ORM\Table(name="nomenclature_circonscriptionregional")
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\NomenclatureCirconscriptionregionalRepository")
 */
class NomenclatureCirconscriptionregional
{
    /**
     * @var string
     *
     * @ORM\Column(name="codecircregi", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecircregi;



    /**
     * @ORM\OneToMany(targetEntity="NomenclatureDelegation", mappedBy="codecircregi")
     **/
    private $codedele;

    public function __construct() {
        $this->codedele = new ArrayCollection();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="LibeCircRegiAr", type="string", length=250, nullable=true)
     */
    private $libecircregiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCircRegiFr", type="string", length=250, nullable=true)
     */
    private $libecircregifr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeGouv", type="string", length=10, nullable=true)
     */
    private $codegouv;

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
     * Get codecircregi
     *
     * @return string
     */
    public function getCodecircregi()
    {
        return $this->codecircregi;
    }

    /**
     * Set libecircregiar
     *
     * @param string $libecircregiar
     * @return NomenclatureCirconscriptionregional
     */
    public function setLibecircregiar($libecircregiar)
    {
        $this->libecircregiar = $libecircregiar;

        return $this;
    }

    /**
     * Get libecircregiar
     *
     * @return string
     */
    public function getLibecircregiar()
    {
        return $this->libecircregiar;
    }

    /**
     * Set libecircregifr
     *
     * @param string $libecircregifr
     * @return NomenclatureCirconscriptionregional
     */
    public function setLibecircregifr($libecircregifr)
    {
        $this->libecircregifr = $libecircregifr;

        return $this;
    }

    /**
     * Get libecircregifr
     *
     * @return string
     */
    public function getLibecircregifr()
    {
        return $this->libecircregifr;
    }

    /**
     * Set codegouv
     *
     * @param string $codegouv
     * @return NomenclatureCirconscriptionregional
     */
    public function setCodegouv($codegouv)
    {
        $this->codegouv = $codegouv;

        return $this;
    }

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
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCirconscriptionregional
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
     * @return NomenclatureCirconscriptionregional
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

    public function __toString()
    {
        return ($this->getLibecircregiar())?$this->getLibecircregiar():"";
    }

    /**
     * Add codedele
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele
     * @return NomenclatureCirconscriptionregional
     */
    public function addCodedele(\Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele)
    {
        $this->codedele[] = $codedele;

        return $this;
    }

    /**
     * Remove codedele
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele
     */
    public function removeCodedele(\Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele)
    {
        $this->codedele->removeElement($codedele);
    }

    /**
     * Get codedele
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCodedele()
    {
        return $this->codedele;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SecuriteEntite
 *
 * @ORM\Table(name="securite_entite", indexes={@ORM\Index(name="FK_SECURITE_ENTITE_SECURITE_PA", columns={"CODEPACK"})})
 * @ORM\Entity
 */
class SecuriteEntite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODEENTI", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeenti;

    /**
     * @ORM\OneToMany(targetEntity="SecuriteDroitaccesgroupe" , mappedBy="codeprof" , cascade={"all"})
     * */
    protected $droitaccesgroupe;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBEENTIFR", type="string", length=300, nullable=false)
     */
    private $libeentifr;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBEENTIAR", type="string", length=300, nullable=false)
     */
    private $libeentiar;

    /**
     * @var string
     *
     * @ORM\Column(name="CODEPACK", type="string", length=100, nullable=true)
     */
    private $codepack;

    /**
     * @var integer
     *
     * @ORM\Column(name="CODERANGMENU", type="integer", nullable=true)
     */
    private $coderangmenu;

    /**
     * @var string
     *
     * @ORM\Column(name="MainPage", type="text", nullable=true)
     */
    private $mainpage;


    /**
     * Get codeenti
     *
     * @return string
     */
    public function getCodeenti()
    {
        return $this->codeenti;
    }

    /**
     * Set libeentifr
     *
     * @param string $libeentifr
     * @return SecuriteEntite
     */
    public function setLibeentifr($libeentifr)
    {
        $this->libeentifr = $libeentifr;

        return $this;
    }

    /**
     * Get libeentifr
     *
     * @return string
     */
    public function getLibeentifr()
    {
        return $this->libeentifr;
    }

    /**
     * Set libeentiar
     *
     * @param string $libeentiar
     * @return SecuriteEntite
     */
    public function setLibeentiar($libeentiar)
    {
        $this->libeentiar = $libeentiar;

        return $this;
    }

    /**
     * Get libeentiar
     *
     * @return string
     */
    public function getLibeentiar()
    {
        return $this->libeentiar;
    }

    /**
     * Set codepack
     *
     * @param string $codepack
     * @return SecuriteEntite
     */
    public function setCodepack($codepack)
    {
        $this->codepack = $codepack;

        return $this;
    }

    /**
     * Get codepack
     *
     * @return string
     */
    public function getCodepack()
    {
        return $this->codepack;
    }

    /**
     * Set coderangmenu
     *
     * @param integer $coderangmenu
     * @return SecuriteEntite
     */
    public function setCoderangmenu($coderangmenu)
    {
        $this->coderangmenu = $coderangmenu;

        return $this;
    }

    /**
     * Get coderangmenu
     *
     * @return integer
     */
    public function getCoderangmenu()
    {
        return $this->coderangmenu;
    }

    /**
     * Set mainpage
     *
     * @param string $mainpage
     * @return SecuriteEntite
     */
    public function setMainpage($mainpage)
    {
        $this->mainpage = $mainpage;

        return $this;
    }

    /**
     * Get mainpage
     *
     * @return string
     */
    public function getMainpage()
    {
        return $this->mainpage;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->droitaccesgroupe = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add droitaccesgroupe
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteDroitaccesgroupe $droitaccesgroupe
     * @return SecuriteEntite
     */
    public function addDroitaccesgroupe(\Sise\Bundle\CoreBundle\Entity\SecuriteDroitaccesgroupe $droitaccesgroupe)
    {
        $this->droitaccesgroupe[] = $droitaccesgroupe;

        return $this;
    }

    /**
     * Remove droitaccesgroupe
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteDroitaccesgroupe $droitaccesgroupe
     */
    public function removeDroitaccesgroupe(\Sise\Bundle\CoreBundle\Entity\SecuriteDroitaccesgroupe $droitaccesgroupe)
    {
        $this->droitaccesgroupe->removeElement($droitaccesgroupe);
    }

    /**
     * Get droitaccesgroupe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDroitaccesgroupe()
    {
        return $this->droitaccesgroupe;
    }
}

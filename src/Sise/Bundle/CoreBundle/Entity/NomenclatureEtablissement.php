<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureEtablissement
 *
 * @ORM\Table(name="nomenclature_etablissement", indexes={@ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_Circonscription", columns={"CodeCirc"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_CirconscriptionRegi45", columns={"CodeCircRegi"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_Delegation", columns={"CodeDele"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_Secteur", columns={"CodeSect"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_TypeEtablissement", columns={"CodeTypeEtab"})})
 * @ORM\Entity
 */
class NomenclatureEtablissement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codetypeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeEtabAr", type="string", length=50, nullable=true)
     */
    private $libeetabar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeEtabFr", type="string", length=50, nullable=true)
     */
    private $libeetabfr;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCourAr", type="string", length=50, nullable=true)
     */
    private $libecourar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCourFr", type="string", length=50, nullable=true)
     */
    private $libecourfr;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeDele", type="string", length=50, nullable=true)
     */
    private $codedele;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeSect", type="string", length=50, nullable=true)
     */
    private $codesect;

    /**
     * @var string
     *
     * @ORM\Column(name="Sect", type="string", length=50, nullable=true)
     */
    private $sect;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCons", type="datetime", nullable=true)
     */
    private $datecons;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCrea", type="datetime", nullable=true)
     */
    private $datecrea;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreaBD", type="datetime", nullable=true)
     */
    private $datecreabd;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCirc", type="string", length=50, nullable=true)
     */
    private $codecirc;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCircRegi", type="string", length=50, nullable=true)
     */
    private $codecircregi;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeZone", type="string", length=50, nullable=true)
     */
    private $codezone;



    /**
     * Set codeetab
     *
     * @param string $codeetab
     * @return NomenclatureEtablissement
     */
    public function setCodeetab($codeetab)
    {
        $this->codeetab = $codeetab;

        return $this;
    }

    /**
     * Get codeetab
     *
     * @return string 
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * Set codetypeetab
     *
     * @param string $codetypeetab
     * @return NomenclatureEtablissement
     */
    public function setCodetypeetab($codetypeetab)
    {
        $this->codetypeetab = $codetypeetab;

        return $this;
    }

    /**
     * Get codetypeetab
     *
     * @return string 
     */
    public function getCodetypeetab()
    {
        return $this->codetypeetab;
    }

    /**
     * Set libeetabar
     *
     * @param string $libeetabar
     * @return NomenclatureEtablissement
     */
    public function setLibeetabar($libeetabar)
    {
        $this->libeetabar = $libeetabar;

        return $this;
    }

    /**
     * Get libeetabar
     *
     * @return string 
     */
    public function getLibeetabar()
    {
        return $this->libeetabar;
    }

    /**
     * Set libeetabfr
     *
     * @param string $libeetabfr
     * @return NomenclatureEtablissement
     */
    public function setLibeetabfr($libeetabfr)
    {
        $this->libeetabfr = $libeetabfr;

        return $this;
    }

    /**
     * Get libeetabfr
     *
     * @return string 
     */
    public function getLibeetabfr()
    {
        return $this->libeetabfr;
    }

    /**
     * Set libecourar
     *
     * @param string $libecourar
     * @return NomenclatureEtablissement
     */
    public function setLibecourar($libecourar)
    {
        $this->libecourar = $libecourar;

        return $this;
    }

    /**
     * Get libecourar
     *
     * @return string 
     */
    public function getLibecourar()
    {
        return $this->libecourar;
    }

    /**
     * Set libecourfr
     *
     * @param string $libecourfr
     * @return NomenclatureEtablissement
     */
    public function setLibecourfr($libecourfr)
    {
        $this->libecourfr = $libecourfr;

        return $this;
    }

    /**
     * Get libecourfr
     *
     * @return string 
     */
    public function getLibecourfr()
    {
        return $this->libecourfr;
    }

    /**
     * Set codedele
     *
     * @param string $codedele
     * @return NomenclatureEtablissement
     */
    public function setCodedele($codedele)
    {
        $this->codedele = $codedele;

        return $this;
    }

    /**
     * Get codedele
     *
     * @return string 
     */
    public function getCodedele()
    {
        return $this->codedele;
    }

    /**
     * Set codesect
     *
     * @param string $codesect
     * @return NomenclatureEtablissement
     */
    public function setCodesect($codesect)
    {
        $this->codesect = $codesect;

        return $this;
    }

    /**
     * Get codesect
     *
     * @return string 
     */
    public function getCodesect()
    {
        return $this->codesect;
    }

    /**
     * Set sect
     *
     * @param string $sect
     * @return NomenclatureEtablissement
     */
    public function setSect($sect)
    {
        $this->sect = $sect;

        return $this;
    }

    /**
     * Get sect
     *
     * @return string 
     */
    public function getSect()
    {
        return $this->sect;
    }

    /**
     * Set datecons
     *
     * @param \DateTime $datecons
     * @return NomenclatureEtablissement
     */
    public function setDatecons($datecons)
    {
        $this->datecons = $datecons;

        return $this;
    }

    /**
     * Get datecons
     *
     * @return \DateTime 
     */
    public function getDatecons()
    {
        return $this->datecons;
    }

    /**
     * Set datecrea
     *
     * @param \DateTime $datecrea
     * @return NomenclatureEtablissement
     */
    public function setDatecrea($datecrea)
    {
        $this->datecrea = $datecrea;

        return $this;
    }

    /**
     * Get datecrea
     *
     * @return \DateTime 
     */
    public function getDatecrea()
    {
        return $this->datecrea;
    }

    /**
     * Set datecreabd
     *
     * @param \DateTime $datecreabd
     * @return NomenclatureEtablissement
     */
    public function setDatecreabd($datecreabd)
    {
        $this->datecreabd = $datecreabd;

        return $this;
    }

    /**
     * Get datecreabd
     *
     * @return \DateTime 
     */
    public function getDatecreabd()
    {
        return $this->datecreabd;
    }

    /**
     * Set codecirc
     *
     * @param string $codecirc
     * @return NomenclatureEtablissement
     */
    public function setCodecirc($codecirc)
    {
        $this->codecirc = $codecirc;

        return $this;
    }

    /**
     * Get codecirc
     *
     * @return string 
     */
    public function getCodecirc()
    {
        return $this->codecirc;
    }

    /**
     * Set codecircregi
     *
     * @param string $codecircregi
     * @return NomenclatureEtablissement
     */
    public function setCodecircregi($codecircregi)
    {
        $this->codecircregi = $codecircregi;

        return $this;
    }

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
     * Set codezone
     *
     * @param string $codezone
     * @return NomenclatureEtablissement
     */
    public function setCodezone($codezone)
    {
        $this->codezone = $codezone;

        return $this;
    }

    /**
     * Get codezone
     *
     * @return string 
     */
    public function getCodezone()
    {
        return $this->codezone;
    }
}

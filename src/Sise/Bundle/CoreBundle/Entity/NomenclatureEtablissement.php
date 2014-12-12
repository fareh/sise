<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DoctrineCommonCollectionsArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * NomenclatureEtablissement
 *
 * @ORM\Table(name="nomenclature_etablissement", indexes={@ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_Circonscription", columns={"CodeCirc"}),@ORM\Index(name="IDX_nomenclature_etablissement_nomenclature_zone", columns={"CodeZone"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_CirconscriptionRegi45", columns={"codecircregi"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_Delegation", columns={"CodeDele"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_Secteur", columns={"CodeSect"}), @ORM\Index(name="FK_Nomenclature_Etablissement_Nomenclature_TypeEtablissement", columns={"CodeTypeEtab"})})
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
    private $datecrea = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DateCreaBD", type="datetime", nullable=true)
     */
    private $datecreabd;

    /**
     * @var \NomenclatureZone
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureZone")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeZone", referencedColumnName="CodeZone")
     * })
     */
    private $codezone;

    /**
     * @var \NomenclatureCirconscription
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureCirconscription")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeCirc", referencedColumnName="CodeCirc")
     * })
     */
    private $codecirc;

    /**
     * @var \NomenclatureCirconscriptionregional
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureCirconscriptionregional")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="codecircregi", referencedColumnName="codecircregi")
     * })
     */
    private $codecircregi;

    /**
     * @var \NomenclatureDelegation
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureDelegation")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeDele", referencedColumnName="CodeDele")
     * })
     */
    private $codedele;

    /**
     * @var \NomenclatureSecteur
     *
     * @ORM\ManyToOne(targetEntity="NomenclatureSecteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeSect", referencedColumnName="CodeSect")
     * })
     */
    private $codesect;

    /**
     * @var \NomenclatureTypeetablissement
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="NomenclatureTypeetablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codetypeetab;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="NomenclatureCycleenseignement", inversedBy="codeetab")
     * @ORM\JoinTable(name="etablissement_cycleenseignement",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *     @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CodeCyclEnse", referencedColumnName="CodeCyclEnse")
     *   }
     * )
     */
    private $codecyclense;
    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="NomenclatureBassinpedagogique", inversedBy="codeetab")
     * @ORM\JoinTable(name="nomenclature_bassinpedagogiqueetablissement",
     *   joinColumns={
     *     @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *     @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="CodeBassPeda", referencedColumnName="CodeBassPeda")
     *   }
     * )
     */
    private $codebasspeda;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->codecyclense = new \Doctrine\Common\Collections\ArrayCollection();
        $this->codebasspeda = new \Doctrine\Common\Collections\ArrayCollection();
        $this->datecons = new \DateTime();
        $this->datecrea = new \DateTime();
    }


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
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $date = new \DateTime('now');
        if ($date instanceof \DateTime) {
            if ($this->getDatecreabd() == null) {
                $this->setDatecreabd($date);
            }
        }
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

    /**
     * Set codetypeetab
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement $codetypeetab
     * @return NomenclatureEtablissement
     */
    public function setCodetypeetab(\Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement $codetypeetab = null)
    {
        $this->codetypeetab = $codetypeetab;

        return $this;
    }

    /**
     * Get codetypeetab
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement
     */
    public function getCodetypeetab()
    {
        return $this->codetypeetab;
    }

    /**
     * Set codecirc
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscription $codecirc
     * @return NomenclatureEtablissement
     */
    public function setCodecirc(\Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscription $codecirc = null)
    {
        $this->codecirc = $codecirc;

        return $this;
    }

    /**
     * Get codecirc
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscription
     */
    public function getCodecirc()
    {
        return $this->codecirc;
    }

    /**
     * Set codecircregi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional $codecircregi
     * @return NomenclatureEtablissement
     */
    public function setCodecircregi(\Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional $codecircregi = null)
    {
        $this->codecircregi = $codecircregi;

        return $this;
    }

    /**
     * Get codecircregi
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional
     */
    public function getCodecircregi()
    {
        return $this->codecircregi;
    }

    /**
     * Set codedele
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele
     * @return NomenclatureEtablissement
     */
    public function setCodedele(\Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation $codedele = null)
    {
        $this->codedele = $codedele;

        return $this;
    }

    /**
     * Get codedele
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation
     */
    public function getCodedele()
    {
        return $this->codedele;
    }

    /**
     * Set codesect
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureSecteur $codesect
     * @return NomenclatureEtablissement
     */
    public function setCodesect(\Sise\Bundle\CoreBundle\Entity\NomenclatureSecteur $codesect = null)
    {
        $this->codesect = $codesect;

        return $this;
    }

    /**
     * Get codesect
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureSecteur
     */
    public function getCodesect()
    {
        return $this->codesect;
    }

    /**
     * Add codecyclense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense
     * @return NomenclatureEtablissement
     */
    public function addCodecyclense(\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense)
    {
        $this->codecyclense[] = $codecyclense;

        return $this;
    }

    /**
     * Remove codecyclense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense
     */
    public function removeCodecyclense(\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codecyclense)
    {
        $this->codecyclense->removeElement($codecyclense);
    }

    /**
     * Get codecyclense
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodecyclense()
    {
        return $this->codecyclense;
    }

    /**
     * Add codebasspeda
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureBassinpedagogique $codebasspeda
     * @return NomenclatureEtablissement
     */
    public function addCodebasspeda(\Sise\Bundle\CoreBundle\Entity\NomenclatureBassinpedagogique $codebasspeda)
    {
        $this->codebasspeda[] = $codebasspeda;

        return $this;
    }

    /**
     * Remove codebasspeda
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureBassinpedagogique $codebasspeda
     */
    public function removeCodebasspeda(\Sise\Bundle\CoreBundle\Entity\NomenclatureBassinpedagogique $codebasspeda)
    {
        $this->codebasspeda->removeElement($codebasspeda);
    }

    /**
     * Get codebasspeda
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodebasspeda()
    {
        return $this->codebasspeda;
    }
    public function __toString()
    {
        return $this->codeetab;
    }
}

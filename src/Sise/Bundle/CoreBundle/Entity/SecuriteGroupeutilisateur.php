<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteGroupeutilisateur
 *
 * @ORM\Table(name="securite_groupeutilisateur")
 * @ORM\Entity
 */
class SecuriteGroupeutilisateur
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODEGROUUTIL", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codegrouutil;


    /**
     * @ORM\OneToMany(targetEntity="\Sise\Bundle\CoreBundle\Entity\SecuriteProfil", mappedBy="codegrouutil")
     */
    protected $codeprof;

    public function __construct()
    {
        $this->codeprof = new ArrayCollection();
    }


    /**
     * @var string
     *
     * @ORM\Column(name="LIBEGROUUTILFR", type="string", length=510, nullable=false)
     */
    private $libegrouutilfr;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBEGROUUTILAR", type="string", length=510, nullable=false)
     */
    private $libegrouutilar;

    /**
     * @var string
     *
     * @ORM\Column(name="OBSE", type="string", length=510, nullable=true)
     */
    private $obse;


    /**
     * Get codegrouutil
     *
     * @return string
     */
    public function getCodegrouutil()
    {
        return $this->codegrouutil;
    }

    /**
     * Set libegrouutilfr
     *
     * @param string $libegrouutilfr
     * @return SecuriteGroupeutilisateur
     */
    public function setLibegrouutilfr($libegrouutilfr)
    {
        $this->libegrouutilfr = $libegrouutilfr;

        return $this;
    }

    /**
     * Get libegrouutilfr
     *
     * @return string
     */
    public function getLibegrouutilfr()
    {
        return $this->libegrouutilfr;
    }

    /**
     * Set libegrouutilar
     *
     * @param string $libegrouutilar
     * @return SecuriteGroupeutilisateur
     */
    public function setLibegrouutilar($libegrouutilar)
    {
        $this->libegrouutilar = $libegrouutilar;

        return $this;
    }

    /**
     * Get libegrouutilar
     *
     * @return string
     */
    public function getLibegrouutilar()
    {
        return $this->libegrouutilar;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return SecuriteGroupeutilisateur
     */
    public function setObse($obse)
    {
        $this->obse = $obse;

        return $this;
    }

    /**
     * Get obse
     *
     * @return string
     */
    public function getObse()
    {
        return $this->obse;
    }

    /**
     * Add codeprof
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof
     * @return SecuriteGroupeutilisateur
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

    public function __toString()
    {
        return ($this->getLibegrouutilar()) ? $this->getLibegrouutilar() : "";
    }
}

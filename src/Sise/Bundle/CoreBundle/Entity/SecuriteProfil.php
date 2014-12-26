<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SecuriteProfil
 *
 * @ORM\Table(name="securite_profil")
 * @ORM\Entity
 */
class SecuriteProfil
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeProf", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeprof;

    /**
     * @ORM\OneToMany(targetEntity="Sise\Bundle\UserBundle\Entity\User", mappedBy="codeprof")
     */
    protected $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->codeprof_codecyclense = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\SecuriteGroupeutilisateur"  , inversedBy="codeprof")
     * @ORM\JoinColumn(name="CODEGROUUTIL", referencedColumnName="CODEGROUUTIL")
     **/
    protected $codegrouutil;


    /**
     * @ORM\ManyToMany(targetEntity="\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement")
     * @ORM\JoinTable(name="securite_profilcycleenseignement",
     *      joinColumns={@ORM\JoinColumn(name="CodeProf", referencedColumnName="CodeProf")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="CodeCyclEnse", referencedColumnName="CodeCyclEnse")}
     * )
     */
    protected $codeprof_codecyclense;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeProfFR", type="string", length=250, nullable=true)
     */
    private $libeproffr;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeProfAr", type="string", length=250, nullable=true)
     */
    private $libeprofar;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="string", length=500, nullable=true)
     */
    private $obse;

    /**
     * Set libeproffr
     *
     * @param string $libeproffr
     * @return SecuriteProfil
     */
    public function setLibeproffr($libeproffr)
    {
        $this->libeproffr = $libeproffr;

        return $this;
    }

    /**
     * Get libeproffr
     *
     * @return string
     */
    public function getLibeproffr()
    {
        return $this->libeproffr;
    }

    /**
     * Set libeprofar
     *
     * @param string $libeprofar
     * @return SecuriteProfil
     */
    public function setLibeprofar($libeprofar)
    {
        $this->libeprofar = $libeprofar;

        return $this;
    }

    /**
     * Get libeprofar
     *
     * @return string
     */
    public function getLibeprofar()
    {
        return $this->libeprofar;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return SecuriteProfil
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
     * Get codeprof
     *
     * @return string
     */
    public function getCodeprof()
    {
        return $this->codeprof;
    }

    /**
     * Add user
     *
     * @param \Sise\Bundle\UserBundle\Entity\User $user
     * @return SecuriteProfil
     */
    public function addUser(\Sise\Bundle\UserBundle\Entity\User $user)
    {
        $this->user[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \Sise\Bundle\UserBundle\Entity\User $user
     */
    public function removeUser(\Sise\Bundle\UserBundle\Entity\User $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set codegrouutil
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteGroupeutilisateur $codegrouutil
     * @return SecuriteProfil
     */
    public function setCodegrouutil(\Sise\Bundle\CoreBundle\Entity\SecuriteGroupeutilisateur $codegrouutil = null)
    {
        $this->codegrouutil = $codegrouutil;

        return $this;
    }

    /**
     * Get codegrouutil
     *
     * @return \Sise\Bundle\CoreBundle\Entity\SecuriteGroupeutilisateur
     */
    public function getCodegrouutil()
    {
        return $this->codegrouutil;
    }

    /**
     * Add codeprof_codecyclense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codeprofCodecyclense
     * @return SecuriteProfil
     */
    public function addCodeprofCodecyclense(\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codeprofCodecyclense)
    {
        $this->codeprof_codecyclense[] = $codeprofCodecyclense;

        return $this;
    }

    /**
     * Remove codeprof_codecyclense
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codeprofCodecyclense
     */
    public function removeCodeprofCodecyclense(\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement $codeprofCodecyclense)
    {
        $this->codeprof_codecyclense->removeElement($codeprofCodecyclense);
    }

    /**
     * Get codeprof_codecyclense
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCodeprofCodecyclense()
    {
        return $this->codeprof_codecyclense;
    }


    public function __toString()
    {
        return ($this->getLibeprofar()) ? $this->getLibeprofar() : "";
    }
}

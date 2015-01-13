<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * SecuriteProfil
 *
 * @ORM\Table(name="securite_profil")
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\SecuriteProfilRepository")
 */
class SecuriteProfil
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeProf", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $codeprof;


    /**
     * @ORM\OneToMany(targetEntity="Sise\Bundle\UserBundle\Entity\User", mappedBy="codeprof")
     */
    protected $user;


    /**
     * @ORM\OneToMany(targetEntity="SecuriteDroitaccesgroupe" , mappedBy="codeprof" , cascade={"all"})
     * */
    protected $droitaccesgroupe;

    public function __construct($coderof=null)
    {
        $this->codeprof=($coderof)?$coderof:$this->GeraHash(8);
        $this->user = new ArrayCollection();
        $this->droitaccesgroupe = new ArrayCollection();
        $this->codeprof_codecyclense = new ArrayCollection();
    }

    /**
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\SecuriteGroupeutilisateur"  , inversedBy="codeprof")
     * @ORM\JoinColumn(name="CODEGROUUTIL", referencedColumnName="CODEGROUUTIL")
     **/
    protected $codegrouutil;


    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\Sise\Bundle\CoreBundle\Entity\NomenclatureCycleenseignement", inversedBy="codeprof", cascade={"persist"})
     * @ORM\JoinTable(name="securite_profilcycleenseignement",
     *      joinColumns={@ORM\JoinColumn(name="CodeProf", referencedColumnName="CodeProf", onDelete="CASCADE")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="CodeCyclEnse", referencedColumnName="CodeCyclEnse", onDelete="CASCADE")}
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

    public function __toString()
    {
        return ($this->getLibeprofar()) ? $this->getLibeprofar() : "";
    }


    function GeraHash($qtd){
//Under the string $Caracteres you write all the characters you want to be used to randomly generate the code.
        $Caracteres = 'ABCDEFGHIJKLMOPQRSTUVXWYZ0123456789';
        $QuantidadeCaracteres = strlen($Caracteres);
        $QuantidadeCaracteres--;

        $Hash=NULL;
        for($x=1;$x<=$qtd;$x++){
            $Posicao = rand(0,$QuantidadeCaracteres);
            $Hash .= substr($Caracteres,$Posicao,1);
        }

        return $Hash;
    }





    /**
     * Set codeprof
     *
     * @param string $codeprof
     * @return SecuriteProfil
     */
    public function setCodeprof($codeprof)
    {
        $this->codeprof = $codeprof;

        return $this;
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

    /**
     * Add droitaccesgroupe
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteDroitaccesgroupe $droitaccesgroupe
     * @return SecuriteProfil
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

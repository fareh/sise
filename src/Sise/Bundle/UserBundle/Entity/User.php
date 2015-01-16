<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03/12/2014
 * Time: 11:48
 */

namespace Sise\Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * @var string
     *
     * @ORM\Column(name="MATR", type="string", length=100, nullable=true)
     */
    private $matr;

    /**
     * @var string
     *
     * @ORM\Column(name="NOMPRENUTIL", type="string", length=100, nullable=true)
     */
    private $nomprenutil;

    /**
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\SecuriteProfil" , inversedBy="user")
     * @ORM\JoinColumn(name="CodeProf", referencedColumnName="CodeProf")
     **/
    protected $codeprof;

    /**
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique"  , inversedBy="user")
     * @ORM\JoinColumn(name="codenivehier", referencedColumnName="codenivehier")
     **/
    protected $codenivehier;


    protected $codegrouutil;

    /**
     * @return mixed
     */
    public function getCodegrouutil()
    {
        return $this->codegrouutil;
    }

    /**
     * @param mixed $codegrouutil
     */
    public function setCodegrouutil($codegrouutil)
    {
        $this->codegrouutil = $codegrouutil;
    }


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="DATEMAJ", type="datetime", nullable=true)
     */
    private $datemaj;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_activity", type="datetime", nullable=true)
     */
    private $lastActivity;


    /**
     * @var \Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional")
     * @ORM\JoinColumn(name="codecircregi", referencedColumnName="codecircregi")
     */
    private $codecircregi;

    /**
     * @var \Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\NomenclatureDelegation")
     * @ORM\JoinColumn(name="CodeDele", referencedColumnName="CodeDele")
     */
    private $codedele;


    /**
     * @var \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement")
     * @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     */
    private $codetypeetab;


    /**
     * @var \Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement
     * @ORM\ManyToOne(targetEntity="\Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="CodeEtab", referencedColumnName="CodeEtab"),
     *      @ORM\JoinColumn(name="CodeTypeEtab", referencedColumnName="CodeTypeEtab")
     * })
     */
    private $codeetab;

    /**
     *
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {

        $date = new \DateTime('now');
        if ($date instanceof \DateTime) {

            if ($this->getDatemaj() == null) {
                $this->setDatemaj($date);
            }
        }
    }



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set matr
     *
     * @param string $matr
     * @return User
     */
    public function setMatr($matr)
    {
        $this->matr = $matr;

        return $this;
    }

    /**
     * Get matr
     *
     * @return string 
     */
    public function getMatr()
    {
        return $this->matr;
    }

    /**
     * Set nomprenutil
     *
     * @param string $nomprenutil
     * @return User
     */
    public function setNomprenutil($nomprenutil)
    {
        $this->nomprenutil = $nomprenutil;

        return $this;
    }

    /**
     * Get nomprenutil
     *
     * @return string 
     */
    public function getNomprenutil()
    {
        return $this->nomprenutil;
    }

    /**
     * Set datemaj
     *
     * @param \DateTime $datemaj
     * @return User
     */
    public function setDatemaj($datemaj)
    {
        $this->datemaj = $datemaj;

        return $this;
    }

    /**
     * Get datemaj
     *
     * @return \DateTime 
     */
    public function getDatemaj()
    {
        return $this->datemaj;
    }

    /**
     * Set lastActivity
     *
     * @param \DateTime $lastActivity
     * @return User
     */
    public function setLastActivity($lastActivity)
    {
        $this->lastActivity = $lastActivity;

        return $this;
    }

    /**
     * Get lastActivity
     *
     * @return \DateTime 
     */
    public function getLastActivity()
    {
        return $this->lastActivity;
    }

    /**
     * Set codeprof
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof
     * @return User
     */
    public function setCodeprof(\Sise\Bundle\CoreBundle\Entity\SecuriteProfil $codeprof = null)
    {
        $this->codeprof = $codeprof;

        return $this;
    }

    /**
     * Get codeprof
     *
     * @return \Sise\Bundle\CoreBundle\Entity\SecuriteProfil 
     */
    public function getCodeprof()
    {
        return $this->codeprof;
    }

    /**
     * Set codenivehier
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique $codenivehier
     * @return User
     */
    public function setCodenivehier(\Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique $codenivehier = null)
    {
        $this->codenivehier = $codenivehier;

        return $this;
    }

    /**
     * Get codenivehier
     *
     * @return \Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique 
     */
    public function getCodenivehier()
    {
        return $this->codenivehier;
    }

    /**
     * Set codeetab
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetab
     * @return User
     */
    public function setCodeetab(\Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement $codeetab = null)
    {
        $this->codeetab = $codeetab;

        return $this;
    }

    /**
     * Get codeetab
     *
     * @return \Sise\Bundle\CoreBundle\Entity\NomenclatureEtablissement 
     */
    public function getCodeetab()
    {
        return $this->codeetab;
    }

    /**
     * Set codetypeetab
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureTypeetablissement $codetypeetab
     * @return User
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
     * Set codecircregi
     *
     * @param \Sise\Bundle\CoreBundle\Entity\NomenclatureCirconscriptionregional $codecircregi
     * @return User
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
     * @return User
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
}

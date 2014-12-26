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
     * @var string
     *
     * @ORM\Column(name="CodeEtab", type="string", length=50, nullable=true)
     */
    private $codeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeEtab", type="string", length=50, nullable=true)
     */
    private $codetypeetab;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeCircRegi", type="string", length=50, nullable=true)
     */
    private $codecircregi;

    /**
     * @var string
     *
     * @ORM\Column(name="CodeDele", type="string", length=50, nullable=true)
     */
    private $codedele;


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
     * Set codeetab
     *
     * @param string $codeetab
     * @return User
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
     * @return User
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
     * Set codecircregi
     *
     * @param string $codecircregi
     * @return User
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
     * Set codedele
     *
     * @param string $codedele
     * @return User
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
}

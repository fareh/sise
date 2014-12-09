<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 03/12/2014
 * Time: 11:48
 */

namespace Sise\Bundle\UserBundle\Entity;

use FOS\UserBundle\Model\User  as BaseUser;
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
     * @ORM\ManyToMany(targetEntity="Sise\Bundle\UserBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     * )
     */
    protected $groups;

    /**
     * @ORM\ManyToMany(targetEntity="Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique")
     * @ORM\JoinTable(name="fos_user_securite_niveauhierarchique",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="securite_niveauhierarchique_id", referencedColumnName="codenivehier")}
     * )
     */
    protected $niveauhierarchique;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */

    protected $givenName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */

    protected $familyName;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */

    protected $phoneNumber;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max="255",
     *     minMessage="The name is too short.",
     *     maxMessage="The name is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */

    protected $mobileNumber;


    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
       // $this->groups = new ArrayCollection();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
        $this->niveauhierarchique =  new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set givenName
     *
     * @param string $givenName
     * @return User
     */
    public function setGivenName($givenName)
    {
        $this->givenName = $givenName;

        return $this;
    }

    /**
     * Get givenName
     *
     * @return string
     */
    public function getGivenName()
    {
        return $this->givenName;
    }

    /**
     * Set familyName
     *
     * @param string $familyName
     * @return User
     */
    public function setFamilyName($familyName)
    {
        $this->familyName = $familyName;

        return $this;
    }

    /**
     * Get familyName
     *
     * @return string
     */
    public function getFamilyName()
    {
        return $this->familyName;
    }

    /**
     * Set phoneNumber
     *
     * @param string $phoneNumber
     * @return User
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get phoneNumber
     *
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set mobileNumber
     *
     * @param string $mobileNumber
     * @return User
     */
    public function setMobileNumber($mobileNumber)
    {
        $this->mobileNumber = $mobileNumber;

        return $this;
    }

    /**
     * Get mobileNumber
     *
     * @return string
     */
    public function getMobileNumber()
    {
        return $this->mobileNumber;
    }
    

    /**
     * Add groups
     *
     * @param \Sise\Bundle\UserBundle\Entity\Group $groups
     * @return User
     */
   /* public function addGroup(\Sise\Bundle\UserBundle\Entity\Group $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }*/

    /**
     * Remove groups
     *
     * @param \Sise\Bundle\UserBundle\Entity\Group $groups
     */
  /*  public function removeGroup(\Sise\Bundle\UserBundle\Entity\Group $groups)
    {
        $this->groups->removeElement($groups);
    }*/

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups()
    {
        return $this->groups;
    }


    /**
     * Add niveauhierarchique
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique $niveauhierarchique
     * @return User
     */
    public function addNiveauhierarchique(\Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique $niveauhierarchique)
    {
        $this->niveauhierarchique[] = $niveauhierarchique;

        return $this;
    }

    /**
     * Remove niveauhierarchique
     *
     * @param \Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique $niveauhierarchique
     */
    public function removeNiveauhierarchique(\Sise\Bundle\CoreBundle\Entity\SecuriteNiveauhierarchique $niveauhierarchique)
    {
        $this->niveauhierarchique->removeElement($niveauhierarchique);
    }

    /**
     * Get niveauhierarchique
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getNiveauhierarchique()
    {
        return $this->niveauhierarchique;
    }
}

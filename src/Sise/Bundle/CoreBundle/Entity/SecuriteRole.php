<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteRole
 *
 * @ORM\Table(name="securite_role")
 * @ORM\Entity
 */
class SecuriteRole
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeRole", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $coderole;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRoleAr", type="string", length=50, nullable=true)
     */
    private $liberolear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeRoleFr", type="string", length=50, nullable=true)
     */
    private $liberolefr;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="string", length=50, nullable=true)
     */
    private $obse;



    /**
     * Get coderole
     *
     * @return string 
     */
    public function getCoderole()
    {
        return $this->coderole;
    }

    /**
     * Set liberolear
     *
     * @param string $liberolear
     * @return SecuriteRole
     */
    public function setLiberolear($liberolear)
    {
        $this->liberolear = $liberolear;

        return $this;
    }

    /**
     * Get liberolear
     *
     * @return string 
     */
    public function getLiberolear()
    {
        return $this->liberolear;
    }

    /**
     * Set liberolefr
     *
     * @param string $liberolefr
     * @return SecuriteRole
     */
    public function setLiberolefr($liberolefr)
    {
        $this->liberolefr = $liberolefr;

        return $this;
    }

    /**
     * Get liberolefr
     *
     * @return string 
     */
    public function getLiberolefr()
    {
        return $this->liberolefr;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return SecuriteRole
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
}

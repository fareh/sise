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
}

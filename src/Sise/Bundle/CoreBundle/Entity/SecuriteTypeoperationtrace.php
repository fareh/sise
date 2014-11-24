<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteTypeoperationtrace
 *
 * @ORM\Table(name="securite_typeoperationtrace")
 * @ORM\Entity
 */
class SecuriteTypeoperationtrace
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODETYPEOPERTRAC", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypeopertrac;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBETYPEOPERTRAC", type="string", length=500, nullable=false)
     */
    private $libetypeopertrac;

    /**
     * @var string
     *
     * @ORM\Column(name="OBSE", type="string", length=500, nullable=true)
     */
    private $obse;



    /**
     * Get codetypeopertrac
     *
     * @return string 
     */
    public function getCodetypeopertrac()
    {
        return $this->codetypeopertrac;
    }

    /**
     * Set libetypeopertrac
     *
     * @param string $libetypeopertrac
     * @return SecuriteTypeoperationtrace
     */
    public function setLibetypeopertrac($libetypeopertrac)
    {
        $this->libetypeopertrac = $libetypeopertrac;

        return $this;
    }

    /**
     * Get libetypeopertrac
     *
     * @return string 
     */
    public function getLibetypeopertrac()
    {
        return $this->libetypeopertrac;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return SecuriteTypeoperationtrace
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

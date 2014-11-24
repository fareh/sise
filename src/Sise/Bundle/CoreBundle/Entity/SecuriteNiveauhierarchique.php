<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecuriteNiveauhierarchique
 *
 * @ORM\Table(name="securite_niveauhierarchique")
 * @ORM\Entity
 */
class SecuriteNiveauhierarchique
{
    /**
     * @var string
     *
     * @ORM\Column(name="CODENIVEHIER", type="string", length=100, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codenivehier;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBENIVEHIERFR", type="string", length=510, nullable=false)
     */
    private $libenivehierfr;

    /**
     * @var string
     *
     * @ORM\Column(name="LIBENIVEHIERAR", type="string", length=510, nullable=false)
     */
    private $libenivehierar;

    /**
     * @var string
     *
     * @ORM\Column(name="OBSE", type="string", length=510, nullable=true)
     */
    private $obse;



    /**
     * Get codenivehier
     *
     * @return string 
     */
    public function getCodenivehier()
    {
        return $this->codenivehier;
    }

    /**
     * Set libenivehierfr
     *
     * @param string $libenivehierfr
     * @return SecuriteNiveauhierarchique
     */
    public function setLibenivehierfr($libenivehierfr)
    {
        $this->libenivehierfr = $libenivehierfr;

        return $this;
    }

    /**
     * Get libenivehierfr
     *
     * @return string 
     */
    public function getLibenivehierfr()
    {
        return $this->libenivehierfr;
    }

    /**
     * Set libenivehierar
     *
     * @param string $libenivehierar
     * @return SecuriteNiveauhierarchique
     */
    public function setLibenivehierar($libenivehierar)
    {
        $this->libenivehierar = $libenivehierar;

        return $this;
    }

    /**
     * Get libenivehierar
     *
     * @return string 
     */
    public function getLibenivehierar()
    {
        return $this->libenivehierar;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return SecuriteNiveauhierarchique
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

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ParametreReglegestion
 *
 * @ORM\Table(name="parametre_reglegestion")
 * @ORM\Entity
 */
class ParametreReglegestion
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeReglGest", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codereglgest;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeReglGestAr", type="string", length=250, nullable=true)
     */
    private $libereglgestar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeReglGestFr", type="string", length=250, nullable=true)
     */
    private $libereglgestfr;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="string", length=250, nullable=true)
     */
    private $obse;


    /**
     * Get codereglgest
     *
     * @return string
     */
    public function getCodereglgest()
    {
        return $this->codereglgest;
    }

    /**
     * Set libereglgestar
     *
     * @param string $libereglgestar
     * @return ParametreReglegestion
     */
    public function setLibereglgestar($libereglgestar)
    {
        $this->libereglgestar = $libereglgestar;

        return $this;
    }

    /**
     * Get libereglgestar
     *
     * @return string
     */
    public function getLibereglgestar()
    {
        return $this->libereglgestar;
    }

    /**
     * Set libereglgestfr
     *
     * @param string $libereglgestfr
     * @return ParametreReglegestion
     */
    public function setLibereglgestfr($libereglgestfr)
    {
        $this->libereglgestfr = $libereglgestfr;

        return $this;
    }

    /**
     * Get libereglgestfr
     *
     * @return string
     */
    public function getLibereglgestfr()
    {
        return $this->libereglgestfr;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return ParametreReglegestion
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

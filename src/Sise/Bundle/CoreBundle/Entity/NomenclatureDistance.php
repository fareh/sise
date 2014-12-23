<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureDistance
 *
 * @ORM\Table(name="nomenclature_distance")
 * @ORM\Entity(repositoryClass="Sise\Bundle\CoreBundle\Repository\NomenclatureDistanceRepository")
 */
class NomenclatureDistance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="libedistar", type="string", length=50)
     */
    private $libedistar;

    /**
     * @var string
     *
     * @ORM\Column(name="libedistfr", type="string", length=50)
     */
    private $libedistfr;


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
     * Set libedistar
     *
     * @param string $libedistar
     * @return NomaNomenclatureDistance
     */
    public function setLibedistar($libedistar)
    {
        $this->libedistar = $libedistar;

        return $this;
    }

    /**
     * Get libedistar
     *
     * @return string 
     */
    public function getLibedistar()
    {
        return $this->libedistar;
    }

    /**
     * Set libedistfr
     *
     * @param string $libedistfr
     * @return NomaNomenclatureDistance
     */
    public function setLibedistfr($libedistfr)
    {
        $this->libedistfr = $libedistfr;

        return $this;
    }

    /**
     * Get libedistfr
     *
     * @return string 
     */
    public function getLibedistfr()
    {
        return $this->libedistfr;
    }
}

<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureCategorieentite
 *
 * @ORM\Table(name="nomenclature_categorieentite")
 * @ORM\Entity
 */
class NomenclatureCategorieentite
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeCateEnti", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codecateenti;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateEntiAr", type="string", length=50, nullable=true)
     */
    private $libecateentiar;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeCateEntiFr", type="string", length=50, nullable=true)
     */
    private $libecateentifr;

    /**
     * @var integer
     *
     * @ORM\Column(name="OrdrAffi", type="integer", nullable=true)
     */
    private $ordraffi;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Acti", type="boolean", nullable=true)
     */
    private $acti;


    /**
     * Get codecateenti
     *
     * @return string
     */
    public function getCodecateenti()
    {
        return $this->codecateenti;
    }

    /**
     * Set libecateentiar
     *
     * @param string $libecateentiar
     * @return NomenclatureCategorieentite
     */
    public function setLibecateentiar($libecateentiar)
    {
        $this->libecateentiar = $libecateentiar;

        return $this;
    }

    /**
     * Get libecateentiar
     *
     * @return string
     */
    public function getLibecateentiar()
    {
        return $this->libecateentiar;
    }

    /**
     * Set libecateentifr
     *
     * @param string $libecateentifr
     * @return NomenclatureCategorieentite
     */
    public function setLibecateentifr($libecateentifr)
    {
        $this->libecateentifr = $libecateentifr;

        return $this;
    }

    /**
     * Get libecateentifr
     *
     * @return string
     */
    public function getLibecateentifr()
    {
        return $this->libecateentifr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureCategorieentite
     */
    public function setOrdraffi($ordraffi)
    {
        $this->ordraffi = $ordraffi;

        return $this;
    }

    /**
     * Get ordraffi
     *
     * @return integer
     */
    public function getOrdraffi()
    {
        return $this->ordraffi;
    }

    /**
     * Set acti
     *
     * @param boolean $acti
     * @return NomenclatureCategorieentite
     */
    public function setActi($acti)
    {
        $this->acti = $acti;

        return $this;
    }

    /**
     * Get acti
     *
     * @return boolean
     */
    public function getActi()
    {
        return $this->acti;
    }
}

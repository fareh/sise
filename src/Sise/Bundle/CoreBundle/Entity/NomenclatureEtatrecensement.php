<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureEtatrecensement
 *
 * @ORM\Table(name="nomenclature_etatrecensement")
 * @ORM\Entity
 */
class NomenclatureEtatrecensement
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeEtatRece", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codeetatrece;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeEtatReceAr", type="string", length=50, nullable=true)
     */
    private $libeetatrecear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeEtatReceFr", type="string", length=50, nullable=true)
     */
    private $libeetatrecefr;

    /**
     * @var string
     *
     * @ORM\Column(name="Obse", type="string", length=250, nullable=true)
     */
    private $obse;



    /**
     * Get codeetatrece
     *
     * @return string 
     */
    public function getCodeetatrece()
    {
        return $this->codeetatrece;
    }

    /**
     * Set libeetatrecear
     *
     * @param string $libeetatrecear
     * @return NomenclatureEtatrecensement
     */
    public function setLibeetatrecear($libeetatrecear)
    {
        $this->libeetatrecear = $libeetatrecear;

        return $this;
    }

    /**
     * Get libeetatrecear
     *
     * @return string 
     */
    public function getLibeetatrecear()
    {
        return $this->libeetatrecear;
    }

    /**
     * Set libeetatrecefr
     *
     * @param string $libeetatrecefr
     * @return NomenclatureEtatrecensement
     */
    public function setLibeetatrecefr($libeetatrecefr)
    {
        $this->libeetatrecefr = $libeetatrecefr;

        return $this;
    }

    /**
     * Get libeetatrecefr
     *
     * @return string 
     */
    public function getLibeetatrecefr()
    {
        return $this->libeetatrecefr;
    }

    /**
     * Set obse
     *
     * @param string $obse
     * @return NomenclatureEtatrecensement
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

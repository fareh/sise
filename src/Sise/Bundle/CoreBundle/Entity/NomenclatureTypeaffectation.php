<?php

namespace Sise\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NomenclatureTypeaffectation
 *
 * @ORM\Table(name="nomenclature_typeaffectation")
 * @ORM\Entity
 */
class NomenclatureTypeaffectation
{
    /**
     * @var string
     *
     * @ORM\Column(name="CodeTypeAffe", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codetypeaffe;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeAffeAr", type="string", length=50, nullable=true)
     */
    private $libetypeaffear;

    /**
     * @var string
     *
     * @ORM\Column(name="LibeTypeAffeFr", type="string", length=50, nullable=true)
     */
    private $libetypeaffefr;

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
     * Get codetypeaffe
     *
     * @return string 
     */
    public function getCodetypeaffe()
    {
        return $this->codetypeaffe;
    }

    /**
     * Set libetypeaffear
     *
     * @param string $libetypeaffear
     * @return NomenclatureTypeaffectation
     */
    public function setLibetypeaffear($libetypeaffear)
    {
        $this->libetypeaffear = $libetypeaffear;

        return $this;
    }

    /**
     * Get libetypeaffear
     *
     * @return string 
     */
    public function getLibetypeaffear()
    {
        return $this->libetypeaffear;
    }

    /**
     * Set libetypeaffefr
     *
     * @param string $libetypeaffefr
     * @return NomenclatureTypeaffectation
     */
    public function setLibetypeaffefr($libetypeaffefr)
    {
        $this->libetypeaffefr = $libetypeaffefr;

        return $this;
    }

    /**
     * Get libetypeaffefr
     *
     * @return string 
     */
    public function getLibetypeaffefr()
    {
        return $this->libetypeaffefr;
    }

    /**
     * Set ordraffi
     *
     * @param integer $ordraffi
     * @return NomenclatureTypeaffectation
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
     * @return NomenclatureTypeaffectation
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
